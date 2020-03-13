<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Paper Fish</title>

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <!-- CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?= CSS ;?>materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="<?= CSS ;?>style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

</head>
<body>
    <header id="topHead">
        <nav>
            <img src="<?= IMG ;?>paperfish.png" alt="logo de l'application Paper Fish" />
            <a href="#">Home</a>
            <a href="<?= path('login');?>">Se connecter</a>
            <a href="<?= path('register');?>">Créer son compte</a>
        </nav>
    </header>

    <main>

        <?= $contentPage ;?>

    </main>


  <script src="<?= JS ;?>materialize.js"></script>
  <script src="<?= JS ;?>init.js"></script>

</body>
</html>
