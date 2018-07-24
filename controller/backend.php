<?php
require_once('model/PostManager.php');


function newPost($title, $author, $content)
{
  $PostManager = new PostManager();
  $affectedLines = $PostManager->writePost($title, $author, $content);
    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter un article');
    }
    else {
        $adminInfo = "article publié avec succes";
        require('view/backend/newPostView.php');

    }
}

function listPostsBack()
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();
    require('view/backend/managePostsView.php');
}





