<?php
require_once __DIR__ . '/../vendor/autoload.php';
use Function\FormValidator;

$postFields = $_POST;

//$sku          = $postFields['sku'];
//$name         = $postFields['name'];
//$price        = $postFields['price'];
//$product_type = $postFields['product_type'];
//$size         = $postFields['size'];
//$height       = $postFields['height'];
//$width        = $postFields['width'];
//$length       = $postFields['length'];
//$weight       = $postFields['weight'];




$form = new FormValidator($postFields);
$form->validate();
$validationResult = $form->getErrorMessages();
/** Save to Database **/



if(empty($validationResult)){
    $response = ['code' =>  200, 'message' => "Form validated and submitted successfully"];
}else {
    $response = ['code' =>  400, 'message' => $validationResult];
}

echo json_encode($response);
exit;