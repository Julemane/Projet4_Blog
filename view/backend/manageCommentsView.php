<?php $title = SITE_NAME.'-'.'Gestion des commentaires'; ?>


<?php ob_start(); ?>

<table>
    <tr>
        <th>Identifiant</th>
        <th>Article</th>
        <th>Auteur</th>
        <th>Commentaire</th>
        <th>Date de creation</th>
        <th>Statut</th>
        <th>Editer</th>
        <th>Supprimer</th>
    </tr>

    <tr>
        <?php
        while ($data = $comments->fetch()) {
            ?>

        <td><?php echo nl2br(htmlspecialchars($data['id'])); ?></td>
        <td><a href="index.php?action=post&id=<?php echo htmlspecialchars($data['post_id']); ?>">Voir l'article</a></td>
        <td><?php echo htmlspecialchars($data['author']); ?></td>
        <td><?php echo htmlspecialchars($data['comment']); ?></td>
        <td><?php echo htmlspecialchars($data['comment_date_fr']); ?></td>
        <td><?php echo htmlspecialchars($data['status']); ?></td>
        <td><a href="index.php?action=editPostView&amp;id=<?php echo $data['id']; ?>">Editer</a></td>
        <td><a href="index.php?action=deletePost&amp;id=<?php echo $data['id']; ?>" onclick="return confirm('Etes vous sur de vouloir supprimer cet article ?')">Supprimer</a></td>

    </tr>

        <?php
        }
        $comments->closeCursor();
        ?>

    </table>


<?php $content = ob_get_clean(); ?>


<?php require('view/backend/template.php'); ?>
