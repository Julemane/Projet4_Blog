<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/LogManager.php');


function listPosts()
{
    $postManager = new PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet
    //affichage de la liste des billets
    require('view/frontend/listPostsView.php');
}

function post()
{
    //temporaire : conditionne le login
    $user = false;

    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);
    //On affiche la possibilité ou non de commenté en fonction du status de l'utilisateur
    if ($user == true)
    {
    require('view/frontend/logedPostView.php');
    }
    else
    {
    require('view/frontend/unlogedpostView.php');
    }

}

function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);


    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}


function verifyMember($password, $nickname)
{
    $logManager = new LogManager();
    $member = $logManager->getMember($nickname);
    var_dump($member);

    $isPasswordCorrect = password_verify($password, $member['password']);
    if (!$member)

    {
        echo 'Mauvais identifiant ou mot de passe !';

    }
    else
    {
    //Creation des variables de session
        if ($isPasswordCorrect) {
                echo 'connecté';
        }
        else {

            echo 'Mauvais identifiant ou mot de passe !';

        }
    }




}
