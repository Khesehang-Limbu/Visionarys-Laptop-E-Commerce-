<?php

namespace app\models;

class ProductForm extends Product
{

    public function labels(): array
    {
        return [
            "title" => "Prouct's Title",
            "feature_image" => "Prouct's Feature Image",
            "vendor" => "Vendor Name",
            "storage" => "Laptop's Storage",
            "processor" => "Laptop's Processor",
            "graphics" => "Laptop's graphics",
            "memory" => "Laptop's Memory",
            "category" => "Product Category",
            "description" => "Product Description",
            "price" => "Product Price",
            "os" => "Product OS",
            "screen" => "Product Screen",
            "is_featured" => "Is Featured"
        ];
    }

    public function rules(): array
    {
        return [
            "category" => [self::RULE_REQUIRED],
            "title" => [self::RULE_REQUIRED],
        ];
    }
}
