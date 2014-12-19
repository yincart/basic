<?php

/**
 * This is the model class for table "order_log".
 *
 * The followings are the available columns in table 'order_log':
 * @property string $log_id
 * @property integer $order_id
 * @property integer $op_id
 * @property string $op_name
 * @property string $log_text
 * @property string $action_time
 * @property string $behavior
 * @property string $result
 */
class OrderLog extends CActiveRecord
{
    private $user_id;
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return OrderLog the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'order_log';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_id', 'numerical', 'integerOnly'=>true),
            array('order_id', 'length', 'max'=>20),
            array('op_name', 'length', 'max'=>45),
            array('action_time', 'length', 'max'=>10),
            array('result', 'length', 'max'=>7),
            array('log_text', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('log_id, order_id, op_name, log_text, action_time, user_id, result', 'safe', 'on'=>'search'),
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
            'log_id' => '日志id',
            'order_id' => '订单id',
            'op_name' => '操作名称',
            'log_text' => '日志内容',
            'action_time' => '操作时间',
            'user_id' => '用户id',
            'result' => '返回结果',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('log_id',$this->log_id,true);
        $criteria->compare('order_id',$this->order_id,true);
        $criteria->compare('op_name',$this->op_name,true);
        $criteria->compare('log_text',$this->log_text,true);
        $criteria->compare('action_time',$this->action_time,true);
        $criteria->compare('user_id',$this->user_id);
        $criteria->compare('result',$this->result,true);

        $criteria->order='log_id desc';

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    protected function beforeSave(){
        $this->action_time = time();
        $this->user_id = Yii::app()->user->id;
        parent::beforeSave();
        return true;
    }

    public function showOp($log_id){
        $logOp = OrderLog::model()->findByPk($log_id);
        $users = Users::model()->findByPk($logOp->user_id);
        $op = $users->username . ' ' .$logOp->op_name .  " order " .$logOp->order_id;
        return $op;
    }
}