<?php
require_once("model/Manager.php"); // On oubli pas d'indiquer l'emplacement de la classe parente
class PostManager extends Manager //la connexion à la Bdd est maintenant herité
{
    //Retourne tous les billet de la BDD
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, author, content, post_img, LEFT(content, 250) AS post_summary, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');
        return $req;
    }
    //retourne le billet correspondant à l'id en parametres
    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, author, content, post_img, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function writePost($title, $author, $content)
    {
        $db = $this->dbConnect();
        $post = $db->prepare('INSERT INTO posts(title, author, content, creation_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $post->execute(array($title, $author, $content));
        return $affectedLines;
    }
    public function postDelete($postId) {
    $db = $this->dbConnect();
    $post = $db->prepare("DELETE FROM posts WHERE id=".$_GET['id']);
    $affectedLines = $post->execute(array($postId));
    return $affectedLines;
    }

    public function postEdit($id, $title, $author, $content, $imgUrl) {
    $db = $this->dbConnect();
    $req = $db->prepare('UPDATE posts SET title = ?, author = ?, content = ?, post_img = ? WHERE id = ?');
    $post = $req->execute(array($title, $author, $content, $imgUrl, $id ));
    return $post;
    }


}
