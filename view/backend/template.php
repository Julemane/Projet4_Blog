<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" />
    </head>

    <body>
      <!--Debut header-->
      <?php
        include("include/header.php"); ?>
       <!--Fin header-->
       <nav id=adminNav>
        <ul>
          <li><a href="index.php?action=writeNewPost">Ecrire un nouvel article</a></li>
          <li><a href="index.php?action=managePosts">Gestion des articles</a></li>
          <li><a href="index.php?action=manageComments">Gestion des commentaires</a></li>






       </nav>

      <?= $content ?>

      <!--Debut footer-->

      <!--Fin footer-->

    </body>
</html>
