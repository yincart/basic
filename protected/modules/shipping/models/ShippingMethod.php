<?php

/**
 * This is the model class for table "shipping_method".
 *
 * The followings are the available columns in table 'shipping_method':
 * @property integer $shipping_method_id
 * @property string $code
 * @property string $name
 * @property string $desc
 * @property integer $enabled
 * @property integer $is_cod
 * @property integer $sort_order
 *
 * The followings are the available model relations:
 * @property Order[] $orders
 */
class ShippingMethod extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'shipping_method';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('enabled, is_cod, sort_order', 'numerical', 'integerOnly'=>true),
            array('code', 'length', 'max'=>45),
            array('name', 'length', 'max'=>120),
            array('desc', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('shipping_method_id, code, name, desc, enabled, is_cod, sort_order', 'safe', 'on'=>'search'),
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
            'orders' => array(self::HAS_MANY, 'Order', 'shipping_method_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'shipping_method_id' => 'Shipping Method',
            'code' => 'Code',
            'name' =>Yii::t('backend','名字'),

            'desc' => Yii::t('backend','描述'),
            'enabled' => Yii::t('backend','能否'),
            'is_cod' => Yii::t('backend','是否'),
            'sort_order' => Yii::t('backend','排序'),
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

        $criteria->compare('shipping_method_id',$this->shipping_method_id);
        $criteria->compare('code',$this->code,true);
        $criteria->compare('name',$this->name,true);
        $criteria->compare('desc',$this->desc,true);
        $criteria->compare('enabled',$this->enabled);
        $criteria->compare('is_cod',$this->is_cod);
        $criteria->compare('sort_order',$this->sort_order);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ShippingMethod the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}