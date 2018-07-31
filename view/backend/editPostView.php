<?php $title = SITE_NAME.'-'.'Editer un article'; ?>


<?php ob_start(); ?>
<img class="card-img-top" src="<?php echo $post['post_img']?>" alt="illustration article" enctype="multipart/form-data">
<form action="index.php?action=editPost&id=<?php echo $post['id'] ?>" method="post">
  <div class="form-group">
      <label for="author">Auteur</label>
      <input type="text" class="form-control" id="author"  placeholder="Votre peudo" name="author" value="<?php echo $post['author']; ?>" required>
  </div>
  <div class="form-group">
      <label for="title">Titre</label>
      <input type="text" class="form-control" id="title" name="title" placeholder="Titre de l'article" value="<?php echo $post['title']; ?>" required>
  </div>
  <div class="form-group">
      <label for="postContent">Contenu de l'article</label>
      <textarea id="postContent" name="content" rows="15"><?php echo $post['content']; ?></textarea>
  </div>

  <button type="submit" class="btn btn-primary">Publier</button>
</form>

<?php $content = ob_get_clean(); ?>


<?php require('view/backend/template.php'); ?>
