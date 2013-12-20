<?php

/**
 * This is the model class for table "prop_value".
 *
 * The followings are the available columns in table 'prop_value':
 * @property string $prop_value_id
 * @property string $item_prop_id
 * @property string $value_name
 * @property string $value_alias
 * @property integer $status
 * @property integer $sort_order
 *
 * The followings are the available model relations:
 * @property ItemProp $itemProp
 */
class PropValue extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'prop_value';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('item_prop_id, value_name, value_alias, status', 'required'),
            array('status, sort_order', 'numerical', 'integerOnly'=>true),
            array('item_prop_id', 'length', 'max'=>10),
            array('value_name, value_alias', 'length', 'max'=>45),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('prop_value_id, item_prop_id, value_name, value_alias, status, sort_order', 'safe', 'on'=>'search'),
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
            'itemProp' => array(self::BELONGS_TO, 'ItemProp', 'item_prop_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'prop_value_id' => 'Prop Value',
            'item_prop_id' => 'Item Prop',
            'value_name' => 'Value Name',
            'value_alias' => 'Value Alias',
            'status' => 'Status',
            'sort_order' => 'Sort Order',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('prop_value_id',$this->prop_value_id,true);
        $criteria->compare('item_prop_id',$this->item_prop_id,true);
        $criteria->compare('value_name',$this->value_name,true);
        $criteria->compare('value_alias',$this->value_alias,true);
        $criteria->compare('status',$this->status);
        $criteria->compare('sort_order',$this->sort_order);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return PropValue the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}