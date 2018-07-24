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

        header('Location: index.php?action=managePosts');
    }
}

function listPostsBack()
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();
    require('view/backend/managePostsView.php');
}

function deletePost($postId)
{
    $postManager = new PostManager();
    $affectedLines = $postManager->postDelete($postId);
    if ($affectedLines === false) {
        throw new Exception('Impossible de supprimer l\'article');
    }
    else {

        header('Location: index.php?action=managePosts');
    }
}

function editPost($id, $title, $author, $content)
{
    $postManager = new PostManager();
    $affectedLines = $postManager->postEdit($id, $title, $author, $content);
    if ($affectedLines === false) {
        throw new Exception('Impossible d\'éditer l\'article');
    }
    else {
        header('Location: index.php?action=post&id='.$id);

    }

}
function viewEditPost($postId)
{
    $postManager = new PostManager();
    $post = $postManager->getPost($postId);
    require('view/backend/editPostView.php');
}




