$(document).ready(function () {

    let dvd = $('.dvd'),
        book = $('.book'),
        furniture = $('.furniture'),
        form = $('#product_form');

    dvd.hide();
    book.hide();
    furniture.hide();

    $('#productType').on('change', function () {
        let value = $(this).val()

        if (value === 'dvd') {
            dvd.show();
            furniture.hide();
            book.hide();
        }
        if (value === 'book') {
            book.show();
            dvd.hide();
            furniture.hide();
        }

        if (value === 'furniture') {
            furniture.show();
            dvd.hide();
            book.hide();
        }

    })

    form.on('submit', function (e) {
        $('#save-btn').attr('disabled', true)
        e.preventDefault();
        let url = form.attr('action'),
            data = form.serialize();


        $.post(url, data, function (resp) {
            let results = JSON.parse(resp);


            if (results.code === 400) {
                $('#save-btn').attr('disabled', false)
                $.each(results.message, function (i, error) {

                    console.log(error);
                    if ('sku' in error) $('#sku-error-tag').html(error.sku + ' *')
                    if ('name' in error) $('#name-error-tag').html(error.name + ' *')
                    if ('price' in error) $('#price-error-tag').html(error.price + ' *')
                    if ('product_type' in error) $('#product_type-error-tag').html(error.product_type + ' *')
                    if ('size' in error) $('#size-error-tag').html(error.size + ' *')
                    if ('weight' in error) $('#weight-error-tag').html(error.weight + ' *')
                    if ('height' in error) $('#height-error-tag').html(error.height + ' *')
                    if ('width' in error) $('#width-error-tag').html(error.width + ' *')
                    if ('length' in error) $('#length-error-tag').html(error.length + ' *')

                })
            } else {
                window.location.href = 'index.php'
            }


        })
    })

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
    })
})