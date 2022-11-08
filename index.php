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
]

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <br>
    <div class="row">
        <div class="col-8">
            <h2>Product List</h2>
        </div>

        <div class="col-2">
                <select class="form-control">
                    <option></option>
                    <option>Delete</option>
                    <option>Revoke</option>
                </select>
        </div>
        <div class="col-2">
                <button class="btn btn-secondary">Apply Action</button>
        </div>
    </div>
    <hr>


    <div class="row">

        <?php foreach ($products as $product) { ?>
        <div class="col-3">
            <div class="card" style="width: 18rem;">
                <div style="margin-left: 10px">
                    <input type="checkbox" class="product_class" name="product_id[]" value="<?php echo $product['id'] ?>">
                </div>
                <div class="card-body text-center">
                    <h6 class="card-subtitle mb-2"><?php echo strtoupper($product['code']) ?></h6>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo strtoupper($product['name']) ?></h6>
                    <p class="card-text">100 USD</p>
                    <p  class="">SIZE 700 MB</p>
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
    })
</script>
</body>
</html>


