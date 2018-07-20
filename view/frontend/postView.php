
<?php $title = SITE_NAME.'-'.htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<p><a href="index.php">Retour à la liste des billets</a></p>
<!--Affichage du billets-->
<div class="news">
    <h3>
        <?= htmlspecialchars($post['title']) ?>
        <em>le <?= $post['creation_date_fr'] ?></em>
    </h3>

    <p>
        <?= nl2br(htmlspecialchars($post['content'])) ?>
    </p>
</div>
<?php
if(isset($_SESSION['nickname']))
    {
        ?>
        <!--Formulaire d'envoi de commentaire-->
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
            <input type="submit" />
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

<!--Affichage des commentaire-->
<?php
while ($comment = $comments->fetch())
{
?>
    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
<?php
}
?>
<!--On insert dans la variable content le contenu ci dessus-->
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
