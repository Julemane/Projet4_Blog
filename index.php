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
        //Creation d'un nouveau membre A FAIRE : AMELIORATION DES CONDITIONS
        elseif ($_GET['action'] == 'newUser') {
            if (isset($_POST['nickname']) && !empty($_POST['nickname']))
            {
                addMember($_POST['nickname'], $_POST['password'], $_POST['mail']);

            } else {
                throw new Exception('Tous les champs ne sont pas remplis ou les mots de passe ne correspondent pas');
            }
        }

    }
    //Affichage de la liste des billets
    else{
        listPosts();
        }

}

//Gestion des erreurs
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();

}
