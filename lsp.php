<?php 
/* 
    Liskov Substitution Principle (LSP)
        - is a principle in object-oriented programming that states that objects of a superclass should be able 
            to be replaced with objects of a subclass without affecting the correctness of the program. 
            In other words, if a program is designed to work with a superclass, it should also work with any of its subclasses.

        Five Simple Rules
            1. Child function arguments must match function arguments of parent
            2. Child function return return type must match praent function return type
            3. Child pre-conditions cannot be greater than parent function pre-conditions
            4. Child function post-conditions cannot be lesser than parent function post-conditions
            5. Exceptions thrown by child method must be the same as or inherit from an exception 
                thrown by the parent method.
*/


/*
    - In this example 
        1.) we enforced the $id type to be int to match the parent id type.
        2.) we set the return type of subclass(child) to :void in order to match the return type of superclass(parent)
*/
class ParentClass {
    public $id;

    public function setId(int $id) : void
    {
        $this->id = $id;
    }
}

class ChildClass extends ParentClass {
    public $id;
    
    // string $id - violates the LSP rule 1 (Child function arguments must match function arguments of parent (this includes the type))
    public function setId(int $id) : void
    {
        $this->id = $id;
        
        // return $id; - violates the LSP rule 2 (Child function return return type must match parent function return type )
    }
}