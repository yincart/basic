<?php

class ServerFileInput extends CInputWidget
{
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

        $contHtmlOptions = $this->htmlOptions;
        $contHtmlOptions['id'] = $id . 'container';
        echo CHtml::openTag('div', $contHtmlOptions);
        $inputOptions = array('id' => $id, 'style' => 'float:left;' /*, 'readonly' => 'readonly'*/);
        if ($this->hasModel()) {
//            echo CHtml::activeTextField($this->model, $this->attribute, $inputOptions);
            echo CHtml::activeHiddenField($this->model, $this->attribute, $inputOptions);
            echo CHtml::image($this->model->{$this->attribute}, 'pic', array('id' => $id . '_img', 'style' => 'height:60px'));
        } else {
//            echo CHtml::textField($name, $this->value, $inputOptions);
            echo CHtml::hiddenField($name, $this->value, $inputOptions);
            echo CHtml::image($name, 'pic', array('id' => $id . '_img', 'style' => 'height: 60px; width: 60px; display: none'));
        }
        echo CHtml::button('Browse', array('id' => $id . 'browse', 'class' => 'btn browse-elfinder-btn'));
        echo CHtml::closeTag('div');

        $url = Yii::app()->createUrl('mall/elfinder/admin') . '?browse=browse';

        $js = <<<EOD
    $('.browse-elfinder-btn').click(function() {
        $('.browse-elfinder-btn').removeClass('browse');
        $(this).addClass('browse');
        window.open('$url',"_blank","toolbar=yes, location=yes, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=no, copyhistory=yes, width=1552, height=822");
    });
EOD;
        Yii::app()->getClientScript()->registerScript("elFinder#$id", $js);
    }

}
