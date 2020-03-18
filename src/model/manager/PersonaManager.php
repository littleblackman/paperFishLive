<?php

class PersonaManager extends BddManager
{
    private $narrativeAnalysisManager;

    public function getTableName() { return "persona";}
    public function getEntityName() {return "Persona";}


    public function __construct()
    {
        parent::__construct();
        $this->narrativeAnalysisManager = new NarrativeAnalysisManager();
    }
    
    public function findComplete($personaId) {
        $query = "  SELECT p.*, n.id as n_id, quest_item, receiver, sender, adjuvant, opponent, evolution  
                    FROM persona p
                    LEFT JOIN narrative_analysis n ON n.persona_id = p.id
                    WHERE p.id = :id";
        $stmt = $this->prepare($query);
        $stmt->bindValue(':id', $personaId);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $narrativeAnalysis = new NarrativeAnalysis($result);
        $narrativeAnalysis->setId($result['n_id']);
        $persona = new Persona($result);
        $persona->setNarrativeAnalysis($narrativeAnalysis);

        return $persona;
    }

    public function findByStoryId($story_id) {
        $query = "  SELECT p.*,  n.id as n_id
                    FROM persona p
                    LEFT JOIN narrative_analysis n ON n.persona_id = p.id
                    WHERE story_id = :story_id";
        $stmt = $this->prepare($query);
        $stmt->bindValue(':story_id', $story_id);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($results as $result) {
            $persona = new Persona($result);
            $narrative = $this->narrativeAnalysisManager->find($result['n_id']);
            $persona->setNarrativeAnalysis($narrative);
            $personas[] = $persona;
        }

        return $personas;
        
    }

    public function save($persona) {
        
        $set = " 
                firstname       = :firstname,
                lastname        = :lastname,
                nickname        = :nickname,
                age             = :age,
                personnality    = :personnality,
                moral_values    = :moral_values,
                achilles_heel   = :achilles_heel,
                social_standing = :social_standing,
                philosophy      = :philosophy,
                background      = :background"; 

                if($persona->getStoryId()) $set .= " , story_id = :story_id ";

        if($persona->getId()) {
            $query = " UPDATE persona SET ".$set." WHERE id = :id ";
        } else  {
            $query = "INSERT INTO persona SET ".$set;
        }

        $stmt = $this->prepare($query);
        $stmt->bindValue(':firstname', $persona->getFirstname());
        $stmt->bindValue(':lastname', $persona->getLastname());
        $stmt->bindValue(':nickname', $persona->getNickname());
        $stmt->bindValue(':age', $persona->getAge());
        $stmt->bindValue(':personnality', $persona->getPersonnality());
        $stmt->bindValue(':moral_values', $persona->getMoralValues());
        $stmt->bindValue(':achilles_heel', $persona->getAchillesHeel());
        $stmt->bindValue(':social_standing', $persona->getSocialStanding());
        $stmt->bindValue(':philosophy', $persona->getPhilosophy());
        $stmt->bindValue(':background', $persona->getBackground());

        if($persona->getId()) $stmt->bindValue(':id', $persona->getId());
        if($persona->getStoryId()) $stmt->bindValue(':story_id', $persona->getStoryId());

        $stmt->execute();

        if($persona->getId()) {
            $personaId = $persona->getId();
         } else {
            $personaId =  $this->connexion()->lastInsertId();
         } 

        if($narrative = $persona->getNarrativeAnalysis()) $this->narrativeAnalysisManager->save($narrative, $personaId);

        $persona = $this->findComplete($personaId);
        return $persona;
    }
}