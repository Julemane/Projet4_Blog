<?php
require_once("model/Manager.php");
class AuthManager extends Manager
{
    //Recherche et récupération des data du membre dans la BDD
    public function getMember($nickname)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, password, nickname, mail, userLevel FROM members WHERE nickname = :nickname');
        $req->execute(array('nickname' => $nickname));
        $result = $req->fetch();

        return $result;
    }

}
