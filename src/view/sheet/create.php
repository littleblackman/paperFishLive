<i class="material-icons addBigButton" style="float: left; cursor: pointer"onclick="history.back()">keyboard_arrow_left</i>
<?php ($sheet->getId()) ? $text = "Modifier" : $text = "Créer" ;?>
<input hidden="type" name="updateDefinitionUrl" id="updateDefinitionUrl" value="<?=path('updateDefinition');?>"/>

<h1>Fiche <span>& Définitions</span></h1>

<h2><?= $text;?> votre fiche</h2>

<form action="<?= path('updateSheet');?>" method="post" id="sheeForm">

    <input type="hidden" name="sheet[id]" id="sheet_id" value="<?= $sheet->getId();?>"/>
    <input type="hidden" name="sheet[created_at]" id="sheet_created_at" value="<?=$sheet->getCreatedAt()->format('Y-m-d H:i:s');?>"/>
    <input type="hidden" name="sheet[updated_at]" id="sheet_updated_at"value="<?=$sheet->getUpdatedAt()->format('Y-m-d H:i:s');?>"/>
    <input type="hidden" name="sheet[slug]"  id="sheet_slug" value="<?=$sheet->getSlug();?>"/>


    <h3>Informations générales</h3>
    <div class="input-field col s12">
        <select name="sheet[topic_id]" required>
        <option value="" disabled selected>Choisissez la matière</option>
        <?php foreach($topics as $topic):?>
            <option value="<?= $topic->getId();?>" <?= selected($topic->getId(), $sheet->getTopicId());?>><?= $topic->getName();?></option>
        <?php endforeach;?>
        </select>
    </div>

    <div class="row">
        <input type="text" name="sheet[title]" value="<?= $sheet->getTitle()?>" placeholder="Titre du sujet abordé" required/>
    </div>
   
    <div class="input-field col s12">
        <select name="sheet[grade_id]" required>
        <option value="" disabled selected>Choisissez le niveau</option>
        <?php foreach($grades as $grade):?>
            <option value="<?= $grade->getId();?>" <?= selected($grade->getId(), $sheet->getGradeId());?>><?= $grade->getName();?></option>
        <?php endforeach;?>
        </select>
    </div>

    <div class="row">
        <h4>
            Description de la fiche
        </h4>
        <textarea name="sheet[description]" placeholder="Explications sur la fiche"><?=$sheet->getDescription();?></textarea>
    </div>

    <h4>La fiche est</h4>
    <div class="row flex">
        <label>
            <input type="radio" name="sheet[visibility]" value="private" <?= checked('private', $sheet->getVisibility());?> required/>
            <span>Privée</span>
        </label>

        <label>
            <input type="radio" name="sheet[visibility]" value="public" <?= checked('public', $sheet->getVisibility());?>/>
            <span>Publique</span>
        </label>
    </div>
    <br/>
    <div class="row">
        <input type="submit" class="btn btn-width" id="submitSheetButton" value="<?= $text;?>"/>
    </div>
</form>

<?php ($sheet->getId()) ? $display = "display: block" : $display = "display:none";?>
<br/><br/>
<div id="contentDefinition" style="<?= $display;?>">
    <?php include('_definitions.php');?>
</div>

<script src="<?= JS ;?>sheet/create.js"></script>
