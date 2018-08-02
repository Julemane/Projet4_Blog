<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" />
        <!--Empeche le referencement des page d'administration-->
        <meta name="robots" content="noindex,nofollow"/>
        <!--Script tinymce-->
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=pp4ravxp96bp5jr1g99lythy8d9dyxrx6o3fddzdaryt7fcr"></script>
        <script>tinymce.init({ selector:'textarea#postContent' });</script>

        <!-- Bootstrap core CSS -->
        <link href="public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="public/css/blog-home.css" rel="stylesheet">

    </head>

    <body>
      <!--Debut header-->
      <?php
        include("include/nav.php"); ?>
       <!--Fin header-->
       <div class="container">
          <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-8">
              <h1 class="my-4"><strong><?php echo SITE_TITLE?>
              </strong></h1>
                <h5>Vous êtes ici : <?php echo substr($title, strlen(SITE_NAME)+1); ?> </h5>
              <?= $content ?>
              <p><a href="<?php echo $_SERVER["HTTP_REFERER"] ?>">Retour à la page Précédente</a></p>

            </div>
            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">
              <!-- Login-->
              <div class="card my-4">
                <h5 class="card-header">Administrateur</h5>
                <div class="card-body">
                  <div class="input-group">
                    <?php include("include/authArea.php"); ?>
                  </div>
                </div>
              </div>
              <div class="card my-4" id="quickNav">
                <h5 class="card-header">Accès rapide</h5>
                <div class="card-body">
                  <div class="input-group">
                    <ul>
                      <li><a href="index.php?action=admin">Accueil administration</a></li>
                      <li><a href="index.php?action=writeNewPost">Ecrire un nouvel article</a></li>
                      <li><a href="index.php?action=managePosts">Gestion des articles</a></li>
                      <li><a href="index.php?action=manageComments">Gestion des commentaires</a></li>
                    </ul>

                  </div>
                </div>
              </div>

            </div>
          </div>
          <!-- /.row -->
        </div>

      <!--Debut footer-->

      <!--Fin footer-->
      <script src="public/vendor/jquery/jquery.min.js"></script>
      <script src="public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    </body>
</html>
