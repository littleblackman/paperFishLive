<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Paper Fish</title>

    <meta name="description" content="PaperFish est une application de gestion de fiches dédiée à l'apprentissage : vous pouvez créer des fiches de définitions, comme des fiches des lectures de romans ou de films" />
    <meta name="generator" content="ETSIK FRAMEWORK" />
    <meta name="publisher" content="Sandy Razafitrimo - ETSIK" />
    <meta name="author" content="Sandy Razafitrimo, littleblackman, etsik" />
    <meta name="copyright" content="© ETSIK" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta name="robots" content="index,follow" />

    <!-- favicon  -->


     <!-- opengraph --->



    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <!-- CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?= CSS ;?>materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />

    <link href="<?= HOST ;?>app/core/css/framework.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="<?= CSS ;?>style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

    <script src="https://unpkg.com/gojs/release/go-debug.js"></script>


</head>
<body>
    <?php include(CORE.'template/sessionBarContent.php');?>
    <?php include(CORE.'template/flashMessageBar.php');?>


    <header id="topHead">
        <nav> 
            <a href="<?= path('home');?>">
                <img src="<?= IMG ;?>paperfish.png" alt="logo de l'application Paper Fish" />
            </a>

            <?php if($app_session->isLogged()):?>
                <a class="collection-item" href="<?= path('account');?>" title="Mon Compte   ">
                    <div class="initials">
                        <?= $app_session->getInitials();?>
                    </div>
                </a>
                <i class="material-icons" id="headMenu">more_vert</i>
            <?php else :?>
                <a href="<?= path('login');?>">Connexion</a>
                <a href="<?= path('register');?>">Inscription</a>
            <?php endif;?>
        </nav>
        <div id="contentMenu">
                <div class="collection">
                        <a class="collection-item" href="<?= path('definition');?>">Les définitions</a>
                        <a class="collection-item" href="<?= path('story');?>">Les récits</a>
                        <a class="collection-item" href="<?= path('logout');?>">Déconnexion</a>
                </div>
        </div>
    </header>

    <main>
        <?= $contentPage ;?>
    </main>

  <script src="<?= JS ;?>materialize.js"></script>
  <script src="<?= JS ;?>init.js"></script>
  <script src="<?= JS ;?>main.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

</body>
</html>
