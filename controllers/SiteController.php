<?php

namespace app\controllers;

use evil\phpmvc\Application;
use evil\phpmvc\Controller;
use app\models\ContactForm;
use app\models\Product;
use evil\phpmvc\Request;
use evil\phpmvc\Response;
use evil\phpmvc\middlewares\AuthMiddleware;
use app\controllers\UserController;
use evil\phpmvc\exceptions\ForbiddenException;

class SiteController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(["payment"]));
    }

    public function home()
    {
        $product_instance = new Product();
        $featured_products = $product_instance->findAll(["is_featured" => 1]);

        $context = [
            "featured_products" => $featured_products
        ];
        return $this->render("home", $context);
    }

    public function contact(Request $request, Response $response)
    {
        $context = [];
        $contactForm = new ContactForm();

        $context = [
            "model" => $contactForm,
        ];


        if ($request->isPost()) {
            $contactForm->loadData($request->getBody());


            if ($contactForm->validate() && $contactForm->send()) {
                Application::$app->session->setFlashMessage("success", "Thanks For Contacting Us!!");
                return $response->redirect("/contact");
            }
        }

        return $this->render("contact", $context);
    }

    public function products(Request $request, Response $response)
    {
        $products = ProductController::get_all();
        $context = [
            "products" => $products
        ];
        return $this->render("products", $context);
    }

    public function product(Request $request, Response $response){
        $id = $request->getBody()['id'];
        $product = ProductController::get(["id" => $id]);
        $context = [
            "product" => $product
        ];

        return $this->render("product", $context);
    }

    public function payment(Request $request, Response $response)
    {
        $user_id = Application::$app->session->get("user");
        $user = UserController::get_user($user_id);
        $context = [
            "user" => $user
        ];
        return $this->render("payment", $context);
    }

    public function initiate_khalti(Request $request, Response $response)
    {
        $user_id = Application::$app->session->get("user");
        $user = UserController::get_user($user_id);

        $post_fields = sprintf(
            '
            {
                "return_url": "http://localhost:8080/success",
                "website_url": "http://localhost:8080/",
                "amount": "1000",
                "purchase_order_id": "Order01",
                "purchase_order_name": "test",
                "customer_info": {
                    "name": "%s",
                    "email": "%s",
                    "phone": "%s"
                }
            }
            ',
            $user["full_name"],
            $user["email"],
            $user["phone_number"]
        );

        $curl = curl_init();
        $payload = array(
            CURLOPT_URL => 'https://a.khalti.com/api/v2/epayment/initiate/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => sprintf('%s', $post_fields),
            CURLOPT_HTTPHEADER => array(
                'Authorization: key live_secret_key_68791341fdd94846a146f0457ff7b455',
                'Content-Type: application/json',
            ),
        );

        curl_setopt_array($curl, $payload);
        $res = json_decode(curl_exec($curl));
        curl_close($curl);

        $payment_url = $res->payment_url;



        return $response->redirect($payment_url);
    }

    public function success(Request $request, Response $response)
    {
        if (!isset($request->getBody()["idx"])) {
            throw new ForbiddenException("Forbidden - You can only access this page after checking out.", 403);
        }
        $context = [];
        return $this->render("success", $context);
    }
}
