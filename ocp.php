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


// Incorrect Implementation
class Square {
    public $height;
    public $width;

}

class Circle {
    public $radius;
}

class Triangle {
    public $base;
    public $height;
}

class AreaCalculator {

    public function calculate($shapes)
    {
        $area = [];
        
        foreach ($shapes as $shape) 
        {
            if (is_a($shape, 'Square')) {
                $area[] = $shape->width * $shape->height;
            }
            else if (is_a($shape, 'Circle')) {
                $area[] = pi() * ($shape->radius * $shape->radius);
            }
            else if (is_a($shape, 'Triangle')) {
                $area[] = ($shape->height * $shape->base) / 2;
            }
        }

        return array_sum($area);
    }
}