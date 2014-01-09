<?php
/* @var $this DefaultController */


$this->widget('widgets.default.WReview',array(
    '_itemId'=> $product_id,
    '_entityId'=>$entity_id,
    '_rating'=>$rating,
));