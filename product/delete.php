<?php
require_once __DIR__ . '/../vendor/autoload.php';
use Function\FormValidator;
use Model\Product;
require "../bootstrap.php";

if(isset($_POST['ids'])) {

    $product = Product::query()->whereIn('id', $_POST['ids'])
        ->delete();
}


$response = ['code' =>  200, 'message' => "Request Successful"];
echo json_encode($response);
exit;