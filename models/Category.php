<?php

namespace app\models;

use evil\phpmvc\db\DbModel;

class Category extends DbModel
{
    public string $name;
    public string $description;

    public function primaryKey(): string
    {
        return "id";
    }

    public function tableName(): string
    {
        return "category";
    }

    public function attributes(): array
    {
        return [
            "name",
            "description",
        ];
    }


    public function rules(): array
    {
        return [
            "name" => [self::RULE_REQUIRED],
            "description" => [self::RULE_REQUIRED],
        ];
    }

    public function save()
    {
        return parent::save();
    }
}
