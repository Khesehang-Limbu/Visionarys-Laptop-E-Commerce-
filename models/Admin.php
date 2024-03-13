<?php
namespace app\models;
use evil\phpmvc\UserModel;

class Admin extends UserModel{
    public string $username;
    public string $password;

    public function tableName(): string
    {
        return "admin";
    }

    public function getDisplayName(): string
    {
        return $this->username;
    }

    public function attributes(): array
    {
        return [
            "username",
            "password"
        ];
    }

    public function primaryKey(): string
    {
        return "id";
    }

    public function rules() : array{
        return [
            "username" => [self::RULE_REQUIRED],
            "password" => [self::RULE_REQUIRED]
        ];
    }
}

