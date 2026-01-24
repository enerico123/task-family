<?php

require_once __DIR__ . '/../../config/db.php';

class User
{
    public static function findByUsername(string $username){
        global $bd;

        $req1=$bd->prepare('SELECT * 
                            FROM `users`
                            WHERE username = :username ;');

        $req1->bindValue(':username',$username,PDO::PARAM_STR);
        $req1->execute();

        return $req1->fetch(PDO::FETCH_ASSOC);
    }
}