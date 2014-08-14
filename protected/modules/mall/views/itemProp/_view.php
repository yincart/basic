<?php
/**
 * Created by PhpStorm.
 * author: shuai.du@jago-ag.cn
 * Date: 3/6/14
 * Time: 2:47 PM
 */
$data = Category::model()->findAllByAttributes(array('category_id'=>$model->category_id));
$propValues = PropValue::model()->findAllByAttributes(array('item_prop_id'=> $model->item_prop_id));
$propstr = '';
foreach($propValues as $propvalue)
{
    $propstr.=$propvalue->value_alias.'; ';
}
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data'=>$model,
    'attributes'=>array(
        array(
            'name' =>Yii::t('backend','分类'),
            'value' => $data[0]['name'],
        ),
        array(
           'name'=> Yii::t('backend','品牌名'),
           'value' => $propstr,
        ),
        array(
            'name' => 'prop_name',
            'label' =>  Yii::t('backend','属性名'),
        ),
        array(
            'name' => 'prop_alias',
            'label' =>  Yii::t('backend','属性别名'),
        ),
        array(
            'name' => Yii::t('backend','属性类型'),
            'value' => $model->getType(),
        ),
        array(
            'name' => Yii::t('backend','是否关键属性'),
            'value' => $model->getKey(),
        ),
        array(
            'name' => Yii::t('backend','是否销售属性'),
            'value' => $model->getSale(),
        ),
        array(
            'name' => Yii::t('backend','是否颜色属性'),
            'value' => $model->getColor(),
        ),
        array(
            'name' => Yii::t('backend','是否必选'),
            'value' => $model->getMust(),
        ),
        array(
            'name' => Yii::t('backend','状态'),
            'value' => $model->getStatus(),
        ),
        array(
            'name' => 'sort_order',
            'label' => '排序',
        ),
        'item_propcol',
    )
));