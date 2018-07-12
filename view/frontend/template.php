<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" />
    </head>

    <body>
      <header>
        <?php include("include/header.php"); ?>
      </header>


      <?= $content ?>
    </body>
</html>
