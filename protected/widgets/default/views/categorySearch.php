<style type="text/css" media="screen">
    ul, li {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    div, img, span {
        padding: 0;
        margin: 0;
        border: 0;
    }

    body {
        font-family: "Microsoft YaHei";
    }

    .hidden {
        display: none;
    }

    .customization {
        /*width: 600px;*/
        box-sizing: border-box;
        padding: 10px;
        border: 1px solid #ccc;
        background-color: #eee;
        font-size: 12px;
        line-height: 16px;
    }

    .customization a {
        text-decoration: none;
        color: #5588cc;
    }

    .customization .section,
    .customization .size a,
    .customization .drp {
        -moz-border-radius: 2px;
        -webkit-border-radius: 2px;
        -o-border-radius: 2px;
        -ms-border-radius: 2px;
        border-radius: 2px;
    }

    .customization .section {
        border: 1px solid #ccc;
        margin-bottom: 10px;
        background-color: #fff;
        padding: 5px;
    }

    .customization .gray {
        background-color: #efefef;
    }

    .customization .subsection {
        padding: 5px;
    }

    .customization .classname {
        display: inline-block;
        text-align: right;
        width: 10%;
        max-width: 70px;
        vertical-align: top;
    }

    .customization ul {
        display: inline-block;
        margin-left: 10px;
        width: 85%;
    }

    .customization .list sub {
        color: #666;
        vertical-align: bottom;
    }

    .customization ul li {
        display: inline-block;
        padding-right: 10px;
    }

    .customization .underline {
        border-bottom: 1px solid #ccc;
    }

    .customization img {
        width: 24px;
        height: 24px;
        display: block;
        border: 0;
    }

    .customization .color a {
        display: block;
        border: 2px solid #ccc;
    }

    .customization .color .classname {
        vertical-align: top;
        padding-top: 8px;
    }

    .customization .color a:hover {
        border: 2px solid #b00000;
    }

    .customization .size a {
        display: block;
        padding: 1px 6px;
        border: 1px solid #ccc;
        color: #666;
        margin-bottom: 2px;
        font-family: "Arial";
    }

    .customization .drp {
        border: 1px solid #ccc;
        padding: 3px 20px 3px 6px;
        position: relative;
    }

    .customization .drp .down-arrow,
    .customization .drp .down-arrow a {
        position: absolute;
        right: 5px;
        top: 8px;
        display: inline-block;
        width: 0;
        height: 0;
        border-top: 6px solid #666;
        border-left: 6px solid transparent;
        border-right: 6px solid transparent;
        content: "";
        cursor: pointer;
    }

    .customization .drp .down-arrow a {
        border-top: 4px solid #fff;
        border-left: 4px solid transparent;
        border-right: 4px solid transparent;
        top: -7px;
        left: -4px;
        z-index: 99;
    }

    .result {
        margin: 0 5px;
    }

    .section li:hover {
        cursor: pointer;
    }

    .prop_selected a {
        background-color: red;
        color: white;
        text-align: center;
    }
    .multe_selected {
        border: solid 1px red;
    }
</style>
<?php
$url = !empty($this->category->url) ? $this->category->url : $this->category->id;
?>
<div class="customization"
     data-url="<?php echo Yii::app()->createUrl('catalog/index', array('key' => $url, 'prop' => '')); ?>">
    <?php if (!empty($categories)) { ?>
        <div class="section gray">
            <div class="subsection">
                <span class="classname">分类名称:</span>
                <ul class="list">
                    <?php foreach ($categories as $cat) {
                        $url = !empty($cat->url) ? $cat->url : $cat->id;
                        echo '<li><a href="' . Yii::app()->createUrl('catalog/index', array('key' => $url)) . '">' . $cat->name . '</a></li>';
                    } ?>
                </ul>
            </div>
        </div>
    <?php } ?>
    <?php if (!empty($item_props)) { ?>
        <div class="section">
            <?php foreach ($item_props as $prop) { ?>
                <div class="subsection">
                    <span class="classname" data-value="<?php echo $prop->prop_id ?>" data-is-multi="false"><?php echo $prop->prop_name; ?>: </span>
                    <ul class="list underline">
                        <?php foreach ($prop->propValues as $prop_value) {
                            $value = $prop->prop_id . ':' . $prop_value->value_id;
                            $class = strstr($_GET['prop'], $value) ? 'prop_selected' : '';
                            echo '<li class="' . $class . '"><a data-value="' . $value . '">' . $prop_value->value_name . '</a></li>';
                        } ?>
                    </ul>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
</div>
<script type="text/javascript">
    $('.section li').click(function () {
        if ($(this).attr('class').indexOf('prop_selected') == -1) {
//            if (!$(this).parent().parent().find('.classname').data('is-multi')) {
//                $(this).parent().children().removeClass('prop_selected');
//            }
            $(this).addClass('prop_selected');
        } else {
            $(this).removeClass('prop_selected');
        }
        var prop_selected = $('.prop_selected a');
        var props = [];
        for (var i = 0; i < prop_selected.length; i++) {
            props.push($(prop_selected[i]).data('value'));
        }
        var prop = props.join(';');
        var url = $('.customization').data('url') + prop;
        window.location.href = url;
    });

    $('.classname').click(function() {
        if ($(this).data('is-multi')) {
            $(this).data('is-multi', false);
            $(this).parent().removeClass('multe_selected');
        } else {
            $(this).parent().addClass('multe_selected');
            $(this).data('is-multi', true);
        }
    });
</script>