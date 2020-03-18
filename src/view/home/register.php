<section>

<h2>Créer son compte</h2>

    <form action="<?= path('createUser');?>" method="post">

        <input type="text" name="data[firstname]" placeholder="Prénom" required/>
        <input type="text" name="data[lastname]" placeholder="Nom" required/>

        <input type="email" name="data[email]" placeholder="E-mail" required/>
        <input type="password" name="data[password]" placeholder="Mot de passe" required/>

        <input type="submit" class="btn btn-width" name="Créer" />

    </form>

</section>