<?php

foreach ($this->getFootMenu() as $fm) {
    echo CHtml::link($fm->name, $fm->url ? Yii::app()->request->baseUrl.'/'.$fm->url : '#') . '&nbsp;|&nbsp;';
}
?>