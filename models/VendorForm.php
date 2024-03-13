<?php
namespace app\models;
use app\models\Vendor;

class VendorForm extends Vendor{
    public function labels(): array
    {
        return [
            "name" => "Vendor Name",
        ];
    }

    public function save(){
        return parent::save();
    }
}
