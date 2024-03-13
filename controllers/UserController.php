<?php
namespace app\controllers;
use evil\phpmvc\Application;
use evil\phpmvc\Controller;

class UserController extends Controller{
    public static function get_user(int $id){
        $user =  Application::$app->db->pdo->prepare("SELECT * FROM `users` WHERE id = $id");
        $user->execute();
        return $user->fetchAll()[0] ?? false;
    }
}
