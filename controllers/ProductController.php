<?php
namespace app\controllers;

use evil\phpmvc\Controller;
use app\models\Product;
use evil\phpmvc\db\DbModel;

class ProductController extends Controller{
    public static function get_all(){
        $product = new Product();
        $all_products= $product->findAll();
        return $all_products;
    }

    public static function innerJoin($from, $to){
        return DbModel::innerJoin($from, $to);
    }

    public static function get($where){
        $product = new Product();
        return $product->findOne($where);
    }
}
