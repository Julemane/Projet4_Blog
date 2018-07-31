<?php $title = SITE_NAME; ?>

<?php ob_start(); ?>


<?php
while ($data = $posts->fetch())
{
?>
<div class="card mb-4">
    <div class="card-body">
        <h2 class="card-title"><?= htmlspecialchars($data['title']) ?></h2>
        <p class="card-text"><?= nl2br($data['post_summary'])?>...</p>
        <a href="index.php?action=post&amp;id=<?= $data['id'] ?>" class="btn btn-primary">Lire la suite</a>
    </div>
    <div class="card-footer text-muted">
       Le <?= $data['creation_date_fr'] ?> par <?= $data['author'] ?>
    </div>
</div>



<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
