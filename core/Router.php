<?php



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
            require __DIR__ . '/../app/controllers/AuthController.php';
            (new AuthController())->showLogin();
            exit;
        }

        // POST 
        if ($uri === '/login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            require __DIR__ . '/../app/controllers/AuthController.php';
            (new AuthController())->login();
            exit;
        }


        // -------- LOGOUT ------- 

        if ($uri === '/logout'){
            require __DIR__ . '/../app/controllers/AuthController.php';
            (new AuthController())->logout();
            exit;
        }

        // CHILD 
        if ($uri === '/child') {
            require __DIR__ . '/Auth.php';
            Auth::requireRole('enfant');

            require __DIR__ . '/../app/controllers/ChildController.php';
            (new ChildController())->dashboard();
            exit;
        }
        // PARENT

        if ($uri === '/parent') {
            require __DIR__ . '/Auth.php';
            Auth::requireRole('parent');
            
            require __DIR__ . '/../app/controllers/ParentController.php';
            (new ParentController())->dashboard();
            exit;
        }
        

        // PAGE AJOUT DE TACHE
        // GET PAGE -> afficher la page 
        if($uri === '/tasks/new' && $_SERVER['REQUEST_METHOD'] === 'GET'){
            require __DIR__ . '/Auth.php';
            Auth::requireRole('parent'); // etre bien parent 

            require __DIR__ . '/../app/controllers/TaskController.php';
            (new TaskController())->new();
            exit;
        }
        // POST -> ajouter dans la db
        if ($uri === '/tasks/create' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            require __DIR__ . '/Auth.php';
            Auth::requireRole('parent'); // etre bien parent 

            require __DIR__ . '/../app/controllers/TaskController.php';
            (new TaskController())->create();
            exit;
        }
    }
}
?>