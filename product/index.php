<?php include __DIR__ . '/../product/head.php';?>
<!doctype html>
<html lang="en">
<?php include __DIR__ . '/../product/css/script.php';?>

    <body>

<div class="container">
    <br>
    <div class="row">
        <div class="col-md-9 col-xs-6  col-sm-8">
            <p style="font-size: 30px;">Product List</p>
        </div>
        <div class="col-md-3 col-xs-6 col-sm-4">
                <form action="delete.php" method="post" id="form_delete">
                    <input type="hidden" name="ids" multiple id="delete_values">
                    <button  class="btn btn-danger btn-sm" id="delete-btn"><i class="fa fa-trash"></i> MASS DELETE</button>
                    <a href="add.php" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> ADD PRODUCT</a>
                </form>
        </div>
    </div>
    <hr style="border:1px solid black">

    <div class="row">
        <?php  if ($products->isEmpty()) { ?>
                <div class="col-md-3" style="float: none; margin: 0 auto;">
                    <h3>0 Products Added</h3>
                </div>
            <?php } ?>

        <?php foreach ($products as $product) { ?>
             <div class="col-md-3">
                <div class="panel panel-default">
                <div class="panel-heading">
                    <div style="margin-left: 10px">
                        <input type="checkbox" class="delete-checkbox" name="product_id[]" value="<?php echo $product->id ?>">
                    </div>
                </div>
                <div class="panel-body text-center">
                    <p class="text-font"><?php echo strtoupper($product->sku) ?></p>
                    <p class="text-font"><?php echo strtoupper($product->name) ?></p>
                    <p class="text-font"><?php echo number_format($product->price,2) ?> $</p>

                </div>
                <div class="panel-footer">
                    <p  class="text-center text-font"><?php
                        if($product->product_type == $constants::FURNITURE)
                            echo "Dimension: <b>{$product->height}x{$product->width}x{$product->length}</b>";
                         else if ($product->product_type == $constants::BOOK)
                            echo "Weight: <b>{$product->weight} KG</b>";
                        else
                            echo "SIZE: <b>{$product->size} MB</b>";

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
        $('.delete-checkbox').on('click',function () {
            let value = $(this).val()



            if($(this).prop('checked') === true)
            {
                ids.push(value)
            }else {
                const index = ids.indexOf(value);

               ids.splice(index, 1);
            }
            $('#delete_values').val(ids)


            $('#delete-btn').on('click',function (e) {
                e.preventDefault();
                $('.delete-checkbox').parents('.col-md-3').hide();
                $('#form_delete').submit()
            })
        })


    })
</script>
</body>
</html>


