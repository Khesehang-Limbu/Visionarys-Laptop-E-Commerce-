<?php
namespace app\models;
use evil\phpmvc\Model;
use app\models\Admin;
use evil\phpmvc\Application;

class AdminForm extends Model {
    public string $username = "";
    public string $password = "";

    public function rules(): array
    {
        return [
            "username" => self::RULE_REQUIRED,
            "password" => self::RULE_REQUIRED
        ];
    }

    public function labels() : array {
        return [
            "username" => "Username",
            "password" => "Password"
        ];
    }

    public function login(){
        $a = new Admin();
        $admin = $a->findOne(["username" => $this->username]);

        if(!$admin){
            $this->addError("usename", "Admin Account Doesn't Exist");
        }

        if (!($this->password === $admin->password)){
            $this->addError("password", "Incorrect Password, Please Enter A Valid One");
            return false;
        }

        return Application::$app->login($admin);
    }
}
