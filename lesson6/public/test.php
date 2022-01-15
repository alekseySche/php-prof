<?php

class Rectangle{
    protected $a;
    protected $b;

    public function getA()
    {
        return $this->a;
    }

    public function setA($a)
    {
        $this->a = $a;
    }

    public function getB()
    {
        return $this->b;
    }

    public function setB($b)
    {
        $this->b = $b;
    }
}

class Square{
    public function setA($a)
    {
        $this->a = $a;
        $this->b = $a;
    }

    public function setB($b)
    {
        $this->b = $b;
        $this->a = $b;
    }

}

function foo(Rectangle $r){
    return $r->getA() * $r->getB();
}


$figure = new Square();
$figure->setA(5);
$figure->setB(4);
echo foo($figure);