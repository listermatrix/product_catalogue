<?php
namespace Classes;
use Model\Product as Prod;

class Furniture extends Product
{
    private $postData;

    public function __construct($postFields)
    {
        $this->postData = $postFields;
    }

    public function save()
    {
        $postFields =  $this->postData;
        $model = new Prod();
        $model->newQuery()->create($postFields);

        return $model;
    }
}