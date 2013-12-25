<div class="container">
    <?php
    foreach ($model->itemImgs as $itemImg) {
        echo CHtml::openTag('div', array('style' => 'display: inline-block; width:130px; height:65px'));
        echo CHtml::activeHiddenField($itemImg, 'item_img_id');
        echo CHtml::activeHiddenField($itemImg, 'pic');
        echo CHtml::image($itemImg->pic, $itemImg->pic, array('height: 60px; width: 60px'));
        echo CHtml::button('Delete', array('class' => 'delete-image-btn btn'));
        echo CHtml::closeTag('div');
    }
    echo CHtml::openTag('div');
    echo '<hr>';
    echo CHtml::button('Browse', array('class' => 'browse-image-btn btn'));
    echo CHtml::closeTag('div');
    ?>
</div>
<script type="text/javascript">
    $('.browse-image-btn').click(function () {
        $('.browse-image-btn').removeClass('addImage');
        $(this).addClass('addImage');
        window.open('<?php echo Yii::app()->createUrl('mall/elfinder/admin') . '?browse=addImage'; ?>',
            "_blank",
            "toolbar=yes, location=yes, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=no, copyhistory=yes, width=1552, height=822");
    });

    $('.delete-image-btn').click(function () {
        $(this).parent().remove();
    });

    var browse = {};
    browse.callFunction = function (funcNum, url) {
        if (funcNum == 'addImage') {
            var html = $('<div style="display: inline-block; width:130px; height:65px">'
                + '<input type="hidden" value="0" name="ItemImg[item_img_id][]" id="ItemImg_item_img_id">'
                + '<input type="hidden" value="' + url + '" name="ItemImg[pic][]" id="ItemImg_pic">'
                + '<img src="' + url + '" style="height: 60px; width: 60px">'
                + '<input class="delete-image-btn btn" type="button" value="delete">'
                + '</div>');
            html.find('.delete-image-btn').click(function() {
                $(this).parent().remove();
            });
            $('.browse-image-btn').parent().before(html);
        }
    }
</script>