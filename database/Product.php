<?php

require "../bootstrap.php";


use Doctrine\DBAL\Types\Types;
use Illuminate\Database\Capsule\Manager as Capsule;



Capsule::schema()->create('products', function ($table) {

    $table->increments('id');
    $table->string('sku')->unique();
    $table->string('name');
    $table->string('price');
    $table->string('product_type');
    $table->string('size');
    $table->string('weight');
    $table->string('height');
    $table->string('width');
    $table->string('length');
    $table->rememberToken();
    $table->timestamps();
    $table->softDeletes();

});