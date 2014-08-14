<?php
echo CHtml::form(); 
       echo CHtml::dropDownList('_theme', $currentTheme, array(
           'default' => 'Default', 'ultimo' => 'Ultimo'), array('submit' => ''));
echo CHtml::endForm();
?>  