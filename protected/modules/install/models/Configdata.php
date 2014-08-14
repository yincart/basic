<?php

/**
 * This is the model class for table "configdata".
 *
 * The followings are the available columns in table 'configdata':
 * @property string $username
 * @property string $password
 * @property string $dbname
 * @property string $host
 */
class Configdata extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
    public $dbhost;
    public $dbuser;
    public $dbpwd;
    public $dbname;
    public $dblang;
    public $dbprefix;
    public $adminmail;
    public $webname;
    public $cmspath;
    public $baseurl;
    public $indexUrl;
    public $adminuser;
    public $adminpwd;



	public function tableName()
	{
		return 'configdata';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, dbname, host', 'required'),
			array('username, password, dbname, host', 'length', 'max'=>32),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('username, password, dbname, host,dir', 'safe', 'on'=>'search'),
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
			'username' => 'Username',
			'password' => 'Password',
			'dbname' => 'Dbname',
			'host' => 'Host',
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

		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('dbname',$this->dbname,true);
		$criteria->compare('host',$this->host,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Configdata the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
