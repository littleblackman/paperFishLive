<h1>
    Récit <span>Littérature & Cinéma</span>
    <a href="<?= path('createStory');?>" style="float: right" title="Ajouter un récit">
        <i class="material-icons addBigButton">add_circle</i>
    </a>
</h1>


<form action="<?= path('searchStory');?>">
    <input type="search" name="search" placeholder="Rechercher"/>
</form>


<h2>Vos dernières fiches</h2>

<?php if(isset($storysUser)):?>
    <?php $storys = $storysUser;?>
    <?php include('_listStory.php');?>
<?php else:?>
    <i>Vous n'avez toujours pas créé de fiche !<br/>Appuyez sur le bouton "+" pour régler le problème</i>
<?php endif;?>

<h2>Les dernières fiches partagées</h2>
<?php $storys = $storysPublic;?>
<?php include('_listStory.php');?>

<script src="<?= JS ;?>story/index.js"></script>
