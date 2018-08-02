<!DOCTYPE html>
<html lang="fr">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Projet 4 étudiant Openclassrooms. Réalisation d'un CMS pour un écrivain en PHP avec Mysql en suivant une architecture MVC. Intégré avec Bootstrap 4.">
    <meta name="author" content="Jérémy Hennebique">

    <meta property="og:image" content="http://blog-ecrivain.jeremy-hennebique.com/public/images/alaskaRoad.jpg" />
    <meta property="og:url" content="http://blog-ecrivain.jeremy-hennebique.com/" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Billet simple pour l'Alaska par Jean forteroche" />
    <meta property="og:description" content="Projet 4 étudiant Openclassrooms. Réalisation d'un CMS pour un écrivain en PHP avec Mysql en suivant une architecture MVC. Intégré avec Bootstrap 4." />
    <!--Vcard twitter-->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="Billet simple pour l'Alaska" />
    <meta name="twitter:creator" content="Jérémy Hennebique" />
    <!--Favincon-->

    <title><?= $title ?></title>

    <!-- Bootstrap core CSS -->
    <link href="public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="public/css/blog-home.css" rel="stylesheet">

  </head>
    <body>
        <!--Debut Nav-->
        <?php include("include/nav.php"); ?>
         <!--Fin Nav-->
        <div class="container">
          <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-8">
              <h1 class="my-4"><strong><?php echo SITE_TITLE?>
              </strong></h1>
              <?= $content ?>
            </div>
            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">
              <!-- Login-->
              <div class="card my-4">
                <h5 class="card-header">Espace membre</h5>
                <div class="card-body">
                  <div class="input-group">
                    <?php include("include/authArea.php"); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.row -->
        </div>
    <!-- /.container -->

      <!--Debut footer-->
      <?php include("include/footer.php"); ?>
      <!--Fin footer-->

      <!-- Bootstrap core JavaScript -->
    <script src="public/vendor/jquery/jquery.min.js"></script>
    <script src="public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>
</html>




