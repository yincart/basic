EAV behavior
============

Allows model to work with custom fields on the fly (EAV pattern).

Installing and configuring
--------------------------

### Create a table that will store EAV-attributes

SQL dump:

~~~
[sql]
CREATE TABLE IF NOT EXISTS `eavAttr` (
  `entity` bigint(20) unsigned NOT NULL,
  `attribute` varchar(250) NOT NULL,
  `value` text NOT NULL,
  KEY `ikEntity` (`entity`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
~~~

### Attach behaviour to your model

~~~
[php]
function behaviors() {
    return array(
        'eavAttr' => array(
            'class' => 'ext.yiiext.behaviors.model.eav.EEavBehavior',
            // Table that stores attributes (required)
            'tableName' => 'eavAttr',
            // model id column
            // Default is 'entity'
            'entityField' => 'entity',
            // attribute name column
            // Default is 'attribute'
            'attributeField' => 'attribute',
            // attribute value column
            // Default is 'value'
            'valueField' => 'value',
            // Model FK name
            // By default taken from primaryKey
            'modelTableFk' => primaryKey,
            // Array of allowed attributes
            // All attributes are allowed if not specified
            // Empty by default
            'safeAttributes' => array(),
            // Attribute prefix. Useful when storing attributes for multiple models in a single table
            // Empty by default
            'attributesPrefix' => '',
        )
    );
}
~~~

Methods
-------

### getEavAttributes($attributes)
Get attribute values indexed by attributes name.

~~~
[php]
$user = User::model()->findByPk(1);
$user->getEavAttributes(array('attribute1', 'attribute2'));
~~~

### getEavAttribute($attribute)
Get attribute value.

~~~
[php]
$user = User::model()->findByPk(1);
$user->getEavAttribute('attribute1');
~~~

### setEavAttribute($attribute, $value, $save = FALSE)
Set attribute value.

~~~
[php]
$user = User::model()->findByPk(1);
$user->setEavAttribute('attribute1', 'value1');
~~~

### setEavAttributes($attributes, $save = FALSE)
Set attributes values.

~~~
[php]
$user = User::model()->findByPk(1);
$user->setEavAttributes(array('attribute1' => 'value1', 'attribute2' => 'value2'));
~~~

### withEavAttributes($attributes)
Limits AR query to records with specified attributes.

~~~
[php]
$users = User::model()->withEavAttributes(array('skype'))->findAll();
$usersCount = User::model()->withEavAttributes(array('skype'))->count();
~~~