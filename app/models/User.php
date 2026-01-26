<?php



class User
{
    public static function findByUsername(string $username){
        global $bd;

        $req1=$bd->prepare('SELECT id, username,password_hash,role,points 
                            FROM `users`
                            WHERE username = :username;');

        $req1->bindValue(':username',$username,PDO::PARAM_STR);
        $req1->execute();

        return $req1->fetch(PDO::FETCH_ASSOC);
    }

    public static function pointChild(int $childId){
        global $bd;

        $req2=$bd->prepare('SELECT id, username,password_hash,role,points 
                            FROM `users`
                            WHERE id = :user_id;');

        $req2->bindValue(':user_id',$childId,PDO::PARAM_INT);
        $req2->execute();

        return $req2->fetchAll(PDO::FETCH_ASSOC);
    }
}