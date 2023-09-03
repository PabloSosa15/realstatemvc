<?php
namespace Controllers;

use MVC\Router;
use Model\Admin;
class LoginController {
    public static function login(Router $router) {
        $fixs = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Admin($_POST);
            
            $fixs = $auth->validate();

            if (empty($fixs)) {
                //Check if the user exists
                $result = $auth->existsUser();

                if(!$result) {
                    $fixs = Admin::getFixs();
                } else {
                 // Verify password
                  $authenticated =   $auth->checkPassword($result);

                  if($authenticated) {
                //Verify user
                        $auth->authenticate();
                        ;
                  } else {
                    //Pasword is wrong
                    $fixs = Admin::getFixs();
                  }
                }

                }
        }

        $router->render('auth/login' , [
            'fixs'=> $fixs
        ]);   }
    public static function logout() {
        session_start();

        $_SESSION = [];

        header('Location /index');
}
}