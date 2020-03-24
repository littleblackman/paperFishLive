<?php foreach($sheet->getDefinitions() as $definition):?>

    <?php $formId = rand(1,100000);?>

    <div class='definitionBlock' id='blockDefinition-<?= $formId;?>'>
        <div class='deleteWdefinition' onclick='deleteBlockDefinition(<?= $formId;?>)'>X</div>
        <br style='clear: both'/>
        <form method='post' id='formQuestion-<?= $formId;?>' class='formQuestion'>
            <input type='hidden' name='sheet_id' value="<?= $sheet->getId();?>" />
            <input type='hidden' name='id' id='questionId-<?= $formId;?>' value='<?= $definition->getId();?>'/>
            <input type='hidden' name='created_at' id='createdAt-<?= $formId;?>' value='<?= $definition->getCreatedAt()->format('Y-m-d');?>'/>
            <input type='hidden' name='updated_at' id='updatedAt-<?= $formId;?>' value='<?= $definition->getUpdatedAt()->format('Y-m-d');?>'/>
            <input type='text' name='question' placeholder='Entrez votre question' value="<?= $definition->getQuestion();?>"/>
            <br/>
            <textarea id='textarea-<?= $formId;?>' class='textareaAnswerDefinition' name='answer' placeholder='Proposez votre définition'><?= $definition->getAnswer();?></textarea>
            <br/>
            <div class='btn btnSelectWordDefinition' onclick='getTextareaSelection(<?= $formId;?>)'>Sélectionner le mot</div>
            <button class='btn submitFormDefinition' onclick='event.preventDefault();submitFormQuestion(<?= $formId;?>)' data-$formId='<?= $formId;?>' >
                Enregistrer
            </button>
            <br style='clear: both'/>
            <div id='textSelectedContainer-<?= $formId;?>'>

                <?php $i = 0; foreach($definition->getKeywordsArray() as $keyword => $options):?>

                    <div class='textSelected' id='lineWSelected-<?= $formId;?>-<?= $i;?>'>
                        <div class="deleteWdefinition" onclick="retrieveSelected('<?= $keyword;?>', <?= $formId;?>, <?= $i;?>)">
                            X</div>
                        <br style="clear: both"/>
                        <input type="hidden" name="textDefinition" value="<?= $keyword;?>">
                        <b><?= $keyword;?></b>
                        <input type='text' name='textAlternative' value="<?= $options;?>" placeholder='Ajoutez les variantes séparées par des virgules. Ex : fiche, fiches, fish'/>
                    </div>
        
                    <?php $i++;?>
                <?php endforeach;?>
        
            </div>
        </form>
    </div>
<?php endforeach;?>