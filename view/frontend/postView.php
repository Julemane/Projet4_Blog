
<?php $title = SITE_NAME.'-'.htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<!--AFFICHAGE DES ARTICLES-->
<div class="container">
      <div class="row">
        <div class="col-lg-11">
          <!-- Title -->
          <h1 class="mt-4"><?= htmlspecialchars($post['title']) ?></h1>
          <!-- Author -->
          <p class="lead">
            Par
            <?= $post['author'] ?>
          </p>
          <!-- Date/Time -->
          <p>Le <?= $post['creation_date_fr'] ?> </p>
          <hr>
          <img class="img-fluid rounded" src="<?php echo $post['post_img']?>" alt="illustration article">
          <hr>
          <!-- Post Content -->
          <p class="lead"><?= nl2br($post['content']) ?></p>
          <p>
            <?php
            //Mode edition depuis l'article si connecter en Admin
            if(isset($_SESSION['userLevel']) && $_SESSION['userLevel'] == 'admin'){
            ?>
                <a href="index.php?action=editPostView&amp;id=<?php echo $post['id'];?>"><button class="btn btn-secondary" type="button">Editer</button></a>

                <a href="index.php?action=deletePost&amp;id=<?php echo $post['id']; ?>"><button class="btn btn-danger" type="button" onclick="return confirm('Etes vous sur de vouloir supprimer cet article ?')">Supprimer</button></a>

            <?php
            }
            ?>
            </p>
            <hr>
<h2>Commentaires</h2>

<?php
if(isset($_SESSION['nickname']))
    {
    ?>
<!--FORMULAIRE D'ENVOI DE COMMENTAIRE SI USER CONNECTER-->
        <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
            <!-- Comments Form -->
          <div class="card my-4">
            <h5 class="card-header">Commenter cet article</h5>
            <div class="form-group">
                  <label for="nickname" class="col-md-6 col-form-label">Pseudo</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="nickname" name="author" value="<?php if(isset($_SESSION['nickname'])) echo $_SESSION['nickname'] ?>" readonly >
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                  <textarea class="form-control" id="comment" name="comment" rows="3" placeholder="Mon commentaire"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Commenter</button>
            </div>
        </div>
        </form>
        <?php
    }else{
    ?>
        <div class="card-header">
            <p>Veuillez vous authentifier pour pouvoir commenter cet article.</p>
            <p>Si vous n'avez pas encore de compte vous pouvez en créer un <a href="index.php?action=creationUser">ici</a>.</p>
        </div>
    <?php
    }

            ?>
            <span id="signalMessage">
                <p><?php
                    //message info signalement commentaire
                    if(isset($message)){

                         echo $message;
                    }
                ?>
                </p>
            </span>
            <!--AFFICHAGE DES COMMENTAIRES-->

            <?php
            while ($comment = $comments->fetch())
            {
                if($comment['status'] != 'warning')
                {

            ?>
                <div class="media mb-4">
                        <div class="media-body">
                          <h5 class="mt-0"><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></h5>
                          <?= nl2br(htmlspecialchars($comment['comment'])) ?>
                        </div>
                        <a href="index.php?action=signal&amp;id=<?php echo $comment['id'];?>"><button class="btn btn-light" type="button">Signaler</button></a></p>
                </div>

            <?php
                }else{
                    ?>
                    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
                    <p>Commentaire en attente de modération.</p>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>
<!--On insert dans la variable content le contenu ci dessus-->
<?php $content = ob_get_clean(); ?>


<?php require('view/frontend/template.php'); ?>
