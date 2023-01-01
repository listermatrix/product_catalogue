<?php
require_once __DIR__ . '/../vendor/autoload.php';
require "../bootstrap.php";
use Function\Constants;
use Model\Product;
$products = Product::query()->get();
$constants = Constants::class;