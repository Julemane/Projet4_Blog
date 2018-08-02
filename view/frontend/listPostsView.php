<?php $title = SITE_NAME; ?>

<?php ob_start(); ?>


<?php
while ($data = $posts->fetch())
{
?>
<div class="card mb-4">
  <img class="card-img-top" src="<?php echo $data['post_img']?>" alt="illustration article">
    <div class="card-body">
        <h3 class="card-title"><?= htmlspecialchars($data['title']) ?></h3>
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
