<?php
require_once("model/Manager.php");
class RegisterManager extends Manager

{
    //passage en parametre des valeurs du formulaire et du mdp haché
   public function pushMember($nickname, $pass_hash, $mail)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('INSERT INTO members(nickname, password, mail, inscription_date) VALUES(:nickname, :password, :mail, CURDATE())');

              //On rempli la BDD avec les infos du formulaire
              $req->execute(array(

              'nickname' => $nickname,

              'password' => $pass_hash,

              'mail' => $mail));
    }

    public function checkNickname($nicknameToCheck)
    {
      $db = $this->dbConnect();
      //requete retourne 1 si pseudo existe
      $req = $db->prepare('SELECT COUNT(*) AS nickname FROM members WHERE nickname = ?');
      $req->execute(array($nicknameToCheck));
      $nickname = $req->fetch();

      return $nickname['nickname'];
    }


}
