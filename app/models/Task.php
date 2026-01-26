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

    public static function assignToChild(int $taskId, int $childId){
        global $bd;

        $req6=$bd->prepare('UPDATE tasks
                            SET assigned_to = :child_id, status = "en cours"
                            WHERE id = :task_id');
        
        $req6->bindValue(':child_id',$childId,PDO::PARAM_INT);
        $req6->bindValue(':task_id',$taskId,PDO::PARAM_INT);
        $req6->execute();
    }

    public static function getTaskChildId(int $childId){
        global $bd;

        $req7=$bd->prepare('SELECT 
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
            WHERE status = "en cours" AND assigned_to = :user_id
            ORDER BY t.id ASC;');

        $req7->bindValue(':user_id',$childId,PDO::PARAM_INT);
        $req7->execute();

        return $req7->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function changeTaskStatus(int $taskId){
        global $bd;

        $req8=$bd->prepare('UPDATE `tasks` 
                            SET `status` = "en attente" 
                            WHERE `tasks`.`id` = :id_task ;');

        $req8->bindValue(':id_task',$taskId,PDO::PARAM_INT);
        $req8->execute();
    }

    public static function changeTaskStatus2(int $taskId){
        global $bd;

        $req9=$bd->prepare('UPDATE `tasks` 
                            SET `status` = "validée" 
                            WHERE `tasks`.`id` = :id_task ;');

        $req9->bindValue(':id_task',$taskId,PDO::PARAM_INT);
        $req9->execute();
    }

    public static function ajoutPoint(int $points,int $childId){
        global $bd;

        $req10=$bd->prepare('UPDATE `users` 
                            SET `points` = `points` + :pointus
                            WHERE `users`.`id` = :user_id;');

        $req10->bindValue(':pointus',$points,PDO::PARAM_INT);
        $req10->bindValue(':user_id',$childId,PDO::PARAM_INT);
        $req10->execute();
    }

}