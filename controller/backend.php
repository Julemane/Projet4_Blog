<?php
require_once('model/PostManager.php');
require_once('model/CommentManager.php');



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
        header('location:index.php?action=post&id='.$id);
    }
}

function viewEditPost($postId)
{
    $postManager = new PostManager();
    $post = $postManager->getPost($postId);
    require('view/backend/editPostView.php');
}

function listCommentsBack()
{
    $commentManager = new CommentManager();
    $comments = $commentManager->getAllComments();
    require('view/backend/manageCommentsView.php');
}

function signalCom($comId)
{
    $commentManager = new CommentManager();
    $affectedLines = $commentManager->warnedCom($comId);
    try{
        if ($affectedLines === false) {
            throw new Exception('Impossible de signaler le commentaire');
        }else {
            throw new Exception('Commentaire signalé avec succès');
        }
    }
    catch(Exception $e){
         $message = $e->getMessage();
         //On récupère l'id de l'article sur lequel était l'user avant signalement
         $chaine = $_SERVER['HTTP_REFERER'];
         $postId = substr($chaine, strlen($chaine) - 2);
         //La fonction va renvoyer l'user sur l'article dont il a signalé le commentaire et affiche le message
         signaledCommentPost($postId, $message);
         header('location:index.php?action=post&id='.$postId);
    }
}
//get postbycomment(idcom)
//return postId

function viewEditCom($comId)
{
     $commentManager = new CommentManager();
     $comment = $commentManager->getComment($comId);
     require('view/backend/editCommentView.php');
}

function editCom($id, $author, $comment, $status)
{

    $commentManager = new CommentManager();
    $affectedLines = $commentManager->commentEdit($id, $author, $comment, $status);
    if ($affectedLines === false) {
        throw new Exception('Impossible d\'éditer le commentaire');

    }
    else {
        header('location:index.php?action=manageComments');
    }

}
function deleteCom($comId)
{
    $commentManager = new CommentManager();
    $affectedLines = $commentManager->commentDelete($comId);
    if ($affectedLines === false) {
        throw new Exception('Impossible de supprimer l\'article');
    }
    else {

        header('location:index.php?action=manageComments');
    }
}


