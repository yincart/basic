<?php

/**
 * This is the model class for table "item_prop".
 *
 * The followings are the available columns in table 'item_prop':
 * @property string $prop_id
 * @property string $parent_prop_id
 * @property string $parent_value_id
 * @property string $prop_name
 * @property string $prop_alias
 * @property string $type
 * @property integer $is_key_prop
 * @property integer $is_sale_prop
 * @property integer $is_color_prop
 * @property integer $is_enum_prop
 * @property integer $is_item_prop
 * @property integer $must
 * @property integer $multi
 * @property string $prop_values
 * @property string $status
 * @property integer $sort_order
 */
class ItemProp extends CActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return ItemProp the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'item_prop';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('category_id, prop_name', 'required'),
            array('category_id, is_key_prop, is_sale_prop, is_color_prop, is_enum_prop, is_item_prop, must, multi, sort_order', 'numerical', 'integerOnly' => true),
            array('parent_prop_id, parent_value_id, type', 'length', 'max' => 10),
            array('prop_name, prop_alias', 'length', 'max' => 100),
            array('status', 'length', 'max' => 7),
            array('category_id, prop_values', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('prop_id, parent_prop_id, parent_value_id, prop_name, prop_alias, type, is_key_prop, is_sale_prop, is_color_prop, is_enum_prop, is_item_prop, must, multi, prop_values, status, sort_order', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
//            'categories'=>array(self::MANY_MANY, 'Category', 'prop_category(prop_id, category_id)'),
            'category' => array(self::BELONGS_TO, 'Category', 'category_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'prop_id' => '属性ID',
            'category_id' => '类目',
            'parent_prop_id' => '上级属性ID',
            'parent_value_id' => '上级属性值ID',
            'prop_name' => '属性名',
            'prop_alias' => '属性别名',
            'type' => '属性值类型',
            'is_key_prop' => '关键属性',
            'is_sale_prop' => '销售属性',
            'is_color_prop' => '颜色属性',
            'is_enum_prop' => '枚举属性',
            'is_item_prop' => '商品属性',
            'must' => '必选属性',
            'multi' => '多选属性',
            'prop_values' => '属性值列表',
            'status' => '状态',
            'sort_order' => '排序',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('prop_id', $this->prop_id, true);
        $criteria->compare('parent_prop_id', $this->parent_prop_id, true);
        $criteria->compare('parent_value_id', $this->parent_value_id, true);
        $criteria->compare('prop_name', $this->prop_name, true);
        $criteria->compare('prop_alias', $this->prop_alias, true);
        $criteria->compare('type', $this->type, true);
        $criteria->compare('is_key_prop', $this->is_key_prop);
        $criteria->compare('is_sale_prop', $this->is_sale_prop);
        $criteria->compare('is_color_prop', $this->is_color_prop);
        $criteria->compare('is_enum_prop', $this->is_enum_prop);
        $criteria->compare('is_item_prop', $this->is_item_prop);
        $criteria->compare('must', $this->must);
        $criteria->compare('multi', $this->multi);
        $criteria->compare('prop_values', $this->prop_values, true);
        $criteria->compare('status', $this->status, true);
        $criteria->compare('sort_order', $this->sort_order);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * 获取指定id的所有后代，不含指定id
     * @param $id 指定id, 有可能是array
     * @return array 所有后代id的一维数组
     */
    public static function getChildsId($id)
    {
        $data = array();
        $ids = array();
        if (!is_array($id)) {
            $id = array($id);
        }
        $id = implode(', ', $id);
        $models = ItemProp::model()->findAll('parent_prop_id in (' . $id . ')');
        if ($models) {
            foreach ($models as $model) {
                $ids[] = $model->prop_id;
            }
            $ids = array_merge($ids, ItemProp::getChildsId($ids));
            return $ids;
        } else {
            return $ids;
        }
    }

    /**
     * 获得指定id的所有后代，含指定id
     * @param mixed $id 指定id, 有可能是array
     * @return array 所有后代的和指定id的一维数组
     */
    function getMeChildsId($id)
    {
        if (!is_array($id)) {
            $id = array($id);
        }
        return array_merge($id, ItemProp::getChildsId($id));
    }

    /*
     * 循环遍历SpecValue[spec_value][]插入数据库
     * 群Zend Framework(95700611) zwp(279795206)友情提示
     */

    public function setPropValues($PropValues)
    {
        if (is_array($PropValues['value_name']) && count($PropValues['value_name'])) {
            $count = count($PropValues['value_name']);
            for ($i = 0; $i < $count; $i++) {
                $model = empty($PropValues['value_id'][$i]) ? new PropValue : PropValue::model()->findByPk($PropValues['value_id'][$i]);
                $model->prop_id = $this->prop_id;
                $model->value_name = $PropValues['value_name'][$i];
//				$model->category_id = $PropValues['category_id'][$i];
                $model->sort_order = $i;
                $model->save();

                $PropValues['value_id'][$i] = $model->value_id;
            }

            //删除
            $models = PropValue::model()->findAll('prop_id = ' . $this->prop_id);
            $delArr = array();
            foreach ($models as $k1 => $v1) {
                if (!in_array($v1->value_id, $PropValues['value_id'])) {
                    $delArr[] = $v1->value_id;
                }
            }
            if (count($delArr)) {
                PropValue::model()->deleteAll('value_id IN (' . implode(', ', $delArr) . ')');
            }
        } else { //已经没有属性了，要清除数据表内容
            PropValue::model()->deleteAll('prop_id = ' . $this->prop_id);
        }
    }

    public function getPropValues()
    {
        $cri = new CDbCriteria(array(
            'condition' => 'prop_id =' . $this->prop_id,
            'order' => 'sort_order asc, value_id asc'
        ));
        $PropValues = PropValue::model()->findAll($cri);

        foreach ($PropValues as $sv) {
            echo $sv->value_name . ',';
        }
    }

    public function getPropOptionValues($label = '', $selected = '')
    {
        $cri = new CDbCriteria(array(
            'condition' => 'prop_id =' . $this->prop_id,
            'order' => 'sort_order asc, value_id asc'
        ));
        $PropValues = PropValue::model()->findAll($cri);
        $list = CHtml::listData($PropValues, 'value_id', 'value_name');
        $data = array();
        foreach ($list as $k => $v) {
            $data[$this->prop_id . ':' . $k] = $v;
        }
        echo CHtml::DropDownList('Item[props][' . $this->prop_id . ']', $selected, $data, array('empty' => '请选择', 'label' => $label));
    }

    public function getPropTextFieldValues($label = '', $value = '')
    {
        echo CHtml::textField('Item[props][' . $this->prop_id . ']', $value, array('label' => $label));
    }

    public function getPropArrayValues()
    {
        $cri = new CDbCriteria(array(
            'condition' => 'prop_id =' . $this->prop_id,
            'order' => 'sort_order asc, value_id asc'
        ));
        $PropValues = PropValue::model()->findAll($cri);
        foreach ($PropValues as $sv) {
            $array[] = $sv->value_name;
        }
        return $array;
    }

    public function getPropCheckBoxListValues($label = '', $selected = '', $class = '', $type = 'props', $child_type = '')
    {
        $cri = new CDbCriteria(array(
            'condition' => 'prop_id =' . $this->prop_id,
            'order' => 'sort_order asc, value_id asc'
        ));
        $PropValues = PropValue::model()->findAll($cri);

        $list = CHtml::listData($PropValues, 'value_id', 'value_name');
        foreach ($list as $k => $v) {
            $data[$this->prop_id . ':' . $k] = $v;
        }
        echo '<ul class="sku-list">';
        if ($child_type) {
            echo CHtml::checkBoxList('Item[' . $type . '][' . $child_type . '][' . $this->prop_id . ']', $selected, $data,
                array('template' => '<label class="checkbox inline">{input}{label}</label>', 'label' => $label, 'separator' => '', 'class' => $class, 'labelOptions' => array('class' => 'labelForRadio')));
        } else {
            echo CHtml::checkBoxList('Item[' . $type . '][' . $this->prop_id . ']', $selected, $data,
                array('template' => '<label class="checkbox inline">{input}{label}</label>', 'label' => $label, 'separator' => '', 'class' => $class, 'labelOptions' => array('class' => 'labelForRadio')));
        }
        echo '</ul>';
    }

    /**
     * 类型
     *
     * @param bool $returnAttr false则返回分类列表，true则返回该对象的分类值
     * @param null $index 结合$returnAttr使用。如果$returnAttr为true，
     *              若指定$index，则返回指定$index对应的值，否则返回当前对象对应的分类值
     * @return mixed
     */
    public function attrType($returnAttr = false, $index = null)
    {
        $data = array(
            'input' => '输入',
            'optional' => '单选',
            'multiCheck' => '多选'
        );

        if ($returnAttr !== false) {
            is_null($index) && $index = $this->type;
            $rs = empty($data[$index]) ? null : $data[$index];
        } else {
            $rs = $data;
        }

        return $rs;
    }

    /**
     *
     * @param string $attr 字段名字
     * @param bool $returnAttr false则返回分类列表，true则返回该对象的分类值
     * @param null $index 结合$returnAttr使用。如果$returnAttr为true，
     *              若指定$index，则返回指定$index对应的值，否则返回当前对象对应的分类值
     * @return mixed
     */
    public function attrBool($attr, $returnAttr = false, $index = null)
    {
        $data = array(
            '1' => '是',
            '0' => '否'
        );

        if ($returnAttr !== false) {
            is_null($index) && $index = $this->$attr;
            $rs = empty($data[$index]) ? null : $data[$index];
        } else {
            $rs = $data;
        }

        return $rs;
    }

    /**
     *
     * @param bool $returnAttr false则返回分类列表，true则返回该对象的分类值
     * @param null $index 结合$returnAttr使用。如果$returnAttr为true，
     *              若指定$index，则返回指定$index对应的值，否则返回当前对象对应的分类值
     * @return mixed
     */
    public function attrStatus($returnAttr = false, $index = null)
    {
        $data = array(
            'normal' => '正常',
            'deleted' => '删除'
        );

        if ($returnAttr !== false) {
            is_null($index) && $index = $this->$attr;
            $rs = empty($data[$index]) ? null : $data[$index];
        } else {
            $rs = $data;
        }

        return $rs;
    }

    /**
     * 分类属性
     *
     * @param int $id 分类ID
     * @param bool $returnAttr false则返回分类列表，true则返回该对象的分类值
     * @param null $index 结合$returnAttr使用。如果$returnAttr为true，
     *              若指定$index，则返回指定$index对应的值，否则返回当前对象对应的分类值
     * @param int $level 层级
     * @return mixed
     */
    public function attrCategory($id, $returnAttr = false, $index = null, $level = 1)
    {
        $data = array();
        $category = Category::model()->findByPk($id);
        $descendants = $category->descendants()->findAll();
        $data = Category::model()->getSelectOptions($descendants);
        if ($returnAttr && $index && isset($data[$index]))
            $data = $data[$index];
        return $data;
    }

}
