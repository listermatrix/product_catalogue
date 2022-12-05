<?php
require_once __DIR__ . '/../vendor/autoload.php';
use Function\FormValidator;
use Model\Product;
require "../bootstrap.php";

$postFields = $_POST;

$form = new FormValidator($postFields);
$form->validate();
$validationResult = $form->getErrorMessages();
/** Save to Database **/

if(empty($validationResult)){

    $product = Product::query()->create($postFields);

    if($product) {
        $response = ['code' =>  200, 'message' => "Form validated and submitted successfully"];
    } else {
        $response = ['code' =>  400, 'message' => "Form Submission failed"];
    }

}else {
    $response = ['code' =>  400, 'message' => $validationResult];
}

echo json_encode($response);
exit;