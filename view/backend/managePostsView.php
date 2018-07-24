<?php $title = SITE_NAME.'-'.'Gestion des articles'; ?>


<?php ob_start(); ?>

<table>
    <tr>
        <th>ID</th>
        <th>Titre</th>
        <th>Auteur</th>
        <th>Date de creation</th>
        <th>Editer</th>
        <th>Supprimer</th>
    </tr>

    <tr>
        <?php
        while ($data = $posts->fetch()) {
            ?>

        <td><?php echo nl2br(htmlspecialchars($data['id'])); ?></td>
        <td><?php echo htmlspecialchars($data['title']); ?></td>
        <td><?php echo htmlspecialchars($data['author']); ?></td>
        <td><?php echo htmlspecialchars($data['creation_date_fr']); ?></td>
        <td><a href="../index.php?action=editPostView&amp;id=<?php echo $data['id']; ?>">Editer</a></td>
        <td><a href="../index.php?action=deletePost&amp;id=<?php echo $data['id']; ?>">Supprimer</a></td>

    </tr>

        <?php
        }
        $posts->closeCursor();
        ?>

    </table>


<?php $content = ob_get_clean(); ?>


<?php require('view/backend/template.php'); ?>
