<?php

class Task
{
    public static function getAllTask(){
        global $bd;

        $req2=$bd->prepare('SELECT 
            t.id,
            t.title,
            t.description,
            t.points,
            t.status,
            t.created_by,
            t.assigned_to,
            u.username AS assigned_name
         FROM tasks t
         LEFT JOIN users u ON t.assigned_to = u.id
         ORDER BY t.id ASC');

        $req2->execute();

        return $req2->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create(string $title, string $description, int $points, int $parentId){
        global $bd;

        $req3=$bd->prepare('INSERT INTO tasks (title, description, points, created_by, status)
                        VALUES (:title, :description, :points, :created_by, "disponible")');

        $req3->bindValue(":title",$title,PDO::PARAM_STR);
        $req3->bindValue(":description",$description,PDO::PARAM_STR);
        $req3->bindValue(":points",$points,PDO::PARAM_INT);
        $req3->bindValue(":created_by",$parentId,PDO::PARAM_INT);
        $req3->execute();
    }

    public static function getAllLeaders(){
        global $bd; 

        $req4=$bd->prepare('SELECT username,points
                            FROM `users`
                            WHERE role = "enfant"
                            ORDER BY points DESC;');

        $req4->execute();

        return $req4->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getAllTaskDispo(){
        global $bd;

        $req5=$bd->prepare('SELECT 
            t.id,
            t.title,
            t.description,
            t.points,
            t.status,
            t.created_by,
            t.assigned_to,
            u.username AS assigned_name
            FROM tasks t
            LEFT JOIN users u ON t.assigned_to = u.id
            WHERE status = "disponible"
            ORDER BY t.id ASC;');

        $req5->execute();

        return $req5->fetchAll(PDO::FETCH_ASSOC);
    }
}