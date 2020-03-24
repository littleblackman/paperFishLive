<?php


class DefinitionController extends Controller
{
    
    public function update() {
        $definitionData = $this->request->get('definition');
        if(isset($definitionData['textDefinition'])) {
            foreach($definitionData['textDefinition'] as $key => $term) {
                (isset($definitionData['textAlternative'][$key])) ? $alternatives =  $definitionData['textAlternative'][$key] : $alternatives = null;
                $keywords[$term] = $alternatives;
            }
            $definitionData['keywords'] = json_encode($keywords);
        }
        $definition = new Definition($definitionData);
        $definition = $definition->save();
        $this->renderJson($definition->toArray());
    }  
}