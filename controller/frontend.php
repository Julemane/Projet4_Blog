<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/LogManager.php');
require_once('model/RegisterManager.php');


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


function verifyMember($userPassword, $userNickname)
{
    $logManager = new LogManager();
    $member = $logManager->getMember($userNickname);

    var_dump($member);
    var_dump($userPassword);
    //comparaison du mdp saisie avec le mdp hash de la bdd
    $isPasswordCorrect = password_verify($userPassword, $member['password']);
    //Si $member=false le membre n'est pas existant en bdd
    if (!$member)
    {
        throw new Exception('Mauvais utilisateur ou mot de passe!');
    }
    else
    //Le membre existe 2 possibilité le mdp corresponds
    {
    //A FAIRE : Creation des variables de session
        if ($isPasswordCorrect) {
                echo 'connecté';
        }
    //Le mdp corresponds pas
        else {

            throw new Exception('Mauvais utilisateur ou mot de passe!');
        }
    }
}

//Passage en parametres des variables d'information récupérer par le formulaire
function addMember($nickname, $password, $mail)
{

        $registerManager = new RegisterManager();
        //Vérification de l'existance ou non du pseudo dans la bdd
        $checkMember = $registerManager->checkNickname($nickname);

        if($checkMember)
        {
             throw new Exception('Pseudo déja utilisé, veuillez en choisir un autre');

        }
        //Si le pseudo n'est pas utilisé
        else{
            //transformation du pass en pass haché
            $pass_hash = password_hash($password, PASSWORD_DEFAULT);

            //envoi au modele pour insertion dans BDD
            $push = $registerManager->pushMember($nickname, $pass_hash, $mail);
        }



}
