<?php 
/*
    Interface Segration Principle

    interface = contacts
    segration = divide or split up
    Interface Segration 
        - "No client(class) should be forced to depend on methods it doesn't use"
        - "No class should be forced to implement an interface that contractually binds that class to have a method it will never use"
*/

interface File {
    public function parse();
    // public function htmlContent(); violates isp , so we need to segrate the interface
}

// interfaces are contracts that force classes to depend on a given method or methods
interface Html {
    public function htmlContent();
}

class Json implements File 
{
    public function parse()
    {

    }
}