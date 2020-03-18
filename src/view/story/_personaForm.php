<div>
    <i class="material-icons closeModal" id="closePersonaForm">close</i>
</div>
<h2>
    <span id="titlePersonaForm">Créer</span> un personnage
</h2>

<form action="<?= path('updatePersonaJson');?>" method="post" id="personaForm">

    <h4>Identité</h4>

    <input type="hidden" name="persona[id]" id="persona_id"/>
    <input type="hidden" name="narrative[id]" id="narrative_id"/>

    <div class="row">
        <input type="text" name="persona[firstname]" id="persona_firstname" placeholder="Prénom">
    </div>
     <div class="row">
        <input type="text" name="persona[lastname]" id="persona_lastname" placeholder="Nom">
    </div>
     <div class="row">
        <input type="text" name="persona[nickname]" id="persona_nickname" placeholder="Surnom">
    </div>
     <div class="row">
        <input type="number" name="persona[age]" id="persona_age" placeholder="age">
    </div>

    <br/><br/>

    <h4>Description</h4>

    <h5>Personnalité</h5>
    <i class="describeInformation">Personnalité - Décrivez les qualités, caractères et/ou compétences</i>
    <textarea name="persona[personnality]" placeholder="Personnalité" id="persona_personnality" ></textarea>

    <h5>Valeurs</h5>
    <i class="describeInformation">Fixez les valeurs qui guident le personnage (honnêté, justice, etc.)</i>
    <textarea name="persona[moral_values]" placeholder="Valeurs" id="persona_moral_values" ></textarea>

    <h5>Tâlon d'Achille</h5>
    <i class="describeInformation">Donnez le(s) point(s) faible(s) du personnage</i>
    <textarea name="persona[achilles_heel]" placeholder="Point faible" id="persona_achilles_heel"></textarea>
    
    <h5>Statut social</h5>
    <i class="describeInformation">Expliquez le contexte social du personnage</i>
    <textarea name="persona[social_standing]" placeholder="Statut social" id="persona_social_standing" ></textarea>
    
    <h5>Philsophie/Croyance</h5>
    <i class="describeInformation">Donnez le point  de vue sur la vie, ses croyances</i>
    <textarea name="persona[philosophy]" placeholder="Philosophie/Croyance" id="persona_philosophy"></textarea>
    
    <h5>Background</h5>
    <i class="describeInformation">Décrivez les évènements dans la vie du personnage qui explique qui il est, ce qu'il est devenu (ex: Quel évènement a contribué à son cynisme)</i>
    <textarea name="persona[background]" placeholder="Background" id="persona_background"></textarea>

    <br/><br/>

    <h4>Rôle dans l'histoire</h4>

    <h5>Quête / Mission</h5>
    <i class="describeInformation">Donnez l'objectif du personnage, ce qu'il doit réaliser dans l'histoire (ex: "Tuer le méchant")</i>
    <input type="text" name="narrative[quest_item]" placeholder="Objet" id="narrative_quest_item" />

    <h5>Bénéficiaire</h5>
    <i class="describeInformation">Nommez le(s) personnage(s) bénéficiant du résultat de la quête (ex: "Le monde entier")</i>
    <input type="text" name="narrative[receiver]" placeholder="Bénéficiaire" id="narrative_receiver"/>

    <h5>Autorité</h5>
    <i class="describeInformation">C'est la personne, le groupe, l'institution qui autorise le personnage à agir (ex: M dans James Bond. Dans le cas d'un hors-la-loi, c'est lui-même)</i>
    <input type="text" name="narrative[sender]" placeholder="Autorité" id="narrative_sender"/>

    <h5>Allié(s)</h5>
    <i class="describeInformation">Ce sont les personnages, les éléments qui aident le personnage dans sa quête (R2D2, Poudlard aident les héros)</i>
    <input type="text" name="narrative[adjuvant]" placeholder="Allié(s)" id="narrative_adjuvant"/>

    <h5>Ennemie(s)</h5>
    <i class="describeInformation">Ils s'opposent aux héros dans la réalisation de sa quête (ex: Beatrix Lestrange)</i>
    <input type="text" name="narrative[opponent]" placeholder="Ennemie(s)" id="narrative_opponent"/>

    <h5>Evolution du personnage</h5>
    <i class="describeInformation">Décrivez comment le personnage évolue tout au long de l'histoire, il peut changer de rôle, d'objectifs à plusieurs reprises dans l'histoire.</i>
    <textarea name="narrative[evolution]" placeholder="Evolution" id="narrative_evolution"></textarea>

    <br/><br/><br/>
    <div class="row">
        <input type="submit" class="btn btn-width" id="submitPersonaForm" value="Créer"/>
    </div>
    <div class="row">
        <a href="<?= path('deletePersonaJson');?>" id="deletePersona" data-personaId="" class="btn btn-width pink lighten-1">Supprimer</a>
    </div>
    <br/><br/><br/>

</form>