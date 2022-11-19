<?php

namespace Function;
use Function\Constants;

Class FormValidator {

    private array $messages = [];
    private array $postData;


    public function __construct(array $formValues)
    {
        $this->postData = $formValues;
    }


    public function validate()
    {
      $data = $this->postData;

      if($data['sku'] == null)
        $this->setMessage('sku');

        if($data['name'] == null)
            $this->setMessage('name');

        if($data['price'] == null)
            $this->setMessage('price');

        if($data['product_type'] == null)
            $this->setMessage('product_type');


        if($data['product_type'] == Constants::DVD && $data['size'] == null)
            $this->setMessage('size',
                'size field is required when product type is '.Constants::DVD);

        if($data['product_type'] == Constants::BOOK && $data['weight'] == null)
            $this->setMessage('weight',
                'weight field is required when product type is '.Constants::BOOK);


        if($data['product_type'] == Constants::FURNITURE && $data['height'] == null)
            $this->setMessage('height',
                'height field is required when product type is '.Constants::FURNITURE);


        if($data['product_type'] == Constants::FURNITURE && $data['width'] == null)
            $this->setMessage('width',
                'width field is required when product type is '.Constants::FURNITURE);


        if($data['product_type'] == Constants::FURNITURE && $data['length'] == null)
            $this->setMessage('length',
                'length field is required when product type is '.Constants::FURNITURE);


    }

    public function setMessage($key,$message = null)
    {
        $this->messages[] = [$key => $message ?? "$key field is required"];
    }

    public function getErrorMessages()
    {
        return $this->messages;
    }

}