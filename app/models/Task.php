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
}