<?php
class ConfigdataForm extends CFormModel
{
    public $dbhost = 'localhost';
    public $dbuser = 'root';
    public $dbpwd = "";
    public $dbname = "fan";
    public $dblang = "utf-8";
    public $dbprefix = "yincart_";
    public $adminmail = "admin@fanhao.com";
    public $webname = "myweb";
    public $cmspath;
    public $baseurl;
    public $indexUrl;
    public $adminuser = "admin";
    public $adminpwd = "admin";
    public $dfDbname;
    public $dir;

    public function put_dir($DIR)
    {
        $this->dir = $DIR;
    }

    public function get_dir()
    {
        return $this->dir;
    }

    public function rules()
    {
        return array(
            array('dbhost,dbuser,dbpwd,  dbname,webname, adminuser, adminpwd ', 'required'),
        );
    }

    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('dbhost', $this->dbhost);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}