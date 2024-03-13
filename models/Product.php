<?php
namespace app\models;

use evil\phpmvc\db\DbModel;

class Product extends DbModel {
    public int $category = 0;
    public int $vendor = 0;
    public string $title = "";
    public string $feature_image = "";
    public string $storage = "";
    public string $processor = "";
    public string $graphics = "";
    public string $memory = "";
    public string $description = "";
    public int $price = 0;
    public bool $is_featured = true;
    public string $os = "";
    public string $screen = "";

    public function tableName(): string
    {
        return "products";
    }

    public function primaryKey(): string
    {
        return "id";
    }

    public function attributes(): array
    {
        return [
            "category",
            "vendor",
            "title",
            "feature_image",
            "storage",
            "processor",
            "graphics",
            "memory",
            "description",
            "price",
            "os",
            "screen",
            "is_featured"
        ];
    }

    public function rules(): array
    {
        return [
            "category" => [self::RULE_REQUIRED],
            "title" => [self::RULE_REQUIRED],
            "vendor" => [self::RULE_REQUIRED]
        ];
    }

    public function save()
    {
        return parent::save();
    }
}
