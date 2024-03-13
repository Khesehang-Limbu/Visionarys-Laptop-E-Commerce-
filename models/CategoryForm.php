<?php
namespace app\models;

class CategoryForm extends Category{
    public string $name = "";
    public string $description = "";

    public function labels(): array
    {
        return [
            "name" => "Category Title",
            "description" => "Category Description",
        ];
    }

    public function rules(): array
    {
        return [
            "name" => [self::RULE_REQUIRED],
            "description" => [self::RULE_REQUIRED],
        ];
    }
}
