<?php $title = SITE_NAME.'-'.'Ecrire un article'; ?>


<?php ob_start(); ?>
<span>
  <?php
    if(isset($adminInfo)){
      echo $adminInfo;
    }
  ?>
</span>
<form action="index.php?action=newPost" method="post">
  <p>
    <label>Auteur
      <input type="text" name="author" value="" required>
    </label>
  </p>
  <p>
    <label>Titre
      <input type="text" name="title" required>
    </label>
  </p>
  <p>
    <label>Contenu de votre article
      <textarea name="content" rows="10" cols="50">
      </textarea>
  </label>
  </p>
  <input type="submit" value="Publier">
</form>

<?php $content = ob_get_clean(); ?>


<?php require('view/backend/template.php'); ?>
