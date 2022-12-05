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
                <button class="btn btn-success btn-sm" id="save-btn">Save Product</button>
                <a href="#" onclick="javascript:window.history.back(-1);return false;" class="btn btn-danger btn-sm">Cancel</a>
            </div>

    <hr>
    <div class="col-4">
        <form class="form-horizontal" id="product-form" action="store.php" method="post">
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">SKU</label>
                <div class="col-sm-10">
                    <input type="text" name="sku"  class="form-control" id="staticEmail" value="" required>
                    <div id="sku-error-tag" style="color:red; font-weight:bold; font-style: italic"></div>
                </div>



            </div>
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input id="name" type="text" name="name" class="form-control" >
                    <div id="name-error-tag" style="color:red; font-weight:bold; font-style: italic"></div>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="price" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                    <input type="number" id="price" name="price" step="0.01" class="form-control" >
                    <div id="price-error-tag" style="color:red; font-weight:bold; font-style: italic"></div>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="product_type" class="col-sm-2 col-form-label">Product Type</label>
                <div class="col-sm-10">
                    <select class="form-select" name="product_type" id="product_type">
                        <option></option>
                        <option value="dvd">DVD</option>
                        <option value="book">Book</option>
                        <option value="furniture">Furniture</option>
                    </select>
                    <div id="product_type-error-tag" style="color:red; font-weight:bold; font-style: italic"></div>
                </div>
            </div>


            <div class="mb-3 row dvd">
                <label for="size" class="col-sm-2 col-form-label">Size</label>
                <div class="col-sm-10">
                    <input type="number" name="size" id="size" step="0.01" class="form-control" >
                    <div id="size-error-tag" style="color:red; font-weight:bold; font-style: italic"></div>
                </div>
            </div>

            <div class="mb-3 row furniture">
                <label for="height" class="col-sm-2 col-form-label">Height</label>
                <div class="col-sm-10">
                    <input type="number" name="height" id="height" step="0.01" class="form-control" >
                    <div id="height-error-tag" style="color:red; font-weight:bold; font-style: italic"></div>
                </div>
            </div>

            <div class="mb-3 row furniture">
                <label for="width" class="col-sm-2 col-form-label">Width</label>
                <div class="col-sm-10">
                    <input type="number" name="width" id="width" step="0.01" class="form-control" >
                    <div id="width-error-tag" style="color:red; font-weight:bold; font-style: italic"></div>
                </div>
            </div>

            <div class="mb-3 row furniture">
                <label for="length" class="col-sm-2 col-form-label">Length</label>
                <div class="col-sm-10">
                    <input type="number" name="length" id="length" step="0.01" class="form-control" >
                    <div id="length-error-tag" style="color:red; font-weight:bold; font-style: italic"></div>
                </div>
            </div>

            <div class="mb-3 row book">
                <label for="weight" class="col-sm-2 col-form-label">Weight</label>
                <div class="col-sm-10">
                    <input type="number" name="weight" id="weight" step="0.01" class="form-control" >
                    <div id="weight-error-tag" style="color:red; font-weight:bold; font-style: italic"></div>
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
            furniture = $('.furniture'),
            form = $('#product-form');

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
        
        $('#save-btn').on('click', function () {

            let url = form.attr('action'),
                data = form.serialize();


            $.post(url,data,function (resp) {
               let results = JSON.parse(resp);


               if(results.code === 400) {
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


