<?php $title = SITE_NAME; ?>

<?php ob_start(); ?>
<p>Derniers billets du blog :</p>

<?php
while ($data = $posts->fetch())
{
?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data['title']) ?>
            <em>le <?= $data['creation_date_fr'] ?></em>
            par <?= $data['author'] ?>
        </h3>
        <p>
            <?= nl2br(htmlspecialchars($data['content']))?>
            <br />
            <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Voir l'article complet</a></em>
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
