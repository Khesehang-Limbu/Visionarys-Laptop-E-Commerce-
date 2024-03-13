<?php

namespace app\controllers;

use app\models\Category;
use evil\phpmvc\Controller;
use evil\phpmvc\Request;

class CategoryController extends Controller
{
    public static function get_all()
    {
        $category = new Category();
        $all_categories = $category->findAll();
        return $all_categories;
    }

    public function create_category(Request $request)
    {
        $new_category = new Category();
        $new_category->loadData($request->getBody());

        if ($new_category->validate() && $new_category->save()) {
            return "Category Sucessfully Added";
        } else {
            return "Error Creating Category";
        }
    }

    public function edit_category()
    {
    }

    public function delete_category()
    {
    }
}
