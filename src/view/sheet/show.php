<i class="material-icons addBigButton" style="float: left; cursor: pointer"onclick="history.back()">keyboard_arrow_left</i>

<h1>
    <?= $sheet->getTitle();?>
    <?php if(is_owner($sheet)):?>
        <a href="<?= path('editSheet', $sheet->getSlug());?>" style="float: right" title="Ajouter une fiche">
            <i class="material-icons addBigButton">edit</i>
        </a>
    <?php endif;?>
</h1>

<h3><?= $sheet->getTopicName();?> - <?= $sheet->getGradeName();?></h3>

<?php if($sheet->getDescription()):?>
<p><?= $sheet->getDescription();?></p>
<?php endif;?>

<?php foreach($sheet->getDefinitions() as $definition):?>
<h3>

    <i class="material-icons expandAnswer" id="hideContent-<?= $definition->getId();?>" data-id="hide-<?= $definition->getId();?>" style="cursor: pointer; display: none">expand_less</i>
    <i class="material-icons expandAnswer" id="showContent-<?= $definition->getId();?>" data-id="show-<?= $definition->getId();?>" style="cursor: pointer">expand_more</i>
    <?= $definition->getQuestion();?>
</h3>

<p> 
    <div style="display:none" id="content-<?= $definition->getId();?>">
        <div style="float: right">
            <button class="btn showTxt" id="TxtFull-<?= $definition->getId();?>">
                <i class="material-icons">remove_red_eye</i>
            </button>
            <button class="btn showTxt" id="TxtEmpty-<?= $definition->getId();?>" style="display: none">
            <i class="material-icons">space_bar</i>
            </button>
        </div>
        <p id="showTxtEmpty-<?= $definition->getId();?>" class="textAnswer">
            <?php echo $definition->getAnswerEmpty();?>
        </p>
        <p id="showTxtFull-<?= $definition->getId();?>" class="textAnswer" style="display: none">
            <?php echo $definition->getAnswerFull();?>
        </p>
        
        <?php $i = 0;foreach($definition->getKeywordsArray() as $keyword => $options):?>
            <input type='hidden' id="solution-keyword-<?= $definition->getId();?>-<?= $i;?>" value="<?= $keyword;?>" />
            <?php $newOptions = str_replace(array(', ', ' ,', ' , '), ',', $options);?>
            <input type='hidden' id="options-keyword-<?= $definition->getId();?>-<?= $i;?>" value="<?= $newOptions;?>" />
            <?php $i++;?>
        <?php endforeach;?>

    </div>
</p>

<?php endforeach;?>

<br/><br/><br/>
<hr/>
<?php $object = $sheet;?> 
<?php include(VIEW.'home/_mainfooter.php');?>
<script src="<?= JS ;?>sheet/show.js"></script>
