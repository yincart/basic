<?php

/**
 * This is the model class for table "sku_price".
 *
 * The followings are the available columns in table 'sku_price':
 * @property integer $price_id
 * @property integer $store_id
 * @property integer $sku_id
 * @property integer $user_id
 * @property string $mode
 * @property string $price
 * @property integer $is_safe
 * @property integer $shipping_method
 * @property integer $hao
 * @property integer $create_time
 * @property integer $update_time
 */
class SkuPrice extends CActiveRecord
{
	/**
	 * @return string the associated database table mode
	 */
	public function tableName()
	{
		return 'sku_price';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('store_id, sku_id, mode, price, is_safe, url', 'required'),
			array('store_id, sku_id, user_id, is_safe, currency_id, shipping_method, hao, create_time, update_time', 'numerical', 'integerOnly'=>true),
			array('mode', 'length', 'max'=>200),
			array('price', 'length', 'max'=>50),
            array('url', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('price_id, store_id, sku_id, user_id, mode, price, is_safe, shipping_method, hao, create_time, update_time', 'safe', 'on'=>'search'),
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
            'store' => array(self::BELONGS_TO, 'Store', 'store_id'),
            'currency' => array(self::BELONGS_TO, 'Currency', 'currency_id'),
            'sku' => array(self::BELONGS_TO, 'Sku', 'sku_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'price_id' => 'Price',
			'store_id' => '店家',
			'sku_id' => 'Sku ID',
			'user_id' => 'User',
			'mode' => '运营模式',
			'price' => '价格',
            'currency_id' => '货币单位',
			'is_safe' => '正品保障',
			'shipping_method' => '快递方式',
            'url' => '直达链接',
			'hao' => 'Hao',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
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

		$criteria->compare('price_id',$this->price_id);
		$criteria->compare('store_id',$this->store_id);
		$criteria->compare('sku_id',$this->sku_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('mode',$this->mode,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('is_safe',$this->is_safe);
		$criteria->compare('shipping_method',$this->shipping_method);
		$criteria->compare('hao',$this->hao);
		$criteria->compare('create_time',$this->create_time);
		$criteria->compare('update_time',$this->update_time);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SkuPrice the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    protected function beforeSave()
    {
        if(parent::beforeSave())
        {
            if($this->isNewRecord)
            {
                $this->create_time=$this->update_time=time();
                $this->user_id=Yii::app()->user->id;
            }
            else
                $this->update_time=time();
            return true;
        }
        else
            return false;
    }
}
