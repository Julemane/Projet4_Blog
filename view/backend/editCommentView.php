<?php $title = SITE_NAME.'-'.'Editer un commentaire'; ?>


<?php ob_start(); ?>
<form action="index.php?action=editComment&id=<?php echo $comment['id'] ?>" method="post">
            <div>
                <label for="author">Auteur</label><br />
                <input type="text" id="author" name="author" value="<?php echo $comment['author']; ?>" readonly />
            </div>
                <div>
                    <label for="comment">Commentaire</label><br />
                    <textarea id="comment" name="comment"><?php echo $comment['comment']; ?>
                    </textarea>
                </div>
                <div>
                  <select name="status">
                    <option value="valid">Non signalé</option>
                    <option value="warning">Signalé</option>
                  </select>
                </div>
            <div>
            <input type="submit" value="Valider le commentaire" />
            </div>
        </form>
<?php $content = ob_get_clean(); ?>


<?php require('view/backend/template.php'); ?>
