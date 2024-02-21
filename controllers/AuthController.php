<?php

namespace app\controllers;

use evil\phpmvc\Application;
use evil\phpmvc\Controller;
use evil\phpmvc\Request;
use evil\phpmvc\Response;
use app\models\LoginForm;
use app\models\User;
use evil\phpmvc\middlewares\AuthMiddleware;

class AuthController extends Controller
{
    public function __construct(){
        $this->registerMiddleware(new AuthMiddleware(["profile"]));
    }

    public function login(Request $request, Response $response)
    {
        $this->setLayout("auth");
        $loginForm= new LoginForm();

        $context = [
            "model" => $loginForm
        ];

        if ($request->isPost()){
            $loginForm->loadData($request->getBody());

            if($loginForm->validate() && $loginForm->login()){
                $response->redirect("/");
                return;
            }
        }
        return $this->render("login", $context);
    }

    public function register(Request $request)
    {
        $user = new User();

        $context = [
            "model" => $user
        ];

        $this->setLayout("auth");

        if ($request->isPost()) {
            $user->loadData($request->getBody());
            if ($user->validate() && $user->save()) {
                Application::$app->session->setFlashMessage("success", "You've been sucessfully registered, Thank You! For Registering");
                Application::$app->response->redirect("/");
            }
            $context = [
                "model" => $user
            ];

            return $this->render("register", $context);
        }

        return $this->render("register", $context);
    }

    public function logout(Request $requet, Response $response){
        Application::$app->logout();
        $response->redirect("/");
    }

    public function profile(){
        $context = [];
        return $this->render("profile", $context);
    }
}
