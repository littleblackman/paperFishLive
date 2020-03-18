<?php


class NarrativeAnalysisManager extends BddManager
{
    public function getTableName() { return "narrative_analysis";}
    public function getEntityName() {return "NarrativeAnalysis";}


    public function save($narrative, $personaId = null) {

        $set = " 
        quest_item = :quest_item,
        receiver   = :receiver,
        sender     = :sender,
        adjuvant   = :adjuvant,
        opponent   = :opponent,
        evolution  = :evolution,
        persona_id = :persona_id "; 

        ($personaId) ? $persona_id = $personaId : $persona_id = $narrative->getPersonaId();

        if($narrative->getId()) {
            $query = " UPDATE narrative_analysis SET ".$set." WHERE id = :id ";
        } else  {
            $query = "INSERT INTO narrative_analysis SET ".$set;
        }

        $stmt = $this->prepare($query);
        $stmt->bindValue(':quest_item', $narrative->getQuestItem());
        $stmt->bindValue(':receiver', $narrative->getReceiver());
        $stmt->bindValue(':sender', $narrative->getSender());
        $stmt->bindValue(':adjuvant', $narrative->getAdjuvant());
        $stmt->bindValue(':opponent', $narrative->getOpponent());
        $stmt->bindValue(':evolution', $narrative->getEvolution());
        $stmt->bindValue(':persona_id', $persona_id);

        if($narrative->getId()) $stmt->bindValue(':id', $narrative->getId());
        $stmt->execute();

    }
}