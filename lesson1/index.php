<?php
header("Content-type:text/html; charset:utf-8");
class Product {
    /**
     * Конструктор класса. Выполняется в тот момент, когда мы создаем новый экземпляр.
     * @param int $id - id продукта.
     * @param string $title - Название.
     * @param string $description - Описание.
     * @param int $price - Цена.
     */
    public function __construct($id = null, $title = null, $description = null, $price = null) {
        $this -> id = $id;
        $this -> title = $title;
        $this -> description = $description;
        $this -> price = $price;
    }

    /**
     * Функция выводит на экран данные о продукте.
     */
    public function display() {
        echo $this -> prepareTitle() . $this -> prepareDescription() . $this -> preparePrice();
    }

    /**
     * Функция подготавливает название для вывода на экран.
     * @return string - Возвращает строку с данными.
     */
    private function prepareTitle() {
        return "Название: {$this -> title}<br>";
    }

    /**
     * Функция подготавливает описание для вывода на экран.
     * @return string - Возвращает строку с данными.
     */
    private function prepareDescription() {
        return "Описание: {$this -> description}<br>";
    }

    /**
     * Функция подготавливает цену для вывода на экран.
     * @return string - Возвращает строку с данными.
     */
    private function preparePrice() {
        return "Стоимость: {$this -> price}<br>";
    }
}

//Создаем новый экземпляр класса.
$product1 = new Product(1, 'Чайник', 'Очень удобный чайник', 100);
//Вызываем метод "display" для вывода данных на экран.
$product1 -> display();


//Описываем класс "Одежда", который наследуется от класса "Продукт".
class Clothes extends Product {
    /**
     * Конструктор класса. Выполняется в тот момент, когда мы создаем новый экземпляр.
     * @param int $id - id продукта.
     * @param string $title - Название.
     * @param string $description - Описание.
     * @param int $price - Цена.
     * @param string $size - Размер.
     */
    public function __construct($id = null, $title = null, $description = null, $price = null, $size)
    {
        //Наследуем родительский конструктор.
        parent::__construct($id, $title, $description, $price);
        //Переопределяем его.
        $this -> size = $size;
    }

    /**
     * Функция выводит на экран данные о продукте.
     */
    public function display() {
        //Наследуем родительский метод.
        parent::display();
        //Переопределяем его.
        echo $this -> prepareSize();
    }

    /**
     * Функция подготавливает размер для вывода на экран.
     * @return string - Возвращает строку с данными.
     */
    private function prepareSize() {
        return "Размер: {$this -> size}<br>";
    }
}

//Создаем новый экземпляр класса.
$product2 = new Clothes(2, 'Футболка', 'Самая стильная футболка', '20', 'XL');
//Вызываем метод "display" для вывода данных на экран.
$product2 -> display();



//5. Дан код. Что он выведет на каждом шаге? Почему?
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
$a1 = new A();//Ничего. Т.к. мы не вызывем никакой метод.
$a2 = new A();//Тоже самое.
$a1->foo();//1. Увеличит на 1(преинкремент) и выведет значение на экран.
$a2->foo();//2. Метод статический, поэтому для всех экземпляров класса один.
$a1->foo();//3, по той же причине.
$a2->foo();//4.

//6. Немного изменим п.5. Объясните результаты в этом случае.
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A();//Ничего, т.к. просто создаем экземпляр без вызова метода.
$b1 = new B();//Тоже самое.
$a1->foo();//1. Увеличит на 1(преинкремент) и выведет значение на экран.
$b1->foo();//1. Мы унаследовали класс B от класса A. Соответственно при создании экземпляра будет
           //использоваться метод и статическая переменная класса B.
$a1->foo();//2. Метод статический, поэтому для всех экземпляров класса А он один.
$b1->foo();//2. Такой же метод, для объектов класса B.


//7. *Дан код. Что он выведет на каждом шаге? Почему?
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A;//Ничего. Результат аналогичен предыдущему примеру. Т.к. у нас нет конструктора и не нужно передавать
            //параметры, допускается создание нового экземпляра без "()".
$b1 = new B;//Ничего.
$a1->foo();//1 -=-.
$b1->foo();//1 -=-.
$a1->foo();//2 -=-.
$b1->foo();//2 -=-.