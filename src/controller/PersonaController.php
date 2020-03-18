<?php



class PersonaController extends Controller
{
    private $personaManager;

    public function __construct($request) {
        parent::__construct($request);
        $this->personaManager = new PersonaManager();
    }

    public function updateJson() {
        $data_persona = $this->request->get('persona');
        $data_narrative = $this->request->get('narrative');
        $persona = new Persona($data_persona);
        $narrative = new NarrativeAnalysis($data_narrative);
        $persona->setNarrativeAnalysis($narrative);
        $persona = $persona->save();
        $persona = $this->personaManager->save($persona, $narrative);
        return $this->renderJson($persona->toArray());
    }

    public function deleteJson() {
        $id = $this->request->get('personaId');
        $persona = $this->personaManager->find($id);
        $persona->delete();
        return $this->renderJson([]);
    }

    public function getPersonaJson() {
        $persona = $this->personaManager->findComplete($this->request->get('persona_id'));
        return $this->renderJson($persona->toArray());
    }
}