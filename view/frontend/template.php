<!DOCTYPE html>
<html lang="fr">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

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




