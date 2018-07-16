<?php
require_once("model/Manager.php");
class LogManager extends Manager
{
    //fonction de la classe
    public function getMember($nickname)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, password, FROM members WHERE nickname = :nickname');;
        $req->execute(array('nickname' => $nickname));
        $result = $req->fetch();

        return $result;
    }

}
