<script>
    ;(function($) {

        $.yii = {
            version : '1.0',

            submitForm : function (element, url, params) {
                var f = $(element).parents('form')[0];
                if (!f) {
                    f = document.createElement('form');
                    f.style.display = 'none';
                    element.parentNode.appendChild(f);
                    f.method = 'POST';
                }
                if (typeof url == 'string' && url != '') {
                    f.action = url;
                }
                if (element.target != null) {
                    f.target = element.target;
                }

                var inputs = [];
                $.each(params, function(name, value) {
                    var input = document.createElement("input");
                    input.setAttribute("type", "hidden");
                    input.setAttribute("name", name);
                    input.setAttribute("value", value);
                    f.appendChild(input);
                    inputs.push(input);
                });

                // remember who triggers the form submission
                // this is used by jquery.yiiactiveform.js
                $(f).data('submitObject', $(element));

                $(f).trigger('submit');

                $.each(inputs, function() {
                    f.removeChild(this);
                });
            }
        };

    })(jQuery);
</script>
<?php
$this->breadcrumbs = array(
    Yii::t('main','Category') => array('admin'),
    Yii::t('main','Manage'),
);

$this->menu = array(
    array('label' => Yii::t('main','Create Category'), 'icon' => 'plus', 'url' => array('create')),
);
?>

    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id' => 'horizontalForm',
            'htmlOptions' => array(
                'class' => 'form-horizontal',
            )
        )
    );
    $options = array(
        array(
            'text' => '商品',
            'url' => '/catalog/item/admin',
            'id' => 'Item[category_id]',
        ),
        array(
            'text' => '属性',
            'url' => '/catalog/itemProp/admin',
            'id' => 'ItemProp[category_id]',
        ),
        array(
            'text' => '更新',
            'url' => '/catalog/itemCategory/update',
        ),
        array(
            'text' => '删除',
            'htmlOptions' => array(
                'submit' => '/catalog/itemCategory/delete',
                'style' => 'cursor:pointer',
                'confirm' => 'Are you sure you want to delete this item?'
            )
        )
    );
    echo Category::model()->getTree(3, $options, 'getLabel');
    $this->endWidget();
    ?>