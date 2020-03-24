<h1>Créer vos Paper Fish</h1>
<br/>
Welcome dans la création & la consultation de fiches
<br/>
<form action="<?= path('searchStory');?>">
    <input type="search" name="search" placeholder="Rechercher"/>
</form>

<h2>Les dernières fiches</h2>

<?php $sheets = $sheetsPublic;?>
<?php include(VIEW.'sheet/_listSheet.php');?>

<?php $storys = $storysPublic;?>
<?php include(VIEW.'story/_listStory.php');?>

<script src="<?= JS ;?>story/index.js"></script>
