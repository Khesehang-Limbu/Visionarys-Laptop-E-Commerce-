<?php
namespace app\controllers;

use evil\phpmvc\Controller;
use evil\phpmvc\Request;
use evil\phpmvc\Response;
use app\models\AdminForm;

class AdminController extends Controller {
    public function login(Request $request, Response $response){
        $this->setLayout("auth");
        $adminForm = new AdminForm();
        $context = [
            "model" => $adminForm
        ];

        if($request->isPost()){
            $adminForm->loadData($request->getBody());
            return $response->redirect("dashboard");
        }

        return $this->render("admin", $context);
    }

    public function dashboard(Request $request, Response $response){
        return $this->render("dashboard", []);
    }
}
