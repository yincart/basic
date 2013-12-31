<?php

class ServerFileInput extends CInputWidget
{
    public $isMulti = false;
    public $models = array();
    public $attributes = array();
    public $filebrowserBrowseUrl;

    public function run()
    {
        list($name, $id) = $this->resolveNameID();
        if (isset($this->htmlOptions['id']))
            $id = $this->htmlOptions['id'];
        else
            $this->htmlOptions['id'] = $id;
        if (isset($this->htmlOptions['name']))
            $name = $this->htmlOptions['name'];
        else
            $this->htmlOptions['name'] = $name;

        $modelName = get_class($this->model);
        echo '<div id="img-area">';
        if ($this->isMulti) {
            foreach ($this->models as $itemImg) {
                echo "<div class='img-item'>";
                echo CHtml::image($itemImg->{$this->attribute});
                echo "<div class='overlay'></div><div class='operater'><span class='prev'></span><b class='del'>X</b><span class='next'></span>";
                echo CHtml::activeHiddenField($itemImg, $this->attribute, array('name' => $modelName . '[' . $this->attribute . '][]'));
                foreach ($this->attributes as $attr) {
                    echo CHtml::activeHiddenField($itemImg, $attr, array('name' => $modelName . '[' . $attr . '][]'));
                }
                echo "</div></div>";
            }
            echo '<div id="browse-image-btn" class="img-plus">&#43;</div>';

            $input = '<input name="' . $modelName . '[' . $this->attribute . '][]" id="' . $modelName . '_' . $this->attribute . '" type="hidden" value="\' + url + \'">';
            foreach ($this->attributes as $attr) {
                $input .= CHtml::activeHiddenField($this->model, $attr, array('name' => $modelName . '[' . $attr . '][]'));
            }
            $jsContent = <<<EOF
            var html = "<div class='img-item'><img src='" + url + "'>" +
                "<div class='overlay'></div><div class='operater'>" +
                "<span class='prev'></span><b class='del'>X</b><span class='next'></span>" +
                '$input' +
                "</div></div>";
            $('#browse-image-btn').before(html);
EOF;
        } else {
            echo "<div id='browse-image-btn' class='img-item' style='cursor: pointer'>";
            echo CHtml::image($this->model->{$this->attribute});
            echo CHtml::activeHiddenField($this->model, $this->attribute);
            echo "</div>";

            $input = '<input name="' . $modelName . '[' . $this->attribute . ']" id="' . $modelName . '_' . $this->attribute . '" type="hidden" value="\' + url + \'">';
            $jsContent = <<<EOF
            var html = "<img src='" + url + "'>" + '$input';
            $('#browse-image-btn').html(html);
EOF;
        }

        $css = <<<EOF
    #img-area {
        min-height: 70px;
    }

    .img-plus {
        width: 60px;
        height: 60px;
        border-radius: 5px;
        box-sizing: border-box;
        border: 2px dashed #000;
        font-size: 60px;
        font-weight: 500;
        cursor: pointer;
        line-height: 50px;
        text-align: center;
        display: inline-block;
    }

    .img-item,
    .img-item img {
        width: 60px;
        height: 60px;
        display: inline-block;
    }

    .img-item {
        position: relative;
        vertical-align: top;
        margin-right: 20px;
    }

    .img-item img {
        border: 0;
    }

    .img-item .overlay {
        position: absolute;
        width: 60px;
        height: 60px;
        opacity: 0.5;
        filter: alpha(opacity=50);
        background-color: #000;
        z-index: 5;
        top: 0;
        display: none;
    }

    .img-item .operater {
        position: absolute;
        z-index: 10;
        height: 10px;
        display: block;
        top: 35px;
        width: 60px;
        display: none;
    }

    .img-item .prev,
    .img-item .next {
        display: inline-block;
        content: '';
        width: 0;
        height: 0;
        border-top: 8px solid transparent;
        border-bottom: 8px solid transparent;
        cursor: pointer;
    }

    .img-item .prev {
        border-right: 8px solid #ccc;
        margin-left: 7px;
    }

    .img-item .next {
        border-left: 8px solid #ccc;
        margin-right: 7px;
    }

    .img-item .del {
        display: inline-block;
        width: 16px;
        margin: 0 7px;
        color: #ccc;
        font-size: 20px;
        text-align: center;
        font-weight: normal;
        cursor: pointer;
    }

    /* forbid double click*/
    .img-item .prev,
    .img-item .next,
    .img-item .del {
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    /* elfinder popup */
    .elfinder-popup {
        display: none;
        position: absolute;
        width: 1000px;
        height: 700px;
        top: 50%;
        left: 50%;
        margin-left: -500px;
        margin-top: -350px;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 20px;
        padding: 40px 20px 20px 20px;
        box-shadow: 0 0 4px 2px rgba(0, 0, 0, 0.1);
        z-index: 9999;
    }

    .elfinder-popup .close {
        display: block;
        width: 20px;
        height: 20px;
        position: absolute;
        top: 10px;
        right: 15px;
    }

    .elfinder-popup iframe {
        width: 100%;
        height: 100%;
    }

    .overlay-body {
        width: 100%;
        height: 100%;
        position: fixed;
        background-color:transparent;
        top: 0;
        left: 0;
        z-index: 2000;
    }
    .imgtextarea{
        position:absolute;
        top:0;
        left:0;
        width:60px;
        height:60px;
        line-height:40px;
        font-size:20px;
        color:red;
        text-align:center;
    }
EOF;
        $js = <<<EOF
    var imgList = $('#img-area'), elpopups;
    // open elfinder popup
    $('#browse-image-btn').click(function () {
        var html;
        // if elfinder has not been initiated, create it
        if (!elpopups) {
            html = '<div class="overlay-body"></div><div id="elfinder" class="elfinder-popup"><span class="close">x</span><iframe scrolling="no" src="{$this->filebrowserBrowseUrl}?browse=addImage"></iframe></div>';
            elpopups = $(html).appendTo('body').find('.close').on('click',function () {
                elpopups.hide();
            }).end();
        }
        elpopups.show();
        // window.open('',
        // "_blank",
        // "toolbar=yes, location=yes, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=no, copyhistory=yes, width=1552, height=822");
    });



    imgList.on('click', '.del',function () {
        $(this).closest('.img-item').remove();
    }).on('click', '.prev',function () {
            exchangePos(this, 'prev');
        }).on('click', '.next',function () {
            exchangePos(this, 'next');
        }).on('mouseenter', '.img-item',function () {
            $(this).children(':gt(0)').show();
        }).on('mouseleave', '.img-item', function () {
            $(this).children(':gt(0)').hide();
        });

    function exchangePos(elem, ori) {
        var item = $(elem).closest('.img-item'),
            items = imgList.children('.img-item'),
            index = item.index();
        if (items.length === 1) {
            return;
        }
        if (ori === 'prev') {
            if (index !== 0) {
                item.children(':gt(0)').hide().end().prev().before(item);
            }
        } else if (ori === 'next') {
            if (index !== items.length - 1) {
                item.children(':gt(0)').hide().end().next().after(item);
            }
        }
    }

    var browse = {};
    browse.callFunction = function (funcNum, url) {
        if (funcNum == 'addImage') {
            $jsContent
        }
    }
    window.browse = browse;
EOF;

        Yii::app()->getClientScript()->registerCss("elFinder#$id", $css);
        Yii::app()->getClientScript()->registerScript("elFinder#$id", $js);
    }

}
