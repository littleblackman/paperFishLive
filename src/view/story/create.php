<i class="material-icons addBigButton" style="float: left; cursor: pointer"onclick="history.back()">keyboard_arrow_left</i>
<?php ($story->getId()) ? $text = "Modifier" : $text = "Créer" ;?>

<h1>Récit <span>Littérature & Cinéma</span></h1>

<h2><?= $text;?> votre fiche</h2>

<div id="characterFormContent">
   <?php include('_personaForm.php');?>
</div>

<form action="<?= path('updateStory');?>" method="post">

    <input type="hidden" name="data[id]"  value="<?=$story->getId();?>"/>
    <input type="hidden" name="data[created_at]"  value="<?=$story->getCreatedAt()->format('Y-m-d H:i:s');?>"/>
    <input type="hidden" name="data[updated_at]"  value="<?=$story->getUpdatedAt()->format('Y-m-d H:i:s');?>"/>
    <input type="hidden" name="data[slug]"  value="<?=$story->getSlug();?>"/>

    <div class="row">
        <input type="text" name="data[title]" value="<?=$story->getTitle();?>" placeholder="Titre" required/>
    </div>
    <div class="row flex">
        <label>
            <input type="radio" name="data[type]" class="selectType" value="litterature" <?= checked('litterature', $story->getType());?> required/>
            <span>Littérature</span>
        </label>
        <label>
            <input type="radio" name="data[type]" class="selectType" value="cinema" <?= checked('cinema', $story->getType());?>/>
            <span>Cinéma</span>
        </label>
    </div>

    <h4 id="resumeButton">
        Résumé
    </h4>
    <div id="row">
        <textarea name="data[resume]" id="data-resume"  data-autoresize rows="3" placeholder="Résumé" required><?=$story->getResume();?></textarea>
    </div>
    <b>Aide à la création de résumé</b><i class="material-icons iconRight showInfoBelow">add_circle</i>    
    <div id="" class="row blockInformation">
        <div class="row">
            <input type="text" name="data[when]" id="data-when" placeholder="Quand se déroule le récit ?" class="dataResumeItem" value="<?=$story->getWhen();?>">
        </div>

        <div class="row">
            <input type="text" name="data[where]" id="data-where" placeholder="Où ?" class="dataResumeItem" value="<?=$story->getWhere();?>">
        </div>

        <div class="row">
            <input type="text" name="data[who]" id="data-who" placeholder="Qui est le personnage principal ?" class="dataResumeItem" value="<?=$story->getWho();?>">
        </div>

        <div class="row">
            <input type="text" name="data[what]" id="data-what" placeholder="Quoi ? Que veut le personnage principal ?" class="dataResumeItem" value="<?=$story->getWhat();?>">
        </div>

        <div class="row">
            <input type="text" name="data[how]" id="data-how" placeholder="Comment veut-il y atteindre son but ?" class="dataResumeItem" value="<?=$story->getHow();?>">
        </div>

        <div class="row">
            <input type="text" name="data[why]" id="data-why" placeholder="Pourquoi ?" class="dataResumeItem" value="<?=$story->getWhy();?>">
        </div>
    </div>

  
    <br/><br/>
    <div class="row" id="sectionTheme">
        <h4>Thèmes abordés</h4>
        <div id="themeTag"><?=$story->getThemesTag(true);?></div>
        <input type="text" name="data[addTheme]" id="data-theme" data-href="<?= path('searchThemeList');?>" placeholder="ajouter un thème">
        <div id="themeList"></div>
        <input type="hidden" name="data[themes_id_list]" id="data-theme-list" value="<?=$story->getThemesIdList(true);?>"/>
    </div>

    <div class="row">
        <h4>
            Personnages
            <i class="material-icons iconRight" id="addCharacter">add_circle</i>
        </h4>
        <div id="personaTag"><?= $story->getPersonasTag(true);?></div>
        <input type="hidden" name="data[personas_id_list]" id="data-persona-list" value="<?=$story->getPersonasIdList();?>"/>
    </div>

    <div class="row">
        <h4>
            Déroulement de l'histoire
        </h4>
        <textarea name="data[initial]" placeholder="Situation initiale" required><?=$story->getInitial();?></textarea>
        <textarea name="data[trigger_event]" placeholder="Evènement déclencheur" required><?=$story->getTriggerEvent();?></textarea>
        <textarea name="data[flow]" placeholder="Les différentes péripéties" required><?=$story->getFlow();?></textarea>
        <textarea name="data[climax]" placeholder="Point culminant" required><?= $story->getClimax();?></textarea>
        <textarea name="data[outcome]" placeholder="Dénouement" required><?= $story->getOutcome();?></textarea>
        <textarea name="data[final]" placeholder="Situation finale" required><?= $story->getFinal();?></textarea>
    </div>

    <div class="row">
        <h4>
            Le récit
        </h4>
        
        <div class="row">
            <label>
                <input type="checkbox" name="data[focalisation]" value="interne" <?= checked('interne', $story->getFocalisation());?>/>
                <span>Un des personnages raconte l'histoire</span>
            </label>
            <i class="material-icons iconRight showInfoBelow">info</i>
            <div class="describeInformation blockInformation"l>
                <h5>Focalisation Interne</h5>
                <ol>
                    <li>Le narrateur est à l'intérieur d'un personnage et perçoit ce que le personnage voit et ressent.</li>
                    <li>La « caméra » est donc subjective et incomplète.</li>
                    <li>Il y a présence de verbes de perceptions, de tout ce qui facilite le regard (fenêtres...) et de tout ce qui repère l'espace par rapport au personnage (à droite, en face...)</li>
                    <li>Le narrateur en sait autant que les personnages. ( P=L )</li>
                    d'après <a href="https://fr.wikipedia.org/wiki/Focalisation_(narratologie)" target="_blank">Wikipédia</a> 
                </ol>
            </div>
        </div>
        <div class="row">
            <label>
                <input type="checkbox" name="data[focalisation]" value="externe" <?= checked('externe', $story->getFocalisation());?>/>
                <span>Un narrateur fictif décrit l'histoire</span>
            </label>
            <i class="material-icons iconRight showInfoBelow">info</i>
            <div class="describeInformation blockInformation"l>
                <h5>Focalisation Externe</h5>
                <ol>
                    <li>Le narrateur voit tout de l'extérieur, comme une caméra de surveillance qui n'enregistre que les actions ou comme un témoin étranger à l'action.</li>
                    <li>Il n'y a pas de justification, la narration reste totalement neutre et objective.</li>
                    <li>Le personnage est donc supérieur au lecteur. P>L.</li>
                    d'après <a href="https://fr.wikipedia.org/wiki/Focalisation_(narratologie)" target="_blank">Wikipédia</a> 
                </ol>
            </div>
        </div>

        <div class="row">
            <label>
                <input type="checkbox" name="data[focalisation]" value="zero" <?= checked('zero', $story->getFocalisation());?>/>
                <span>Le narrateur est un dieu, il est omniscient</span>
            </label>
            <i class="material-icons iconRight showInfoBelow">info</i>
            <div class="describeInformation blockInformation"l>
                <h5>Focalisation omnisciente ou zéro</h5>
                <ol>
                    <li>C'est le point de vue d'un dieu, d'un narrateur démiurge, qui sait tout sur les personnages. C'est donc une focalisation totale, subjective et exhaustive.</li>
                    <li>Il connait leurs pensées, leurs sentiments, leur passé, leur avenir et il est capable de dire ce qui se passe dans plusieurs endroits à la fois.</li>
                    <li>Le lecteur en sait donc plus que les personnages. P<L.</li>
                    d'après <a href="https://fr.wikipedia.org/wiki/Focalisation_(narratologie)" target="_blank">Wikipédia</a> 
                </ol>
            </div>
        </div>
        
    </div>

    <div class="row" id="sectionGenre">
        <h4>Genre du récit</h4>
        <div id="genreTag"><?=$story->getGenresTag(true);?></div>
        <input type="text" name="data[addGenre]" id="data-genre" data-href="<?= path('searchGenreList');?>" placeholder="ajouter un genre">
        <div id="genreList"></div>
        <input type="hidden" name="data[genres_id_list]" id="data-genre-list" value="<?=$story->getGenresIdList(true);?>"/>
    </div>
    

    <div class="row" id="sectionGenre">
        <h4>Point de vue</h4>
        <h5>Qualité</h5>
        <i class="describeInformation">
            Quel est pour vous la qualité esthétique / narrative du récit
            <br/> (style, image, son, narration, etc.)
        </i>
        <textarea name="data[story_quality]" placeholder="Qualité esthétique" required><?=$story->getStoryQuality();?></textarea>
    
        <h5>Différence</h5>
        <i class="describeInformation">
            Quel est l'élement qui fait que ce récit est différent des autres
            <br/>
            (thème, idéee, non respect du genre, esthétique, personnage, non respect du schéma narratif, narration)
        </i>
        <textarea name="data[story_difference]" placeholder="Qualité distinctive" required><?=$story->getStoryDifference();?></textarea>
    </div>



    <div class="row">
        <h4>Réception de l'oeuvre</h4>

        <input type="number" name="data[date_parution]" placeholder="Année de parution" value="<?=$story->getDateParution();?>" required/>


        <h5>Contexte de parution</h5>
        <i class="describeInformation">
            Comment a été reçu l'oeuvre lors de sa parution, que se passait-il à ce moment là ?
            <br/> (contexte sociale, économique, historique, etc.)
        </i>
        <textarea name="data[contexte_parution]" placeholder="Contexte" required><?=$story->getContexteParution();?></textarea>
    
        <h5>Actualité</h5>
        <i class="describeInformation">
            Si l'oeuvre n'est pas contemporaine, que raconte-t-elle de nous aujourd'hui ? En quoi a-t-elle toujours du sens ?
        </i>
        <textarea name="data[reception]" placeholder="Réception actuelle" required><?=$story->getReception();?></textarea>
    </div>


    <div class="row">
        <h4>Information sur l'oeuvre</h4>

        <?php if($story->getType() == "litterature") { $display = "display: block" ;} else { $display = "display:none" ;}?>
        <div id="litteratureInformationType" style="<?= $display;?>" class="informationType">
            <h4>Auteur</h4>
            <input type="hidden" name="author[id]" value="<?php if($story->getAuthor()) echo $story->getAuthor()->getId();?>"/>
            <input type="text" name="author[firstname]" placeholder="Prénom" value="<?php if($story->getAuthor()) echo $story->getAuthor()->getFirstname();?>"/>
            <input type="text" name="author[lastname]" placeholder="Nom" value="<?php if($story->getAuthor()) echo $story->getAuthor()->getLastname();?>"/>
            <textarea name="author[information]" placeholder="Information sur l'auteur"><?php if($story->getAuthor()) echo $story->getAuthor()->getInformation();?></textarea>
        </div>

        <?php if($story->getType() == "cinema") { $display = "display: block" ; } else { $display = "display:none" ;}?>
        <div id="cinemaInformationType" style="<?= $display;?>" class="informationType">
            <h4>Réalisateur</h4>
            <input type="hidden" name="director[id]" value="<?php if($story->getDirector()) echo $story->getDirector()->getId();?>"/>
            <input type="text" name="director[firstname]" placeholder="Prénom" value="<?php if($story->getDirector()) echo $story->getDirector()->getFirstname();?>"/>
            <input type="text" name="director[lastname]" placeholder="Nom" value="<?php if($story->getDirector()) echo $story->getDirector()->getLastname();?>"/>
            <textarea name="director[information]" placeholder="Information sur le réalisateur"><?php if($story->getDirector()) echo $story->getDirector()->getInformation();?></textarea>
        </div>

    </div>

    <h4>La fiche est</h4>
    <div class="row flex">
        <label>
            <input type="radio" name="data[visibility]" value="private" <?= checked('private', $story->getVisibility());?> required/>
            <span>Privée</span>
        </label>

        <label>
            <input type="radio" name="data[visibility]" value="public" <?= checked('public', $story->getVisibility());?>/>
            <span>Publique</span>
        </label>
    </div>

    <br/><br/>
    <div class="row">
        <input type="submit" class="btn btn-width" value="<?= $text;?>"/>
    </div>
</form>

<input type="hidden" value="<?= path('retrievePersonaAjax');?>" name="updatePersonaAjaxUrl" id="updatePersonaAjaxUrl"/>

<script src="<?= JS ;?>story/create.js"></script>
