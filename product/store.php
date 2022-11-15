<?php
require_once __DIR__ . '/../vendor/autoload.php';
use Sirius\Validation\Validator;

$validator = new Validator();
$validator->add(
    [
        'sku:SKU field is required' => 'required',
        'name:Email field is required' => 'required | email',
        'price:Price field is required' => 'required | minlength(10];',
        'product_type:Product Type' => 'required',
    ]
);

if ($validator->validate($_POST)) {

    // send notifications to stakeholders
    // save the form data to a database

} else {}


