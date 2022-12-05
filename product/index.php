<?php

require_once __DIR__ . '/../vendor/autoload.php';
require "../bootstrap.php";

use Function\Constants;
use Model\Product;

$products = Product::query()->get();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<div class="container">
    <br>
    <div class="row">
        <div class="col-6">
            <h2>Product List</h2>
        </div>

        <div class="col-2">

        </div>
        <div class="col-2">
            <button class="btn btn-danger btn-sm" id="delete-btn"><i class="fa fa-trash"></i> DELETE</button>
            <a href="add.php" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> ADD</a>
        </div>
    </div>
    <hr>


    <div class="row">

        <?php foreach ($products as $product) { ?>
        <div class="col-3">
            <div class="card" style="width: 18rem;">
                <div style="margin-left: 10px">
                    <input type="checkbox" class="product_class" name="product_id[]" value="<?php echo $product->id ?>">
                </div>
                <div class="card-body text-center">
                    <h6 class="card-subtitle mb-2"><?php echo strtoupper($product->sku) ?></h6>
                    <h6 class="card-subtitle mb-2"><?php echo strtoupper($product->name) ?></h6>
                    <p class="card-text"><?php echo number_format($product->price,2) ?> $</p>
                    <p  class=""><?php
                        if($product->product_type == Constants::FURNITURE)
                        {
                            echo "Dimension: <b>{$product->height}x{$product->width}x{$product->length}</b>";
                        } else if ($product->product_type == Constants::BOOK)
                        {
                            echo "Weight: <b>{$product->weight} KG</b>";
                        }
                        else
                        {
                            echo "SIZE: <b>{$product->SIZE} MB</b>";
                        }
                        ?></p>
                </div>
            </div>
        </div>

        <?php } ?>
    </div>
</div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        const ids = [];
        $('.product_class').on('click',function () {
            let value = $(this).val()

            if($(this).prop('checked') === true)
            {
                ids.push(value)
            }else {
                const index = ids.indexOf(value);

               ids.splice(index, 1);
            }
            console.log(ids);
        })

        $('#delete-btn').on('click',function () {
            let url = 'delete.php',
            params = {'ids' : ids };
            $.post('delete.php',params,function (data) {
                window.location.reload();
            })
        })
    })
</script>
</body>
</html>


