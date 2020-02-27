$(function(){

    var btn_multiple_products = $('#btn_multiple_products');
    var btn_client_severitie = $('#btn_client_severitie');
    
    var div_client_severitie = $('.div_client_severitie');
    var div_single_product = $('.div_single_product');
    var div_multiple_products = $('.div_multiple_products');

    var select_client_severitie = $('.select_client_severitie');
    var picker_products_id = $('.picker_products_id');
    var select_product = $('.select_product');
    var select_department = $('.select_department');
    var select_product_severitie = $('.select_product_severitie');
    var select_client = $('.select_client');

    btn_multiple_products.on('change', function()
    {
        div_single_product.toggleClass('hide');
        div_multiple_products.toggleClass('hide');

        picker_products_id.val('default').selectpicker("refresh");
        select_product.prop('selectedIndex', 0);

        selectClearDisabled(select_department);
        selectClearDisabled(select_product_severitie);
        selectClearDisabled(select_client);
        selectClearDisabled(select_client_severitie);
    });

    btn_client_severitie.on('change', function()
    {
        div_client_severitie.toggleClass('hide');
        if (this.checked)
        {
            select_product_severitie.prop('disabled', true);
            $('.disabled_product_severitie').toggleClass('hide');
        } else
        {
            select_product_severitie.prop('disabled', false);
            $('.disabled_product_severitie').toggleClass('hide');
        }
    });


    var form_ajax_get_product_features = $('#form_ajax_get_product_features');
    select_product.on('change', function()
    {
        var _token = form_ajax_get_product_features.find("input[name='_token']").val();
        $.post(form_ajax_get_product_features.attr('action'), {
            _token: _token,
            product_id: select_product.val()

        }, function(data, textStatus, xhr) {
        }).done(function(data){
            selectClearActive(select_department);
            $.each(data['department'], function (indexInArray, department) { 
                select_department.append(
                    "<option value="+department.id+">"+department.name+"</option>"
                );
            });

            selectClearDisabled(select_product_severitie);
            if (btn_client_severitie[0].checked == false)
            {
                select_product_severitie.prop('disabled', false);
            }
            $.each(data['product_severitie'], function (indexInArray, severitie) { 
                select_product_severitie.append(
                    "<option value="+severitie.id+">"+severitie.name+"</option>"
                );
            });

            selectClearActive(select_client)
            $.each(data['clients'], function (indexInArray, client) { 
                select_client.append(
                    "<option value="+client.id+">"+client.name+"</option>"
                );
            });

            selectClearDisabled(select_client_severitie);
        });
    });

    var form_ajax_get_client_severities = $('#form_ajax_get_client_severities');
    select_client.on('change', function()
    {
        var _token = form_ajax_get_client_severities.find("input[name='_token']").val();
        $.post(form_ajax_get_client_severities.attr('action'), {
            _token: _token,
            client_id: select_client.val(),
            product_id: select_product.val()

        }, function(data, textStatus, xhr) {
        }).done(function(data){

            if (data.length > 0)
            {
                selectClearActive(select_client_severitie);
                $.each(data, function (indexInArray, client_severitie) { 
                    select_client_severitie.append(
                        "<option value="+client_severitie.id+">"+client_severitie.name+"</option>"
                    );
                });
            } else
            {
                select_client_severitie.prop('disabled', true);
                select_client_severitie.find('option').remove();
                select_client_severitie.append(
                    "<option value='null'>Severidades não encontradas</option>"
                );
            }

        });
    });



    function selectClearDisabled(select)
    {
        select.find('option').remove();
        select.prop('disabled', true);
        select.append(
            "<option selected disabled value='null'>Selecione...</option>"
        );
    }
    function selectClearActive(select)
    {
        select.find('option').remove();
        select.prop('disabled', false);
        select.append(
            "<option selected disabled value='null'>Selecione...</option>"
        );
    }
});