<?php

/**
 * This is the model class for table "payment_method".
 *
 * The followings are the available columns in table 'payment_method':
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property string $desc
 * @property string $config
 * @property integer $enabled
 * @property integer $is_cod
 * @property integer $is_online
 * @property integer $sort_order
 */
class PaymentMethod extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'payment_method';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('code, name, desc, config', 'required'),
            array('enabled, is_cod, is_online, sort_order', 'numerical', 'integerOnly'=>true),
            array('code', 'length', 'max'=>45),
            array('name', 'length', 'max'=>120),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('payment_method_id, code, name, desc, config, enabled, is_cod, is_online, sort_order', 'safe', 'on'=>'search'),
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
            'orders' => array(self::HAS_MANY, 'Order', 'payment_method_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'payment_method_id' => 'Payment Method',
            'code' => 'Code',
            'name' => 'Name',
            'desc' => 'Desc',
            'config' => 'Config',
            'enabled' => 'Enabled',
            'is_cod' => 'Is Cod',
            'is_online' => 'Is Online',
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

        $criteria->compare('payment_method_id',$this->payment_method_id,true);
        $criteria->compare('code',$this->code,true);
        $criteria->compare('name',$this->name,true);
        $criteria->compare('desc',$this->desc,true);
        $criteria->compare('config',$this->config,true);
        $criteria->compare('enabled',$this->enabled);
        $criteria->compare('is_cod',$this->is_cod);
        $criteria->compare('is_online',$this->is_online);
        $criteria->compare('sort_order',$this->sort_order);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return PaymentMethod the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}