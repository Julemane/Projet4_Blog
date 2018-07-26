<?php
require_once("model/Manager.php"); // On oubli pas d'indiquer l'emplacement de la classe parente
class CommentManager extends Manager
{
    //fonction de la classe
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, status, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }
    public function getAllComments()
    {
        $db = $this->dbConnect();
        $comments = $db->query('SELECT id, post_id, author, comment, status, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments  ORDER BY status DESC');
        return $comments;
    }

    public function warnedCom($comId)
    {
        $db = $this->dbConnect();
        $comment = $db->prepare('UPDATE comments SET status="warning" WHERE id='.$_GET['id']);
        $affectedLines = $comment->execute(array($comId));
        return $affectedLines;

    }


}
