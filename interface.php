<?php 
/*  
    Interface - contracts
*/

interface Shape {
    public function draw();
    public function color();
}

class Circle implements Shape {
    public function draw() {
        echo 'draw circle';
    }

    public function color() {
        echo 'color blue';
    }
}

class Square implements Shape {
    public function draw() {
        echo 'draw square';
    }

    public function color() {
        echo 'color green';
    }
}

class Line implements Shape {
    public function draw() {
        echo 'draw line';
    }

    public function color() {
        echo 'color black';
    }
}

class Painter {
    public function addShape(Shape $shape)
    {
        return $shape->draw();
    }
}

// $shape = new Line;
$shape = new Circle;
$artist = new Painter;
$artist->addShape($shape);