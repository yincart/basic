$(document).ready(function () {
    $('#goods-form').on('click', 'button', function () {
        var tr = $(this).closest('tr').clone();
        tr.find('td').eq(0).remove();
        var td1 = tr.find('td').eq(0).html();
        var html = '<tr><td><input  type="hidden" name="Item[item_id][]" id="Item_item_id" value="' + td1 + '" /></td>';
        for (var i = 0; i < 11; i++) {
            html = html + '<td>' + tr.find('td').eq(i).html() + '</td>';
        }
        html += '<td><div class="btn btn-danger" id="delete">Delete</div></td>';
        $(window.parent.document).find('#item-table').append(html + '</tr>');
        $(this).closest('tr').remove();
    });
    $('#tab').on('click', '#delete', function () {
            var tbody = $(this).parents("tbody");
            tbody.remove();
    });
    $('.search-button').click(function () {
        $('.search-form').toggle();
        return false;
    });
    $('.search-form form').submit(function () {
        $.fn.yiiGridView.update('shipping-grid', {
            data: $(this).serialize()
        });
        return false;
    });
    $('#add_prop').dynoTable({
        removeClass: '.row-remover', //class for the clickable row remover
        cloneClass: '.row-cloner', //class for the clickable row cloner
        addRowTemplateId: '#add-template', //id for the "add row template"
        addRowButtonId: '#add-row', //id for the clickable add row button, link, etc
        lastRowRemovable: true, //If true, ALL rows in the table can be removed, otherwise there will always be at least one row
        orderable: true, //If true, table rows can be rearranged
        dragHandleClass: ".drag-handle", //class for the click and draggable drag handle
        insertFadeSpeed: "slow", //Fade in speed when row is added
        removeFadeSpeed: "fast", //Fade in speed when row is removed
        hideTableOnEmpty: true, //If true, table is completely hidden when empty
        onRowRemove: function () {
            //Do something when a row is removed
        },
        onRowClone: function (clonedRow) {
            //Do something when a row is cloned
            clonedRow.find('input[name="PropValue[prop_value_id][]"]').val("");
        },
        onRowAdd: function () {
            //Do something when a row is added
        },
        onTableEmpty: function () {
            //Do something when ALL rows have been removed
        },
        onRowReorder: function () {
            //Do something when table rows have been rearranged
        }
    });

    $('.area').change(function () {
        var area = $(this);
        $.get($(this).data('url'), {'parent_id': $(this).val()}, function (options) {
            var html = '';
            for (var value in options) {
                html += '<option value="' + value + '">' + options[value] + '</option>';
            }
            var childArea = $('.' + area.data('child-area'));
            childArea.html(html);
            while (childArea.data('child-area')) {
                childArea = $('.' + childArea.data('child-area'));
                childArea.html('');
            }
        }, 'json');
    });
    $("#confirmOrder").click(function (event) {
        $('#orderForm').submit();
    });

    $('#add_goods').click(function () {
        showPopup($(this).data('url'));
    });


    $('#item-number').change(function () {
        var skuValue = $('#Sku_item');
        if (skuValue.val() != '' && $('#selectItem').val() != '') {
            var number1 = parseInt($('#item-number').val());
            if (!isNaN(number1)) {
                var number2 = 0;
                var sku = $('#ItemList').find('input[value=' + skuValue.val() + '][id=Sku_sku_id]');
                if ((sku.val() != undefined)) {
                    var number2 = parseInt(sku.parent().find('#Item-number').val());
                }
                $.get($(this).data('url'), {number: number1 + number2, sku_id: $('#Sku_item').val() }, function (response) {
                    if (response == 0) {
                        $('#stockError').remove();
                        $('#StockError').append('<div style="color: red" id="stockError">库存不足！</div>');
                    }
                    else $('#stockError').remove();
                });
            }
        }
    });
    $('#Sku_item').change(function () {
        $('#item-number').trigger('change');
    });
    $('#add-button').click(function () {
        var skuValue = $('#Sku_item');
        if ($('#selectItem').val() == '') {
            showPopup('请选择商品！');
        }
        else {
            if (skuValue.val() == '') {
                showPopup('请选择商品属性');
            }
            else {
                if ($('#item-number').val() == '') {
                    showPopup('请输入商品数量');
                }
                else {
                    var number = parseInt($('#item-number').val());
                    var sku = $('#ItemList').find('input[value=' + skuValue.val() + '][id=Sku_sku_id]');
                    if ((sku.val() != undefined)) {
                        number += parseInt(sku.parent().parent().find('#Item-num').html());
                        $.get($('#item-number').data('url'), {number: number, sku_id: skuValue.val() }, function (response) {
                            if (response == 0) {
                                $('#stockError').remove();
                                $('#StockError').append('<div style="color: red" id="stockError">库存不足！</div>');
                            }
                            else {
                                $('#stockError').remove();
                                sku.parent().parent().find('#Item-num').text(number);
                                sku.parent().find('#Item-number').val(number);
                            }
                        });
                    }else
                    {
                        $.get($('#item-number').data('url'), {number: number, sku_id: skuValue.val() }, function (response) {
                            if (response == 0) {
                                $('#stockError').remove();
                                $('#StockError').append('<div style="color: red" id="stockError">库存不足！</div>');
                            }
                            else {
                                $('#stockError').remove();
                                sku.parent().remove();
                                var html = '<tbody><tr><td>';
                                html += '<input id="Sku_item_id" name="Sku[item_id][]" type="hidden" value="' + $('#selectItem').val() + '"/>';
                                html += '<input id="Sku_sku_id" name="Sku[sku_id][]" type="hidden" value="' + $('#Sku_item').val() + '"/>';
                                html += '<input id="Item-number" name="Item-number[]" type="hidden" value="' + number + '"/>';
                                html +=  $("#selectItem  option:selected").html() + '</td><td>'+ $("#Sku_item  option:selected").html() +'</td><td id="Item-num">'+number +'</td><td> <div class="btn btn-danger" id="delete">Delete</div></td></tr></tobody>';


                                $('#head-title').after(html);
                            }
                        });
                    }
                }
            }
        }
    });
});
$(function () {
    var getItemProps = function () {
        $.get($('#Item_category_id').data('url'),
            {
                "category_id": $("#Item_category_id").select().val(),
                "YII_CSRF_TOKEN": $("[name=YII_CSRF_TOKEN]").val(),
                "item_id": $("#Item_category_id").data('item_id')
            }, function (response) {
                $('#item_prop_values').empty();
                $('#item_prop_values').append(response);
                setChbGroupCount();
                renderTable();
            });
    };
    getItemProps();
    $('#Item_category_id').change(function () {
        getItemProps();
    });
    function setChbGroupCount() {
        var $chb = $('input.change'),
            nameArr = [];
        $chb.each(function () {
            var i;
            for (i in nameArr) {
                if (this.name === nameArr[i]) {
                    return;
                }
            }
            nameArr.push(this.name);
        });
        window.chbGroupCount = nameArr.length;
    }
});