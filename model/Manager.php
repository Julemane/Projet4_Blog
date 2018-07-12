<?php
//classe de connexion à la bdd
class Manager
{
    protected function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=blog_mvc;charset=utf8', 'root', '');
        return $db;
    }
}
