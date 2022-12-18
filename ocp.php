<?php 

/*
    Open-Closed Principle
        - is a software design principle that states that classes should be open for extension but closed for modification. 
            In other words, a class should be designed in a way that allows new behavior to be added through inheritance or composition, 
            without modifying the existing code in the class.
        - a class should be open for extension but closed to modification.
        - When you have a class or method you want to extend without modifying it, seperate the extensible behavior behind an interface, 
            and then flip the dependencies.
*/


/* 
// Incorrect Implementation
class Square {
    public $side;

    public function __construct($side)
    {
        $this->side = $side;
    }
}

class Circle {
    public $radius;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }
}

class Triangle {
    public $base;
    public $height;

    public function __construct($base, $height)
    {
        $this->base = $base;
        $this->height = $height;
    }
}

class AreaCalculator {

    public function calculate($shapes)
    {
        $totalArea = [];
        
        foreach ($shapes as $shape) 
        {
            if (is_a($shape, 'Square')) {
                $totalArea[] = $shape->side * $shape->side;
            }
            else if (is_a($shape, 'Circle')) {
                $totalArea[] = pi() * ($shape->radius * $shape->radius);
            }
            else if (is_a($shape, 'Triangle')) {
                $totalArea[] = ($shape->height * $shape->base) / 2;
            }
        }

        return array_sum($totalArea);
    }
}

$shapes = [];
$shapes[] = new Square(10);
$areaCalculator = new AreaCalculator;
echo $areaCalculator->calculate($shapes);

*/

interface Shape {
    public function getArea();
}

class Square implements Shape {
    protected $side;

    public function __construct($side)
    {
        $this->side = $side;
    }

    public function getArea()
    {
        return $this->side * $this->side;
    }
}

class Circle implements Shape {
    protected $radius;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    public function getArea()
    {
        return pi() * ($this->radius * $this->radius);
    }
}

class Triangle implements Shape {
    protected $base;
    protected $height;
    
    public function __construct($base, $height)
    {
        $this->base = $base;
        $this->height = $height;
    }

    public function getArea()
    {
        return ($this->base * $this->height) / 2;
    }
}

class AreaCalculator {

    public function calculate($shapes)
    {
        $totalArea = [];

        foreach ($shapes as $shape) {
            $totalArea[] = $shape->getArea();
        }

        return array_sum($totalArea);
    }
}

$shapes = [];
$shapes[] = new Circle(8);
$shapes[] = new Square(10);
$shapes[] = new Triangle(5,15);
$areaCalculator = new AreaCalculator;
echo $areaCalculator->calculate($shapes);