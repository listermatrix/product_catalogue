<?php
namespace Model;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Product extends Eloquent

{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'sku','name','price','product_type','size','weight','height','width','length'
    ];



}