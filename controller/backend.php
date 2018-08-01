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

function editPost($id, $title, $author, $content, $imgUrl)
{
    if($imgUrl == null){
        $postManager = new PostManager();
        $affectedLines = $postManager->postEdit($id, $title, $author, $content);
        if ($affectedLines === false) {
            throw new Exception('Impossible d\'éditer l\'article');
        }else {
            header('location:index.php?action=post&id='.$id);
        }
     }else{
        $postManager = new PostManager();
        $affectedLines = $postManager->postEditImg($id, $title, $author, $content, $imgUrl);
        if ($affectedLines === false) {
            throw new Exception('Impossible d\'éditer l\'article');
        }
        else {
            header('location:index.php?action=post&id='.$id);
        }
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
        //On récupere l'id de l'article correspondant au commentaire
        $affectedLines = $commentManager->getPostByComment($comId);
        $postId = $affectedLines[0];
        //On envoi à la fonction post l'id de l'article qui récupere l'article et les com lié
        post($postId, $message);
    }
}


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
//upload l'image sur le serveur et retourne son URL
function getImgUrl()
{
    $target_dir = "public/images/";
    $target_file = $target_dir . basename($_FILES['image']['name']);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

    return $target_file;
}



