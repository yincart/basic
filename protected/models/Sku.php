<?php

/**
 * This is the model class for table "sku".
 *
 * The followings are the available columns in table 'sku':
 * @property string $sku_id
 * @property string $item_id
 * @property string $props
 * @property string $props_name
 * @property integer $quantity
 * @property integer $with_hold_quantity
 * @property string $price
 * @property string $outer_id
 * @property string $status
 * @property integer $delivery_time
 * @property integer $create_time
 * @property integer $update_time
 */
class Sku extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sku';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('item_id, quantity, price', 'required'),
			array('quantity, with_hold_quantity, delivery_time, create_time, update_time', 'numerical', 'integerOnly'=>true),
			array('item_id', 'length', 'max'=>11),
			array('props', 'length', 'max'=>255),
			array('price', 'length', 'max'=>10),
			array('outer_id', 'length', 'max'=>45),
			array('status', 'length', 'max'=>7),
			array('props_name', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('sku_id, item_id, props, props_name, quantity, with_hold_quantity, price, outer_id, status, delivery_time, create_time, update_time', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'sku_id' => 'Sku',
			'item_id' => 'Item',
			'props' => '属性组',
			'props_name' => '属性组名',
			'quantity' => '数量',
			'with_hold_quantity' => '未付款的订单数量',
			'price' => '价格',
			'outer_id' => '商家编码',
			'status' => '状态',
			'delivery_time' => '发货时间',
			'create_time' => '创建时间',
			'update_time' => '更新时间',
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

		$criteria->compare('sku_id',$this->sku_id,true);
		$criteria->compare('item_id',$this->item_id,true);
		$criteria->compare('props',$this->props,true);
		$criteria->compare('props_name',$this->props_name,true);
		$criteria->compare('quantity',$this->quantity);
		$criteria->compare('with_hold_quantity',$this->with_hold_quantity);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('outer_id',$this->outer_id,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('delivery_time',$this->delivery_time);
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
	 * @return Sku the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function beforeSave() {
	if (parent::beforeSave()) {
	    if ($this->isNewRecord) {
		$this->create_time = $this->update_time = time();
	    }
	    else
		$this->update_time = time();
	    return true;
	}
	else
	    return false;
    }
	
	public static function getSkusData($item_id){
		$models = self::model()->findAllByAttributes(array("item_id"=>$item_id,"status"=>"normal"));
		$data = array();
		foreach($models as $model){			
			$arr = array();
			$arr['sku_id'] = $model->sku_id;
			$arr['props'] = F::convert_props_js_id($model->props);
			//$arr['props'] = str_replace(":","-",$arr['props']);
			$arr['price'] = $model->price;
			$arr['quantity'] = $model->quantity;
			$arr['outer_id'] = $model->outer_id;
			$data[] = $arr;
		}
		
		return $data;
	}
	
}
