<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
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
<!--Formulaire d'envoi de commentaire-->
<h2>Commentaires</h2>
<p>Veuillez vous connecter pour poster un commentaire</p>
<!-- Include page de login-->
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
