<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Classes\Book;
use Classes\Dvd;
use Classes\Furniture;
use Function\Constants;
use Function\FormValidator;

require "../bootstrap.php";

$postFields = $_POST;
$constants = Constants::class;



$form = new FormValidator($postFields);
$form->validate();
$validationResult = $form->getErrorMessages();


if(empty($validationResult)){

    try {

        /** Save to Database **/
        $product_type = $postFields;
        $product = match ($product_type) {
            $constants::BOOK => new Book($postFields),
            $constants::DVD => new Dvd($postFields),
            default => new Furniture($postFields),
        };

        $product->save();

        $response = ['code' =>  200, 'message' => "Form validated and submitted successfully"];
    }catch (\Exception $e) {
        $response = ['code' =>  400, 'message' => $e->getMessage() ?? "Form Submission failed"];
    }

}else {
    $response = ['code' =>  400, 'message' => $validationResult];
}

echo json_encode($response);
exit;