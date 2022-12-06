<?php
namespace Model;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Eloquent
{
    use SoftDeletes;

    protected $fillable = [
        'sku','name','price','product_type','size','weight','height','width','length'
    ];



}