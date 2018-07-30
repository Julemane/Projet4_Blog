<?php $title = SITE_NAME.'-'.'Administration'; ?>


<?php ob_start(); ?>
<div class="row" id="adminCards">
  <div class="col-md-6">
      <!-- Gestion des articles-->
    <div class="card my-4">
      <h5 class="card-header">Gestion des articles</h5>
      <div class="card-body">
        <div class="input-group">
          <a href="index.php?action=writeNewPost">Ecrire un nouvel article</a>
          <a href="index.php?action=managePosts">Editer / supprimer un article publié</a>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-6">
      <!-- Gestion des commentaires-->
    <div class="card my-4">
      <h5 class="card-header">Gestion des commentaires</h5>
      <div class="card-body">
        <div class="input-group">
          <a href="index.php?action=manageComments">Afficher les commentaires</a>
        </div>
      </div>
    </div>
  </div>

</div>











<?php $content = ob_get_clean(); ?>


<?php require('view/backend/template.php'); ?>
