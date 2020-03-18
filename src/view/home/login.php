<section>

    <h2>Se connecter</h2>

    <form action="<?= path('auth');?>" method="post">
        <input type="email" name="data[email]" placeholder="email"/>
        <input type="password" name="data[password]" placeholder="password"/>
        <input type="submit" class="btn btn-width" name="Se connecter" />

    </form>

</section>