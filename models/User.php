<?php

namespace app\models;

use \evil\phpmvc\UserModel;

class User extends UserModel
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DELETE = 2;

    public string $full_name = "";
    public string $email = "";
    public string $password = "";
    public string $confirm_password = "";
    public string $address = "";
    public string $phone_number = "";
    public int $status = self::STATUS_INACTIVE;

    public function tableName(): string
    {
        return "users";
    }

    public function attributes(): array
    {
        return [
            "full_name",
            "email",
            "password",
            "address",
            "status",
            "phone_number",
        ];
    }

    public function save()
    {
        $this->status = self::STATUS_INACTIVE;
        $this->password = password_hash(algo: PASSWORD_DEFAULT, password: $this->password);
        return parent::save();
    }

    public function rules(): array
    {
        return [
            "full_name" => [self::RULE_REQUIRED],
            "email" => [self::RULE_REQUIRED, self::RULE_EMAIL, [
                self::RULE_UNIQUE, "class" => self::class
            ]],
            "address" => [self::RULE_REQUIRED],
            "password" => [self::RULE_REQUIRED, [self::RULE_MIN, "min" => 8], [self::RULE_MAX, "max" => 20]],
            "confirm_password" => [self::RULE_REQUIRED, [self::RULE_MATCH, "match" => "password"]],
            "phone_number" => [self::RULE_REQUIRED, [self::RULE_UNIQUE, "class" => self::class]],
        ];
    }

    public function labels(): array
    {
        return [
            "full_name" =>  "Full Name",
            "email" =>  "Email",
            "address" =>  "Address",
            "password" =>  "Password",
            "confirm_password" =>  "Confirm Password",
            "phone_number" =>  "Phone Number",
        ];
    }

    public function primaryKey() :string {
        return "id";
    }

    public function getDisplayName(): string
    {
        return $this->full_name;
    }
}
