<?php

/**
 * This is the model class for table "{{plugins_setting}}".
 *
 * The followings are the available columns in table '{{plugins_setting}}':
 * @property string $plugin
 * @property string $key
 * @property string $value
 */
class PluginsSetting extends CActiveRecord {

	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
		return '{{plugins_setting}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('plugin, key', 'required'),
			array('plugin, key', 'length', 'max' => 45),
			array('value', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('plugin, key, value', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
			'plugin' => 'Plugin',
			'key' => 'Key',
			'value' => 'Value',
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
	public function search() {
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria = new CDbCriteria;

		$criteria->compare('plugin', $this->plugin, true);
		$criteria->compare('key', $this->key, true);
		$criteria->compare('value', $this->value, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PluginsSetting the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	####################

	public function clear($plugin) {
		$this->deleteAll("plugin=:plugin", array(':plugin' => $plugin));
	}

	public function get($plugin, $key) {
		$row = $this->findByAttributes(array('plugin' => $plugin, 'key' => $key));
		if (empty($row)) {
			return FALSE;
		}
		return $row->value;
	}

	public function set($plugin, $key, $value = NULL) {
		$row = $this->get($plugin, $key);
		if ($row === FALSE) {
			$this->setIsNewRecord(true);
			$this->plugin = $plugin;
			$this->key = $key;
			$this->value = $value;
			return $this->save();
		} else {
			return $this->updateByPk(array('plugin' => $plugin, 'key' => $key), array('value' => $value));
		}
	}

}
