<h1>
    Fiche <span>& définitions</span>
    <a href="<?= path('createSheet');?>" style="float: right" title="Ajouter une fiche">
        <i class="material-icons addBigButton">add_circle</i>
    </a>
</h1>

<form action="<?= path('searchSheet');?>">
    <input type="search" name="search" placeholder="Rechercher"/>
</form>

<h2>Vos fiches de définitions</h2>

<?php if(isset($sheetsUser)):?>
    <?php $sheets = $sheetsUser;?>
    <?php include('_listSheet.php');?>
<?php else:?>
    <i>Vous n'avez toujours pas créé de fiche !<br/>Appuyez sur le bouton "+" pour régler le problème</i>
<?php endif;?>

<h2>Les dernières fiches partagées</h2>
<?php $sheets = $sheetsPublic;?>
<?php include('_listSheet.php');?>
