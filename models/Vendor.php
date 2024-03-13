<?php
namespace app\models;
use evil\phpmvc\db\DbModel;

class Vendor extends DbModel{
    public string $name = "";

    public function tableName(): string
    {
        return "vendors";
    }

    public function primaryKey(): string
    {
        return "id";
    }

    public function attributes(): array
    {
        return [
            "name",
        ];
    }

    public function rules(): array
    {
        return [
            "name" => [self::RULE_REQUIRED, [self::RULE_UNIQUE, "class" => self::class]],
        ];
    }

}
