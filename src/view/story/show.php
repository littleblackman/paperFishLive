<i class="material-icons addBigButton" style="float: left; cursor: pointer"onclick="history.back()">keyboard_arrow_left</i>

<h1>
    <?= $story->getTitle();?>
    <?php if(is_owner($story)):?>
        <a href="<?= path('editStory', $story->getSlug());?>" style="float: right" title="Ajouter un récit">
            <i class="material-icons addBigButton">edit</i>
        </a>
    <?php endif;?>
</h1>

<h3>
    <?= $story->getByName();?><br/>
    <i class="describeInformation">Oeuvre sortie en <?= $story->getDateParution();?></i>
</h3>

<h3>Résumé</h3>
<p><?= $story->getResume();?></p>

<h3>Thèmes</h3>
<div class="listTag">
    <?= $story->getThemesTag();?>
</div>

<h3>Genres<h3>
<div class="listTag">
    <?= $story->getGenresTag();?>
</div>

<h3>Déroulement de l'histoire</h3>
<p><?= $story->getInitial();?></p>
<p><?= $story->getTriggerEvent();?></p>
<p><?= $story->getFlow();?></p>
<p><?= $story->getClimax();?></p>
<p><?= $story->getOutcome();?></p>
<p><?= $story->getFinal();?></p>

<h3>Personnages</h3>

<?php include('_showPersona.php');?>

<h3>Ce qu'on doit retenir</h3>

<?php if($story->getFocalisation() == "zero") echo "Le narrateur est Dieu, il est omniscient, connait tout et sait tout";?>
<?php if($story->getFocalisation() == "interne") echo "Le récit est raconté de l'intérieur, par l'un des personnages";?>
<?php if($story->getFocalisation() == "externe") echo "C'est un observateur extérieur qui raconte l'histoire.";?>


<h4>Point fort du récit</h4>
<p><?= $story->getStoryQuality();?></p>

<h4>La particularité du récit</h4>
<p><?= $story->getStoryDifference();?></p>

<h4>Le contexte</h4>
<p>Le récit est paru en <?= $story->getDateParution();?></p>
<p><?= $story->getContexteParution();?></p>
<p><?= $story->getReception();?></p>

<h3>Quelques mots sur <?= $story->getByName();?></h3>
<p><?= $story->getBy()->getInformation();?>


<br/><br/><br/>
<hr/>
<?php $object = $story;?> 
<?php include(VIEW.'home/_mainfooter.php');?>
<script src="<?= JS ;?>story/show.js"></script>