EAV behavior
============

Добавляет модели возможность работать с eav-моделью данных.

Установка и настройка
---------------------

### Создать таблицу для храниениея EAV-аттрибутов

SQL для таблицы:
~~~
[sql]
CREATE TABLE IF NOT EXISTS `eavAttr` (
  `entity` bigint(20) unsigned NOT NULL,
  `attribute` varchar(250) NOT NULL,
  `value` text NOT NULL,
  KEY `ikEntity` (`entity`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
~~~

### Подключить поведение к модели
~~~
[sql]
function behaviors() {
    return array(
        'eavAttr' => array(
            'class' => 'ext.yiiext.behaviors.model.eav.EEavBehavior',
            // Имя таблицы для аттрибутов (обязательное свойство)
            'tableName' => 'eavAttr',
            // Имя столбца где хранится ид объекта.
            // По умолчанию 'entity'
            'entityField' => 'entity',
            // Имя столбца где хранится имя атрибута.
            // По умолчанию 'attribute'
            'attributeField' => 'attribute',
            // Имя столбца где хранится значение атрибута.
            // По умолчанию 'value'
            'valueField' => 'value',
            // Имя внешнего ключа модели.
            // По умолчанию берется primaryKey из свойста таблицы
            'modelTableFk' => primaryKey,
            // Массив разрешенных атрибутов, если не указано разрешаются любые атрибуты
            // По умолчанию не указано.
            'safeAttributes' => array(),
            // Префикс для атрибутов. Если для разных моделей используется одна таблица.
            // По умолчанию не указано.
            'attributesPrefix' => '',
        )
    );
}
~~~

Методы
------
### getEavAttributes($attributes)
Возвращает массив значений атрибутов, индексированные именем атрибута.

~~~
[php]
$user = User::model()->findByPk(1);
$user->getEavAttributes(array('attribute1', 'attribute2'));
~~~

### getEavAttribute($attribute)
Возвращает значение атрибута.

~~~
[php]
$user = User::model()->findByPk(1);
$user->getEavAttribute('attribute1');
~~~

### setEavAttribute($attribute, $value, $save = FALSE)
Устанавливает значение атрибута.

~~~
[php]
$user = User::model()->findByPk(1);
$user->setEavAttribute('attribute1', 'value1');
~~~

### setEavAttributes($attribute, $save = FALSE)
Устанавливает значение атрибутов.

~~~
[php]
$user = User::model()->findByPk(1);
$user->setEavAttributes(array('attribute1' => 'value1', 'attribute2' => 'value2'));
~~~

### withEavAttributes($attributes)
Позволяет ограничить запрос AR записями с указанными атрибутами.

~~~
[php]
$users = User::model()->withEavAttributes(array('skype'))->findAll();
$usersCount = User::model()->withEavAttributes(array('skype'))->count();
~~~