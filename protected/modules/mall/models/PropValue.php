<?php

/**
 * This is the model class for table "prop_value".
 *
 * The followings are the available columns in table 'prop_value':
 * @property string $value_id
 * @property string $type_id
 * @property string $prop_id
 * @property string $value_name
 * @property string $value_alias
 * @property integer $is_parent
 * @property string $status
 * @property integer $sort_order
 */
class PropValue extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return PropValue the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'prop_value';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('type_id, value_name', 'required'),
            array('is_parent, sort_order', 'numerical', 'integerOnly' => true),
            array('type_id, prop_id', 'length', 'max' => 10),
            array('value_name, value_alias', 'length', 'max' => 45),
            array('status', 'length', 'max' => 7),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('value_id, type_id, prop_id, value_name, value_alias, is_parent, status, sort_order', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'prop' => array(self::BELONGS_TO, 'ItemProp', 'prop_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'value_id' => '属性值ID',
            'type_id' => '商品类目',
            'prop_id' => '属性ID',
            'value_name' => '属性值名称',
            'value_alias' => '属性值别名',
            'is_parent' => '是否为父类目属性',
            'status' => '状态',
            'sort_order' => '排序',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('value_id', $this->value_id, true);
        $criteria->compare('type_id', $this->type_id, true);
        $criteria->compare('prop_id', $this->prop_id, true);
        $criteria->compare('value_name', $this->value_name, true);
        $criteria->compare('value_alias', $this->value_alias, true);
        $criteria->compare('is_parent', $this->is_parent);
        $criteria->compare('status', $this->status, true);
        $criteria->compare('sort_order', $this->sort_order);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}