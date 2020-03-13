<section>

<h2>Créer son compte</h2>

    <form action="<?= path('createUser');?>" method="post">

        <input type="email" name="data[email]" placeholder="email"/>
        <input type="password" name="data[password]" placeholder="password"/>

        <input type="submit" class="btn" name="créer" />

    </form>

</section>