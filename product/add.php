<!doctype html>
<html lang="en">
<?php include __DIR__ . '/../product/css/script.php';?>
<body>

<div class="container">
    <br>
    <div class="row ">
        <div class="col-md-9 col-xs-6  col-sm-8">
            <p style="font-size:30px">Product Add</p>
        </div>

        <div class="col-md-3 col-xs-6 col-sm-4">
            <div class="btn-group">
                <button class="btn btn-success btn-sm" id="save-btn"><i class="fa fa-save"></i>SAVE</button>
                <a href="#" onclick="window.history.back(-1);return false;" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> CANCEL</a>
            </div>
        </div>
</div>


    <hr style="border:1px solid black">

    <div class="row">
        <div class="col-md-6">
            <form class="form-horizontal" id="product_form" action="store.php" method="post">

                <div class="form-group">
                    <label for="staticEmail" class="col-md-3 control-label">SKU</label>
                    <div class="col-md-9">
                        <input type="text" name="sku" id="sku"  class="form-control"  value="" required>
                        <div id="sku-error-tag" style="color:red; font-weight:bold; font-style: italic"></div>
                    </div>
                </div>


                <div class="form-group">
                    <label for="name" class="col-md-3 control-label">Name</label>
                    <div class="col-md-9">
                        <input id="name" type="text"  name="name" class="form-control" >
                        <div id="name-error-tag" style="color:red; font-weight:bold; font-style: italic"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="price" class="col-md-3 control-label">Price</label>
                    <div class="col-md-9">
                        <input type="number" id="price" name="price" step="0.01" class="form-control" >
                        <div id="price-error-tag" style="color:red; font-weight:bold; font-style: italic"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="productType" class="col-md-3 control-label">Product Type</label>
                    <div class="col-md-9">
                        <select class="form-control" name="product_type" id="productType">
                            <option></option>
                            <option value="dvd">DVD</option>
                            <option value="book">Book</option>
                            <option value="furniture">Furniture</option>
                        </select>
                        <div id="product_type-error-tag" style="color:red; font-weight:bold; font-style: italic"></div>
                    </div>
                </div>


                <div class="form-group dvd">
                    <label for="size" class="col-md-3 control-label">Size</label>
                    <div class="col-md-9">
                        <input type="number" name="size" id="size" step="0.01" class="form-control" >
                        <div id="size-error-tag" style="color:red; font-weight:bold; font-style: italic"></div>
                    </div>
                </div>

                <div class="form-group furniture">
                    <label for="height" class="col-md-3 control-label">Height</label>
                    <div class="col-md-9">
                        <input type="number" name="height" id="height" step="0.01" class="form-control" >
                        <div id="height-error-tag" style="color:red; font-weight:bold; font-style: italic"></div>
                    </div>
                </div>

                <div class="form-group furniture">
                    <label for="width" class="col-md-3 control-label">Width</label>
                    <div class="col-md-9">
                        <input type="number" name="width" id="width" step="0.01" class="form-control" >
                        <div id="width-error-tag" style="color:red; font-weight:bold; font-style: italic"></div>
                    </div>
                </div>

                <div class="form-group furniture">
                    <label for="length" class="col-md-3 control-label">Length</label>
                    <div class="col-md-9">
                        <input type="number" name="length" id="length" step="0.01" class="form-control" >
                        <div id="length-error-tag" style="color:red; font-weight:bold; font-style: italic"></div>
                    </div>
                </div>

                <div class="form-group book">
                    <label for="weight" class="col-md-3 control-label">Weight</label>
                    <div class="col-md-9">
                        <input type="number" name="weight" id="weight" step="0.01" class="form-control" >
                        <div id="weight-error-tag" style="color:red; font-weight:bold; font-style: italic"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>










<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {

        let dvd =  $('.dvd'),
            book = $('.book'),
            furniture = $('.furniture'),
            form = $('#product-form');

        // dvd.hide();
        // book.hide();
        // furniture.hide();

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
        
        $('#save-btn').on('click', function () {
            $('#save-btn').attr('disabled',true)
            let url = form.attr('action'),
                data = form.serialize();


            $.post(url,data,function (resp) {
               let results = JSON.parse(resp);


               if(results.code === 400) {
                   $('#save-btn').attr('disabled',false)
                   $.each(results.message,function (i,error) {

                       console.log(error);
                       if('sku' in error) $('#sku-error-tag').html(error.sku + ' *')
                       if('name' in error) $('#name-error-tag').html(error.name + ' *')
                       if('price' in error) $('#price-error-tag').html(error.price + ' *')
                       if('product_type' in error) $('#product_type-error-tag').html(error.product_type + ' *')
                       if('size' in error) $('#size-error-tag').html(error.size + ' *')
                       if('weight' in error) $('#weight-error-tag').html( error.weight + ' *')
                       if('height' in error) $('#height-error-tag').html( error.height + ' *')
                       if('width' in error) $('#width-error-tag').html( error.width + ' *')
                       if('length' in error) $('#length-error-tag').html( error.length + ' *')

                   })
               }
               else {
                   window.location.href = 'index.php'
               }


            })
        })
    })
</script>
</body>
</html>


