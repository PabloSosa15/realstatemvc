<?php
namespace MVC;

class Router {
    public $urlGET = [];
    public $urlPOST = [];

    public function get($url, $fn) {
        $this->urlGET[$url] = $fn;
    }
    public function post($url, $fn) {
        $this->urlPOST[$url]= $fn;
    }

    public function checkurls(){
        session_start();

        $auth = $_SESSION['login'] ?? null;

        //Arrangement of protected routes
        $protected_routes = ['/admin',
        '/properties/create',
        '/properties/update',
        '/properties/delete',
        '/sellers/create',
        '/sellers/update',
        '/sellers/delete'];

        $currenturl = strtok($_SERVER['REQUEST_URI'], '?') ?? '/';;
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'GET') {
            $fn = $this->urlGET[$currenturl] ?? null;
        } else {
            $fn = $this->urlPOST[$currenturl] ?? null;
        }

        //Protect the router
        if(in_array($currenturl, $protected_routes) && !$auth) {
            header('Location: /');
        }

        if($fn) {
            //The URL exists and there is an associated function
            call_user_func($fn, $this);
        } else {
            echo "Page Not Found or Invalid Path";
        }
    }

    //Show a View
    public function render($view, $dates = []) {
        foreach($dates as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include_once __DIR__ . "/views/$view.php";

        $content = ob_get_clean();

        include_once __DIR__ . '/views/layout.php';
    }
}