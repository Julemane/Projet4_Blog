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
    $loggeduser = true;

    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);
    //On affiche la possibilité ou non de commenté en fonction du status de l'utilisateur
    if ($loggeduser == true)
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


function verifyMember($checkPassword, $checkNickname)
{
    $logManager = new LogManager();
    $member = $logManager->getMember($checkNickname);

    var_dump($member);
    var_dump($checkPassword);
    //comparaison du mdp saisie avec le mdp hash de la bdd
    $isPasswordCorrect = password_verify($checkPassword, $member['password']);
    //Si $member=false le membre n'est pas existant en bdd
    if (!$member)

    {
        echo 'Mauvais utilisateur ou mot de passe!';

    }
    else
    //Le membre existe 2 possibilité le mdp corresponds
    {
    //Creation des variables de session
        if ($isPasswordCorrect) {
                echo 'connecté';
        }
    //Le mdp corresponds pas
        else {

            echo 'Mauvais utilisateur ou mot de passe!';

        }
    }

//Passage en parametres des variables d'information récupérer par le formulaire
function addMember()
    {
        //creation new RegisterManager()
        //$newMember = $RegisterManager pushMember(pseudo, mdp , mail)
        //transformation du pass en pass haché

        //Vérification de l'existance ou non du pseudo dans la bdd
    }

}
