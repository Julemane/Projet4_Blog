
<?php $title = SITE_NAME.'-'.htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<!--AFFICHAGE DES ARTICLES-->
<div class="news">
    <h3>
        <?= htmlspecialchars($post['title']) ?>
        <em>le <?= $post['creation_date_fr'] ?></em>
    </h3>

    <p>
        <?= nl2br(htmlspecialchars($post['content'])) ?>
    </p>
    <p>
            <?php
            //Mode edition depuis l'article si connecter en Admin
            if(isset($_SESSION['userLevel']) && $_SESSION['userLevel'] == 'admin'){
            ?>
                <a href="index.php?action=editPostView&amp;id=<?php echo $post['id'];?>"><button type="button">Editer</button></a>

                <a href="index.php?action=deletePost&amp;id=<?php echo $post['id']; ?>"><button type="button" onclick="return confirm('Etes vous sur de vouloir supprimer cet article ?')">Supprimer</button></a>

            <?php
            }
            ?>
    </p>
</div>
<?php
if(isset($_SESSION['nickname']))
    {
        ?>
<!--FORMULAIRE D'ENVOI DE COMMENTAIRE SI USER CONNECTER-->
        <h2>Commentaires</h2>
        <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
            <div>
                <label for="author">Auteur</label><br />
                <input type="text" id="author" name="author" value="<?php if(isset($_SESSION['nickname'])) echo $_SESSION['nickname'] ?>" readonly />
            </div>
                <div>
                    <label for="comment">Commentaire</label><br />
                    <textarea id="comment" name="comment"></textarea>
                </div>
            <div>
            <input type="submit" value="Commenter" />
            </div>
        </form>
        <?php
    }else{
        ?>
        <p>Veuillez vous authentifier pour pouvoir commenter cet article.</p>
        <p>Si vous n'avez pas encore de compte vous pouvez en créer un <a href="index.php?action=creationUser">ici</a>.</p>
        <?php
    }

?>
<p><?php
    //message info signalement commentaire
    if(isset($message)){
        echo $message;
    }
?>
</p>
<!--AFFICHAGE DES COMMENTAIRES-->

<?php
while ($comment = $comments->fetch())
{
    if($comment['status'] != 'warning')
    {

?>
    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
    <a href="index.php?action=signal&amp;id=<?php echo $comment['id'];?>"><button type="button">Signaler</button></a></p>

<?php
    }else{
        ?>
        <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
        <p>Commentaire en attente de modération.</p>
        <?php
    }
}
?>
<!--On insert dans la variable content le contenu ci dessus-->
<?php $content = ob_get_clean(); ?>


<?php require('view/frontend/template.php'); ?>
