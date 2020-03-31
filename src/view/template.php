<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $app_session->getTitlePage();?></title>

    <meta name="description" content="<?= $app_session->getDescriptionPage();?>" />
    <meta name="generator" content="ETSIK FRAMEWORK" />
    <meta name="publisher" content="Sandy Razafitrimo - ETSIK" />
    <meta name="author" content="Sandy Razafitrimo, littleblackman, etsik" />
    <meta name="copyright" content="© ETSIK" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta name="robots" content="index,follow" />

    <!-- manifest  -->
    <link rel="icon" type="image/png" href="<?= IMG;?>paperfish-266x266.png" />

    <link rel= "manifest" href= "<?= HOST;?>manifest.json">
    <meta name="msapplication-TileColor" content="#111d5e">
    <meta name="msapplication-TileImage" content="<?= ASSETS;?>favicon/ms-icon-144x144.png">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="application-name" content="paperFish">
    <meta name="apple-mobile-web-app-title" content="paperFish">
    <meta name="theme-color" content="#ffbd69">
    <meta name="msapplication-navbutton-color" content="#ffbd69">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="msapplication-starturl" content="www.paperfish.io">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="apple-touch-icon" href="<?= ASSETS;?>favicon/android-icon-192x192-dunplab-manifest-1324.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= ASSETS;?>favicon/apple-icon-152x152-dunplab-manifest-1324.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= ASSETS;?>favicon/apple-icon-180x180-dunplab-manifest-1324.png">
    <link rel="apple-touch-icon" sizes="167x167" href="<?= ASSETS;?>favicon/apple-icon-152x152-dunplab-manifest-1324.png">


        <!-- twitter card -->
    <meta name="twitter:card" content="PaperFish, Outil de création de fiches" />
    <meta name="twitter:site" content="www.paperfish.io" />
    <meta name="twitter:creator" content="@littleblackman" />

     <!-- opengraph --->
    <meta property="og:title" content="<?= $app_session->getTitlePage();?>" />
    <meta property="og:type" content="application" />
    <meta property="og:url" content="<?= $app_session->getRequest()->getAbsoluteUrl();?>" />
    <meta property="og:description" content="<?= $app_session->getDescriptionPage();?>" />

    <meta property="og:image" content="<?= IMG;?>paperfish-266x266.jpg" />
  
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

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
                        <a class="collection-item" href="<?= path('sheet');?>">Les définitions</a>
                        <a class="collection-item" href="<?= path('story');?>">Les récits</a>
                        <a class="collection-item" href="<?= path('logout');?>">Déconnexion</a>
                </div>
        </div>
    </header>

    <main>
        <?= $contentPage ;?>
    </main>


  <footer class="page-footer" style="margin-top: 200px">
    <div class="container" style="font-size: 0.7em">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">PAPER FISH</h5>
          <p class="grey-text text-lighten-4">
              Application de créations de fiches.<br/>Partagez le lien à vos amis pour réviser.
          </p>
          <h5 class="white-text">Réseaux Sociaux</h5>
          <ul>
            <li><a class="grey-text text-lighten-3" target="_blank" href="https://www.etsik.com">etsik</a></li>
            <li><a class="grey-text text-lighten-3" target="_blank" href="https://www.facebook.com/etsikDigital/">Facebook</a></li>
            <li><a class="grey-text text-lighten-3" target="_blank" href="https://www.instagram.com/sandyetsik/">Instagram</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright" style="display: flex; font-size: 0.8em">
      <div class="container">
      © 2019 copyright etsik
      <a class="grey-text text-lighten-4 right" target="_blank" href="http://www.littleblackman.me">le site de litteblackman</a>
      </div>
    </div>
  </footer>

  <script src="<?= JS ;?>materialize.js"></script>
  <script src="<?= JS ;?>init.js"></script>
  <script src="<?= JS ;?>main.js"></script>

  <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

</body>
</html>
