Shopping Cart
=============
Provides shpping cart functionality for models.

Cart is a container object that holds items collection and have handy methods to work with it.

It uses user session as a cart data storage.

Installing and configuring
--------------------------

### 1 way: Registration in the config file
Add to `protected/config/main.php`:

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
### 2 way: Registration by necessity

~~~
[php]
$cart = Yii::createComponent(array(
	'class' => 'ext.yiiext.components.shoppingCart.EShoppingCart'
));
//Important!
$cart->init();

$book = Book::model()->findByPk(1);
$cart->put($book);
~~~

Preparing a model
-----------------
Models that you are planning to put into the cart should implement `IECartPosition` interface:

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
Adds $quantity items to the cart.
If item is already in the cart, item data is being updated and item quantity is summed with $quantity.

~~~
[php]
$book = Book::model()->findByPk(1);
Yii::app()->shoppingCart->put($book); //1 item with id=1, quantity=1.
Yii::app()->shoppingCart->put($book,2); //1 item with id=1, quantity=3.
$book2 = Book::model()->findByPk(2);
Yii::app()->shoppingCart->put($book2); //2 items with id=1 and id=2.
~~~

### EShoppingCart::update($position, $quantity)
Updates cart item.
If item is already in the cart, item data is being updated and item quantity is set to $quantity.
If there is no such item yet it will be added.
If $quantity<1 then item will be deleted.

~~~
[php]
$book = Book::model()->findByPk(1);
Yii::app()->shoppingCart->put($book); //1 item with id=1, quantity=1.
Yii::app()->shoppingCart->update($book,2); //1 item with id=1, quantity=2.
~~~

### EShoppingCart::remove($key)
Removes item from the cart.

~~~
[php]
$book = Book::model()->findByPk(1);
Yii::app()->shoppingCart->put($book,2); //1 item with id=1, quantity=2.
Yii::app()->shoppingCart->remove($book->getId()); //no items
~~~

### EShoppingCart::clear()
Clears all cart items.

~~~
[php]
Yii::app()->shoppingCart->clear();
~~~

### EShoppingCart::itemAt($key)
Returns item at key $key.

~~~
[php]
$position = Yii::app()->shoppingCart->itemAt(1);
~~~

### EShoppingCart::contains($key)
Tells if cart contains item with id=$key.

~~~
[php]
$position = Yii::app()->shoppingCart->itemAt();
~~~

### EShoppingCart::isEmpty()
Tells if cart is empty.

~~~
[php]
$position = Yii::app()->shoppingCart->isEmpty(1);
~~~

### EShoppingCart::getCount()
Returns positions count.

~~~
[php]
Yii::app()->shoppingCart->put($book,2);
Yii::app()->shoppingCart->put($book2,3);
Yii::app()->shoppingCart->getCount(); //2
~~~

### EShoppingCart::getItemsCount()
Returns items count.

~~~
[php]
Yii::app()->shoppingCart->put($book,2);
Yii::app()->shoppingCart->put($book2,3);
Yii::app()->shoppingCart->getItemsCount(); //5
~~~

### EShoppingCart::getCost($withDiscount)
Returns cart total.

~~~
[php]
Yii::app()->shoppingCart->put($book,2); //price=100
Yii::app()->shoppingCart->put($book2,1); //price=200
Yii::app()->shoppingCart->getCost(); //400
~~~

### EShoppingCart::getPositions()
Returns an array with all positions.

~~~
[php]
$positions = Yii::app()->shoppingCart->getPositions();
foreach($positions as $position) {
...
}
~~~

### IECartPosition::getPrice()
Returns a price for a single item for this position.

~~~
[php]
$positions = Yii::app()->shoppingCart->getPositions();
foreach($positions as $position) {
$price = $position->getPrice();
}
~~~

### IECartPosition::getSumPrice($withDiscount)
Returns position price = single item price*items count

~~~
[php]
$book = Book::model()->findByPk(1); //price = 100
Yii::app()->shoppingCart->put($book,2); //putting 2 items
$positions = Yii::app()->shoppingCart->getPositions();
foreach($positions as $position) {
$price = $position->getSumPrice(); //200 (2*100)
}
~~~

### IECartPosition::getQuantity()
Returns position items quantity

~~~
[php]
$book = Book::model()->findByPk(1); //price = 100
Yii::app()->shoppingCart->put($book,2); //putting 2 items
$positions = Yii::app()->shoppingCart->getPositions();
foreach($positions as $position) {
$price = $position->getQuantity(); //2
}
~~~

Discounts
---------
There is a single discount system built in. It allows to apply a set of rules that
will change cart total or a single position price.

Discount is a class that implements IEDiscount and defines apply() method that describes
how exactly discount is applied.

Discount is calculated by applying Position::addDiscountPrice/Position::setDiscountPrice position's
method or EShoppingCart::addDiscountPrice/EShoppingCart::setDiscountPrice cart-wide method.
This methods are getting one parameter that holds a value of cart total reduction or individual position reduction.

Discount class example:

~~~
[php]
class TestDiscount extends IEDiscount {
    /**
     * % discount
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
This example dicount works like this:
if there is more than one item for a single position, there will be $rate % discount for
one item and it will be applied to position price.

You can apply unlimited discount rules that will be called one by one:

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

Events
------
There are 2 events in ShoppingCart implemented in a standard Yii way:

1) onUpdatePosition - is triggered when position is added or updated.

2) onRemovePosition - is triggered when position is deleted.

Usage:

~~~
[php]
$cN = new CallCenterNotifier();
Yii::app()->shoppingCart->attachEventHandler('onUpdatePosition',array($cN, 'updatePositionInShoppingCart'));

$book = Book::model()->findByPk(1);
Yii::app()->shoppingCart->put($book);
~~~
When onUpdatePosition event is fired, call center will be notified.

Working with a cart as CMap
---------------------------

ShoppingCart is a child of CMap so you can work with the cart as an array.

~~~
[php]
$book = Book::model()->findByPk(1);
Yii::app()->shoppingCart[] = $book; //adding new position.

//iterating over all positions
foreach(Yii::app()->shoppingCart as $position)
{
...
}
~~~
