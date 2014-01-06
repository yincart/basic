Shopping Cart
=============
Компонент для реализации корзины моделей.

Корзина - объект контейнер, для хранения коллекции позиций, и методами для работы с этой коллекцией.

Состояние корзины между запросами хранится в сессии пользователя.

Установка и настройка
---------------------
### 1 вариант: Подключение через конфиг
В `protected/config/main.php` добавить:
~~~
[php]
'import'=>array(
    'ext.yiiext.components.shoppingCart.*'
),

'components' => array(
  'shoppingCart' =>
    array(
        'class' => 'ext.yiiext.components.shoppingCart.EShoppingCart',
    ),
)
~~~
### 2 вариант: Подключение по необходимости
~~~
[php]
$cart = Yii::createComponent(array(
	'class' => 'ext.yiiext.components.shoppingCart.EShoppingCart'
));
//Важно
$cart->init();

$book = Book::model()->findByPk(1);
$cart->put($book);
~~~

Подготавливаем модель
---------------------
Модели, которым необходимо дать возможность добавления в корзину,
должны реализовать интерфейс `IECartPosition`:

~~~
[php]
class Book extends CActiveRecord implements IECartPosition {
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    function getId(){
        return 'Book'.$this->id;
    }

    function getPrice(){
        return $this->price;
    }
}
~~~

API
---

### EShoppingCart::put($position, $quantity)
Добавляет в корзину позицию товара в количестве $quantity.
Если позиция товара уже была в корзине, то данные модели обновляются, а количество увеличивается на $quantity

~~~
[php]
$book = Book::model()->findByPk(1);
Yii::app()->shoppingCart->put($book); //в корзине 1 позиция с id=1 в количестве 1 единица.
Yii::app()->shoppingCart->put($book,2); //в корзине 1 позиция с id=1 в количестве 3 единицы.
$book2 = Book::model()->findByPk(2);
Yii::app()->shoppingCart->put($book2); //в корзине 2 позиции с id=1 и id=2
~~~

### EShoppingCart::update($position, $quantity)
Обновляет в корзине позицию товара.
Если позиция товара уже была в корзине, то данные модели обновляются, а количество установится в $quantity.
Если позиции не было в корзине, то она добавляется в ней.
Если установлено $quantity<1, то позиция удаляется из корзины

~~~
[php]
$book = Book::model()->findByPk(1);
Yii::app()->shoppingCart->put($book); //в корзине 1 позиция с id=1 в количестве 1 единица.
Yii::app()->shoppingCart->update($book,2); //в корзине 1 позиция с id=1 в количестве 2 единицы.
~~~

### EShoppingCart::remove($key)
Удаляет позицию из корзины

~~~
[php]
$book = Book::model()->findByPk(1);
Yii::app()->shoppingCart->put($book,2); //в корзине 1 позиция с id=1 в количестве 2 единицы.
Yii::app()->shoppingCart->remove($book->getId()); //в корзине нет позиций
~~~

### EShoppingCart::clear()
Очищает корзину

~~~
[php]
Yii::app()->shoppingCart->clear();
~~~

### EShoppingCart::itemAt($key)
Возвращает позицию по ключу

~~~
[php]
$position = Yii::app()->shoppingCart->itemAt(1);
~~~

### EShoppingCart::contains($key)
Возвращает boolean: есть ли в корзине позиция с id=$key?

~~~
[php]
$position = Yii::app()->shoppingCart->itemAt();
~~~

### EShoppingCart::isEmpty()
Возвращает true, если корзина пустая.

~~~
[php]
$position = Yii::app()->shoppingCart->isEmpty(1);
~~~

### EShoppingCart::getCount()
Возвращает количество позиций
~~~
[php]
Yii::app()->shoppingCart->put($book,2);
Yii::app()->shoppingCart->put($book2,3);
Yii::app()->shoppingCart->getCount(); //2
~~~

### EShoppingCart::getItemsCount()
Возвращает количество товаров
~~~
[php]
Yii::app()->shoppingCart->put($book,2);
Yii::app()->shoppingCart->put($book2,3);
Yii::app()->shoppingCart->getItemsCount(); //5
~~~

### EShoppingCart::getCost($withDiscount)
Возвращает стоимость всей корзины
~~~
[php]
Yii::app()->shoppingCart->put($book,2); //price=100
Yii::app()->shoppingCart->put($book2,1); //price=200
Yii::app()->shoppingCart->getCost(); //400
~~~

### EShoppingCart::getPositions()
Возвращает массив позиций
~~~
[php]
$positions = Yii::app()->shoppingCart->getPositions();
foreach($positions as $position) {
...
}
~~~

### IECartPosition::getPrice()
Возвращает цену одной единицы позиции
~~~
[php]
$positions = Yii::app()->shoppingCart->getPositions();
foreach($positions as $position) {
$price = $position->getPrice();
}
~~~

### IECartPosition::getSumPrice($withDiscount)
Возвращает стоимость позиции = стоимость одной единицы*кол-во
~~~
[php]
$book = Book::model()->findByPk(1); //цена товара = 100
Yii::app()->shoppingCart->put($book,2); //положим 2 единицы товара
$positions = Yii::app()->shoppingCart->getPositions();
foreach($positions as $position) {
$price = $position->getSumPrice(); //200 (2*100)
}
~~~

### IECartPosition::getQuantity()
Возвращает кол-во единиц в позиции
~~~
[php]
$book = Book::model()->findByPk(1); //цена товара = 100
Yii::app()->shoppingCart->put($book,2); //положим 2 единицы товара
$positions = Yii::app()->shoppingCart->getPositions();
foreach($positions as $position) {
$price = $position->getQuantity(); //2
}
~~~

Система скидок
--------------
Для компонента корзины, реализована простая система скидок.

Система скидок позволяет применять к корзине набор правил для изменения стоимости как корзины в целом так и отдельных позиций.

Скидка - класс наследуемый от IEDiscount и реализующий метод apply.

В методе apply должен быть описан механизм применения скидки.

Применяется она путем вызова метода Position::addDiscountPrice/Position::setDiscountPrice у позиции,
либо EShoppingCart::addDiscountPrice/EShoppingCart::setDiscountPrice у корзины.
В метод передается значение на которое будет уменьшена стоимость(всей корзины или отдельной позиции соответственно).

Пример класса скидки:
~~~
[php]
class TestDiscount extends IEDiscount {
    /**
     * Скидка в %
     */
    public $rate = 30;

    public function apply() {
        foreach ($this->shoppingCart as $position) {
            $quantity = $position->getQuantity();
            if ($quantity > 1) {
                $discountPrice = $this->rate * $position->getPrice() / 100;
                $position->addDiscountPrice($discountPrice);
            }
        }
    }
}
~~~
Данная скидка делает следующее: если в корзину был добавлен товар в количестве больше 1, то к одной единице применяется скидка в $rate % , и на эту стоимость уменьшается суммарная стоимость позиции.

К корзине может быть применен не ограниченный набор скидок, которые будут вызываться по цепочке.

Список скидок должен быть описан в конфиге:
~~~
[php]
        'shoppingCart' =>
        array(
            'class' => 'ext.yiiext.components.shoppingCart.EShoppingCart',
            'discounts' =>
            array(
                array(
                    'class' => 'ext.yiiext.components.shoppingCart.discounts.TestDiscount',
                    'rate' => 40),
                array('class' => 'otherDiscount'),
            ),

        ),
~~~

События.
--------------
В ShoppingCart зарегистрированы 2 события.
Механизм событий реализован согласно API Yii.

1) onUpdatePosition - срабатывает при добавлении или обновлении позиции в корзину.

2) onRemovePosition - срабатывает при удалении позиции из корзины.

Пример использования:
~~~
[php]
$cN = new CallCenterNotifier();
Yii::app()->shoppingCart->attachEventHandler('onUpdatePosition',array($cN, 'updatePositionInShoppingCart'));

$book = Book::model()->findByPk(1);
Yii::app()->shoppingCart->put($book);
~~~
При срабатывание события onUpdatePosition, об этом будет оповещен call center.

CMap - работаем с корзиной, как с массивом.
-------------------------------------------

Класс ShoppingCart наследует CMap, это позволяет работать с корзиной как с массивом.

~~~
[php]
$book = Book::model()->findByPk(1);
Yii::app()->shoppingCart[] = $book; //добавляем в корзину позицию.

//обходим все позиции в корзине циклом.
foreach(Yii::app()->shoppingCart as $position)
{
...
}
~~~
