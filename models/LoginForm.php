<?php
namespace app\models;

use evil\phpmvc\Application;
use evil\phpmvc\Model;

class LoginForm extends Model {
    public string $email = "";
    public string $password = "";

    public function rules() : array {
        return [
            "email" => [self::RULE_REQUIRED, self::RULE_EMAIL],
            "password" => [self::RULE_REQUIRED]
        ];
    }

    public function labels(): array
    {
        return [
            "email" => "Email",
            "password" => "Your Password"
        ];
    }

    public function login(){
        $u = new User();
        $user = $u->findOne(["email" => $this->email]);

        if(!$user){
            $this->addError("email", "User Does Not Exist With This Email");
            return false;
        }

        if (!password_verify($this->password, $user->password)){
            $this->addError("password", "Incorrect Password, Please Enter A Valid One");
            return false;
        }

        var_dump($user);

        return Application::$app->login($user);
    }
}
