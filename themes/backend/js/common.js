$(document).ready(function () {
    $('#goods-form').on('click','button',function(){
        var tr= $(this).closest('tr').clone();
        tr.find('td').eq(0).remove();

        var td1 = tr.find('td').eq(0).html();
       var html='<tr><td><input  type="hidden" name="Item[item_id][]" id="Item_item_id" value="'+td1+'" /></td>';
        for(var i=0;i<11;i++)
            html=html+'<td>'+tr.find('td').eq(i).html()+'</td>';
        $(window.parent.document).find('#item-table').append(html+'</tr>');
        $(this).closest('tr').remove();
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
            while(childArea.data('child-area')) {
                childArea = $('.' + childArea.data('child-area'));
                childArea.html('');
            }
        }, 'json');
    });        $("#confirmOrder").click(function (event) {
            $('#orderForm').submit();
        });

    $('#add_goods').click(function () {
        showPopup($(this).data('url'));
    });

    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
    });
    $('.search-form form').submit(function(){
        $.fn.yiiGridView.update('shipping-grid', {
            data: $(this).serialize()
        });
        return false;
    });
});
function showPopup(url) {
    var $popup = $('#overlay-popup');
    if ($popup.length) { // if popup has existed, use it
        $popup.show();
    } else { // if popup has not been created, create it
        $popup = $('<div id="overlay-popup"><div class="overlay-popup"></div><div class="popup-container"><b class="close">X</b><iframe class="popup-iframe" src="' + url + '"></iframe></div></div>').appendTo('body')
            .on('click', '.close', function () {
                $(this).parent().parent().hide();
            });
    }
}
$(function () {
    var getItemProps = function () {
        $.get($('#Item_category_id').data('url'),
            {
                "category_id": $("#Item_category_id").select().val(),
                "YII_CSRF_TOKEN": $("[name=YII_CSRF_TOKEN]").val(),
                "item_id": "<?php echo $model->item_id; ?>"
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
    function setChbGroupCount(){
        var $chb = $('input.change'),
            nameArr = [];
        $chb.each(function(){
            var i;
            for(i in nameArr){
                if(this.name === nameArr[i]){
                    return;
                }
            }
            nameArr.push(this.name);
        });
        window.chbGroupCount = nameArr.length;
    }
});