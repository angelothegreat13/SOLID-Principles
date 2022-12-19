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
Rule 1 & 2
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

// pre-conditions and post-conditions example
function addFive($number)
{   
    // pre-conditions - is a condition that happens before we execute a functionality
    if (!is_integer($number)) {
        throw new \Exception;
    }

    $total = $number + 5;

    // post-conditions - is what happens after we done executing that functionality
    if (!is_integer($total)) {
        throw new \Exception;
    }

    return $total;
}

// refactor version of pre-condtions and post-conditions
function addTen(int $number) : int
{
    $total = $number + 10;

    return $total;
}

// incorrect way of rule no 3.) Child pre-conditions cannot be greater than parent function pre-conditions
/*
class File {
    public function parse($file)
    {
        // parse file 
    }
}

class Json extends File {
    public function parse($file)
    {
        if (pathinfo($file, PATHINFO_EXTENSION) !== 'json') { // violates rule no 3
            throw new \Exception;
        }

        // parse json file
    }
}
*/

// Rule 3,4,5
// 3. Child pre-conditions cannot be greater than parent function pre-conditions
// 4. Child function post-conditions cannot be lesser than parent function post-conditions
// 5. Exceptions thrown by child method must be the same as or inherit from an exception thrown by the parent method.
// correct way of rule 3 
interface File {
    public function __construct(string $file);
    public function parse() : void; // to prevent violating the rule 4
}

class JsonFile implements File 
{
    public $file;

    public function __construct(string $file)
    {
        $this->file = $file;
    }
    
    public function parse() : void
    {
        // parse to json file
        // return json_encode($this->file);
    }
}

class HtmlFile implements File 
{
    public $file;

    public function __construct(string $file)
    {
        $this->file = $file;
    }
    
    public function parse() : void
    {
        $content = true;
        
        // if ($content) return true; // violates rule 4 . (Child function post-conditions cannot be lesser than parent function post-conditions)
        // if (!$content) throw new \Exception; // violates rule 5. (Exceptions thrown by child method must be the same as or inherit from an exception thrown by the parent method.)
        // parse to html file
        // return loadHTML($this->file);
    }
}

function read_from(File $file)
{
    $content = $file->parse();
    
    // if (is_array($content)) { // violates rule 4 also
    //     // code
    // }
}

/*
Child pre-conditions cannot be greater than parent function pre-conditions
    - In this example 
        - we removed the child pre-conditions because it is greater than parent pre-conditions which violates the rule 3 of LSP.
        - in order to solve this issue I created an interface with parse method to make sure child pre-conditions will not be greater than parent.
*/

// RULE 4
