<?php

$products = [
    [
        'id' =>1,
        'name' => 'code1',
        'code' => 'xsdyubh122'
    ],
    [
        'id' =>2,
        'name' => 'code2',
        'code' => '6759063abc'
    ],
    [
        'id' =>3,
        'name' => 'code3',
        'code' => '56hg431457yh'
    ],
    [
        'id' =>4,
        'name' => 'code4',
        'code' => '865hg431457yh'
    ],

    [
        'id' =>4,
        'name' => 'code4',
        'code' => '865hg431457yh'
    ],

    [
        'id' =>4,
        'name' => 'code4',
        'code' => '865hg431457yh'
    ],
    [
        'id' =>4,
        'name' => 'code4',
        'code' => '865hg431457yh'
    ],

    [
        'id' =>4,
        'name' => 'code4',
        'code' => '865hg431457yh'
    ],


]

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product Add</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>

<div class="container">

    <br>

        <div class="row ">

            <div class="col-sm-10">
                <h2>Product Add</h2>
            </div>

            <div class="col-sm-2 btn-grouwp"">
                <button class="btn btn-success btn-sm">Save Product</button>
                <a href="#" onclick="javascript:window.history.back(-1);return false;" class="btn btn-danger btn-sm">Cancel</a>
            </div>

    <hr>
    <div class="col-4">
        <form class="form-horizontal" id="product-form">
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">SKU</label>
                <div class="col-sm-10">
                    <input type="text"  class="form-control" id="staticEmail" value="">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" >
                </div>
            </div>

            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                    <input type="number" step="0.01" class="form-control" >
                </div>
            </div>

            <div class="mb-3 row">
                <label for="product_type" class="col-sm-2 col-form-label">Product Type</label>
                <div class="col-sm-10">
                    <select class="form-select" name="type" id="product_type">
                        <option></option>
                        <option value="dvd">DVD</option>
                        <option value="book">Book</option>
                        <option value="furniture">Furniture</option>
                    </select>
                </div>
            </div>


            <div class="mb-3 row dvd">
                <label for="size" class="col-sm-2 col-form-label">Size</label>
                <div class="col-sm-10">
                    <input type="number" name="size" id="size" step="0.01" class="form-control" >
                </div>
            </div>

            <div class="mb-3 row furniture">
                <label for="height" class="col-sm-2 col-form-label">Height</label>
                <div class="col-sm-10">
                    <input type="number" name="height" id="height" step="0.01" class="form-control" >
                </div>
            </div>

            <div class="mb-3 row furniture">
                <label for="width" class="col-sm-2 col-form-label">Width</label>
                <div class="col-sm-10">
                    <input type="number" name="width" id="width" step="0.01" class="form-control" >
                </div>
            </div>

            <div class="mb-3 row furniture">
                <label for="length" class="col-sm-2 col-form-label">Length</label>
                <div class="col-sm-10">
                    <input type="number" name="length" id="length" step="0.01" class="form-control" >
                </div>
            </div>

            <div class="mb-3 row book">
                <label for="weight" class="col-sm-2 col-form-label">Weight</label>
                <div class="col-sm-10">
                    <input type="number" name="weight" id="weight" step="0.01" class="form-control" >
                </div>
            </div>
        </form>
    </div>
</div>













<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {

        let dvd =  $('.dvd'),
            book = $('.book'),
            furniture = $('.furniture');

        dvd.hide();
        book.hide();
        furniture.hide();

        $('#product_type').on('change',function () {
            let value = $(this).val()

            if(value === 'dvd') {
                dvd.show();
                furniture.hide();
                book.hide();
            }
            if (value === 'book')
            {
                book.show();
                dvd.hide();
                furniture.hide();
            }

            if(value === 'furniture')
            {
                furniture.show();
                dvd.hide();
                book.hide();
            }

        })
    })
</script>
</body>
</html>


