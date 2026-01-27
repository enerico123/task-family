<?php

require_once __DIR__ . '/Auth.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';
require_once __DIR__ . '/../app/controllers/TaskController.php';
require_once __DIR__ . '/../app/controllers/ChildController.php';
require_once __DIR__ . '/../app/controllers/ParentController.php';


class Router {

    public static function handle(){

        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        if ($uri === '/' || $uri === '') {
            header('Location: /login');
            exit;
        }
        //----------- LOGIN  -------
        // GET
        if ($uri === '/login' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            
            (new AuthController())->showLogin();
            exit;
        }

        // POST 
        if ($uri === '/login' && $_SERVER['REQUEST_METHOD'] === 'POST') {

        (new AuthController())->login();
            exit;
        }


        // -------- LOGOUT ------- 

        if ($uri === '/logout'){
            
            (new AuthController())->logout();
            exit;
        }

        // CHILD 
        if ($uri === '/child') {
            Auth::requireRole('enfant');

            (new ChildController())->dashboard();
            exit;
        }
        // PARENT

        if ($uri === '/parent') {
            Auth::requireRole('parent');
            
            (new ParentController())->dashboard();
            exit;
        }
        

        // PAGE AJOUT DE TACHE
        // GET PAGE -> afficher la page 
        if($uri === '/tasks/new' && $_SERVER['REQUEST_METHOD'] === 'GET'){
            Auth::requireRole('parent'); // etre bien parent 

            (new TaskController())->new();
            exit;
        }
        // POST -> ajouter dans la db
        if ($uri === '/tasks/create' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            Auth::requireRole('parent'); // etre bien parent 

            (new TaskController())->create();
            exit;
        }

        if ($uri === '/tasks/take' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            Auth::requireRole('enfant');

            (new TaskController())->take();
            exit;
        }

        if ($uri === '/tasks/finish' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            Auth::requireRole('enfant');

            (new TaskController())->finish();
            exit;
        }

        if ($uri === '/tasks/validate' && $_SERVER['REQUEST_METHOD'] === 'POST'){
            Auth::requireRole('parent');


            (new TaskController())->validate();
            exit;
        }

        http_response_code(404);
        echo '404 - Page not found';
        exit;
    }
}
?>