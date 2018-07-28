<?php $title = SITE_NAME.'-'.'Editer un article'; ?>


<?php ob_start(); ?>

<form action="index.php?action=editPost&id=<?php echo $post['id'] ?>" method="post">
  <label>Titre
    <input type="text" name="title" value="<?php echo $post['title']; ?>" >
  </label>
  <label>Auteur
    <input type="text" name="author" value="<?php echo $post['author']; ?>" >
  </label>
  <label>Contenu
    <textarea id="postContent" name="content" rows="15" cols="80"/> <?php echo $post['content']; ?>  </textarea>
  </label>
  <input type="submit" name="valider" value="Valider"/>
</form>

<?php $content = ob_get_clean(); ?>


<?php require('view/backend/template.php'); ?>
