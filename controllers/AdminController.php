<?php

namespace app\controllers;

use evil\phpmvc\Controller;
use evil\phpmvc\Request;
use evil\phpmvc\Response;
use app\models\AdminForm;
use app\models\CategoryForm;
use app\models\Product;
use app\models\ProductForm;
use app\models\Vendor;
use app\models\VendorForm;
use evil\phpmvc\Application;
use evil\phpmvc\exceptions\Unsucessful;

class AdminController extends Controller
{
    public function login(Request $request, Response $response)
    {
        $this->setLayout("auth");
        $adminForm = new AdminForm();
        $context = [
            "model" => $adminForm
        ];

        if ($request->isPost()) {
            $adminForm->loadData($request->getBody());

            if ($adminForm->validate() && $adminForm->login()) {
                return $response->redirect("dashboard");
            }
        }

        return $this->render("admin", $context);
    }

    public function dashboard(Request $request, Response $response)
    {
        $this->setLayout("auth");
        $vendorForm = new VendorForm();
        $productForm = new ProductForm();
        $categoryForm = new CategoryForm();
        $categories = CategoryController::get_all();
        $products = ProductController::innerJoin(Product::class, Vendor::class);
        $vendors = VendorController::get_all();

        $context = [
            "vendor" => $vendorForm,
            "vendors" => $vendors,
            "product" => $productForm,
            "category" => $categoryForm,
            "categories" => $categories,
            "products" => $products,
        ];

        if ($request->isPost()) {
            $form_name = $request->getBody()["form_name"];
            if ($form_name === "product_create") {
                if (isset($_FILES["feature_image"]) && $_FILES["feature_image"]["error"] === 0) {
                    $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
                    $file_extension = pathinfo($_FILES["feature_image"]["name"], PATHINFO_EXTENSION);
                    var_dump($file_extension);

                    if (in_array($file_extension, $allowed_types)) {
                        $upload_dir = Application::$ROOT_DIR . "/uploads/";
                        $upload_file = $upload_dir . basename($_FILES["feature_image"]["name"]);

                        if (move_uploaded_file($_FILES["feature_image"]["tmp_name"], $upload_file)) {
                            $new_body = $request->getBody();
                            $new_body["feature_image"] = "/uploads/" . basename($_FILES["feature_image"]["name"]);
                            $productForm->loadData($new_body);

                            if ($productForm->validate() && $productForm->save()) {
                                return $response->redirect("dashboard#create");
                            }
                        } else {
                            throw new Unsucessful($message="Sorry, there was an error uploading your file.");
                        }
                    } else {
                        throw new Unsucessful($message="Sorry, only JPG, JPEG, PNG, and GIF files are allowed.");
                    }
                } else {
                    throw new Unsucessful($message="Please select an image file to upload.");
                }
            } else if ($form_name === "category_create") {
                $categoryForm->loadData($request->getBody());

                if ($categoryForm->validate() && $categoryForm->save()) {
                    return $response->redirect("dashboard#category_create");
                }
            } else if ($form_name === "vendor_create") {
                $vendorForm->loadData($request->getBody());
                var_dump($vendorForm);
                if ($vendorForm->validate() && $vendorForm->save()) {
                    return $response->redirect("dashboard#vendor_create");
                }
            }
        }

        return $this->render("dashboard", $context);
    }
}
