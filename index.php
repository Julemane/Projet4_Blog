<?php
require('controller/frontend.php');
//Routeur

try {

    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
                listPosts();
        }

        elseif ($_GET['action'] == 'post') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    post();
                }
                else {
                    throw new Exception('Aucun identifiant de billet envoyé');
                }
        }
        //Ajoyter un commentaire
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                        addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }else{
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        //Login d'un membre existant
        elseif ($_GET['action'] == 'login'){
            if (isset($_POST['userNickname']) && !empty($_POST['userNickname']) && isset($_POST['userPassword']) && !empty($_POST['userPassword']))
            {
                verifyMember($_POST['userPassword'], $_POST['userNickname']);
            }else{
                throw new Exception('Tous les champs ne sont pas remplis');
            }
        }
        //redirection vers la View de creation de membre
        elseif ($_GET['action'] == 'creationUser') {
           require('view/frontend/newAcountView.php');
        }
        //Creation d'un nouveau membre
        elseif ($_GET['action'] == 'newUser') {
            if (isset($_POST['nickname']) && !empty($_POST['nickname'])
                && isset($_POST['mail']) && !empty($_POST['mail'])
                && isset($_POST['password']) && !empty($_POST['password'])
                && isset($_POST['password2']) && !empty($_POST['password2']))
            {
                addMember($_POST['nickname'], $_POST['mail'], $_POST['password'], $_POST['password2']  );
            }else {
                throw new Exception('Tous les champs ne sont pas remplis');
            }
        }
        //logout membre
        elseif ($_GET['action'] == 'logout'){
            logout();
        }

    }
    //Affichage de la liste des billets
    else{
        listPosts();
        }
}

//Gestion des erreurs
catch(Exception $e) {
    //passage du message d'erreur a listPost et affichage dans listPostsView
    //listPosts($e->getMessage());
    echo 'Erreur : ' . $e->getMessage();

}
