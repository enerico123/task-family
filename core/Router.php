<?php



class Router {

    public static function handle(){

        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        if ($uri === '/' || $uri === '') {
            header('Location: /login');
            exit;
        }

        if ($uri === '/login') {
            require __DIR__ . '/../app/controllers/AuthController.php';
            (new AuthController())->showLogin();
            exit;
        }

        if ($uri === '/child') {
            require __DIR__ . '/../app/controllers/ChildController.php';
            (new ChildController())->dashboard();
            exit;
        }

        if ($uri === '/parent') {
            require __DIR__ . '/../app/controllers/ParentController.php';
            (new ParentController())->dashboard();
            exit;
        }

    }
}
?>