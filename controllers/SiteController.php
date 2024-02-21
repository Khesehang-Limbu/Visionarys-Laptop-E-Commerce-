<?php
namespace app\controllers;
use evil\phpmvc\Application;
use evil\phpmvc\Controller;
use app\models\ContactForm;
use evil\phpmvc\Request;
use evil\phpmvc\Response;

class SiteController extends Controller{
    public function home(){
        $context = [];
        return $this->render("home", $context);
    }

    public function contact(Request $request, Response $response){
        $context = [];
        $contactForm = new ContactForm();

        $context = [
            "model" => $contactForm,
        ];


        if($request->isPost()){
            $contactForm->loadData($request->getBody());


            if($contactForm->validate() && $contactForm->send()){
                Application::$app->session->setFlashMessage("success", "Thanks For Contacting Us!!");
                return $response->redirect("/contact");
            }
        }

        return $this->render("contact", $context);
    }
}
