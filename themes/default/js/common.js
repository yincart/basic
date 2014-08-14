/**
 * @author Lujie.Zhou(gao_lujie@live.cn, qq:821293064).
 */
/**
 * add favorite
 * @param sURL
 * @param sTitle
 * @constructor
 */
function addFavorite(sURL,sTitle) {
    var sURL = window.location;
    var sTitle = document.title;
//    sURL = encodeURI(sURL);
    try {
        window.external.addFavorite(sURL, sTitle);
    }
    catch (e) {
        try {
//            document.write(e);
            window.sidebar.addPanel(sTitle, sURL, "");
        }
        catch (e) {
//            document.write(e);
//            showPopup("加入收藏失败，请使用Ctrl+D进行添加");
            return true;
        }
    }
}

$(document).ready(function () {
    $("#account").click(function () {
        if ($(this).hasClass('btn1')) {
            $("#cartForm").submit();
        }
    });
    $('[name="quantity[]"]').change(function () {
        var tr = $(this).closest('tr');
        var sku_id = tr.find("#position");
        var qty = tr.find("#quantity");
        var item_id = tr.find(".item-id");
        var props = tr.find(".props");
        var cart=parseInt($(".shopping_car").find("span").html());
        var sumPrice= parseFloat(tr.find("#SumPrice").html());
        var singlePrice=parseFloat( tr.find("#Singel-Price").html());
        var data = {'item_id': item_id.val(), 'props': props.val(), 'qty': qty.val(),'sku_id':sku_id.val()};
        if(qty.val()>0) {
            $.post($(this).data('url'), data, function (response) {
                tr.find("#error-message").remove();
                tr.find("#num-error").remove();
                if (!response) {
                    $(".shopping_car").find("span").html(cart-sumPrice/singlePrice+parseInt(qty.val()));
                    tr.find("#SumPrice").html(parseFloat(qty.val()) * parseFloat(singlePrice));
                    tr.find("#pre_quantity").val(qty.val());
                    update_total_price();
                }
                tr.find("#stock-error").append(response);
                if(tr.find("#error-message").text()) {
                    tr.find("#quantity").val(tr.find("#pre_quantity").val());
                }
            });
        } else {
            $(this).siblings("#stock-error").append("<div id=\"num-error\" style=\"color:red\">商品数量不能小于1</div>");
        }
    });
    $('#cartForm').on('click', '[name="position[]"],#checkAllPosition', function () {
        var flag = 0;
        var submit = $("#account");
        if ($(this).attr("id") == "checkAllPosition") {
            if ($(this).attr('checked')) {
                $('[name="position[]"]').attr('checked', 'checked');
            } else {
                $('[name="position[]"]').removeAttr('checked');
                flag = 0;
            }
        } else {
            $('#checkAllPosition').removeAttr('checked');
            if($(this).attr("checked")){
                $(this).attr("checked","checked");
            }else{
                $(this).removeAttr("checked");
                flag = 0;
            }
        }
        var positions = [];
        $('[name="position[]"]:checked').each(function () {
            positions.push($(this).val());
            flag = 1;
        });
        if (flag == 1) {
            submit.removeClass();
            submit.addClass("btn1");
        } else {
            submit.removeClass();
            submit.addClass("btn");
        }
        $.post($(this).data('url'), {'positions': positions}, function (response) {
            if (!response.msg) {
                $('#total_price').text(response.total);
            }
        }, 'json');

    });
    $('.search').submit(function() {
        var txt = $("#key");
        if(txt.val() == ""){
            return false;
        }
    });
});

