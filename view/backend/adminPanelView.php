<?php $title = SITE_NAME.'-'.'Administration'; ?>



<?php ob_start(); ?>
 <p>Bienvenue dans votre espace d'administration</p>
  <span>
    <?php
      if(isset($adminInfo)){
      echo $adminInfo;
      }
    ?>
  </span>







<?php $content = ob_get_clean(); ?>


<?php require('view/backend/template.php'); ?>
