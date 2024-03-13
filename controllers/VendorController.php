<?php
namespace app\controllers;

use app\models\Vendor;
use evil\phpmvc\Controller;

class VendorController extends Controller{
    public static function get_all(){
        $vendor= new Vendor();
        return $vendor->findAll();
    }
}
