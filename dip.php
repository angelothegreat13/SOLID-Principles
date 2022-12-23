<?php
/*
    Dependency Inversion Principle(DIP)
        - states that high level modules should not depend no low level modules; both should depend on abstractions.
          Abstractions should not depend on details. Details should depend upon abstractions.

	1. What are higher level modules
	2. What are lower level modules
	3. What are the abstraction and how do we depend on them? 

  	Higher Level
    	- depends on abstraction via dependency injected parameter to function

  	Lower Level
    	- depends on abstraction via "implements" keyword

	Interface (AKA Abstraction)

	Service Container (AKA Dependency Injection Container)
		- solution for class injected dependency has dependency
		- auto wiring uses reflection
*/

/*
	Dependency inversion is a software design principle that states that high-level modules should not depend on low-level modules, 
	but rather both should depend on abstractions. This means that the design of a system should aim to minimize the coupling between components, 
	and that the dependencies between components should flow in the direction of abstractions, rather than concrete implementations.

	One way to achieve dependency inversion in PHP is to use dependency injection. 
	This involves injecting the dependencies of a class into the class via its constructor or setter methods, 
	rather than having the class create or retrieve the dependencies itself.

	Here's an example of dependency inversion in PHP using dependency injection:
*/

// This is the high-level module, which depends on an abstraction (i.e. an interface)
// rather than a concrete implementation.
class UserService
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function register(string $username, string $password)
    {
        // Do some work to register the user.
        // If there's an error, we can log it using the logger object.
        try {
            // Register the user.
        } catch (Exception $e) {
            $this->logger->error($e->getMessage());
        }
    }
}

// This is the low-level module, which implements the abstraction (i.e. the interface).
class FileLogger implements LoggerInterface
{
    public function error(string $message)
    {
        // Write the error message to a log file.
    }
}

// Now, we can use the UserService and inject a FileLogger into it.
$logger = new FileLogger();
$userService = new UserService($logger);
$userService->register('john.doe', 'password123');


/*
	In this example, the UserService class is the high-level module, and the FileLogger class is the low-level module. 
	The UserService class depends on the LoggerInterface abstraction, rather than on a concrete implementation of a logger. 
	The FileLogger class is then injected into the UserService class via the constructor, satisfying the dependency. 
	This allows the UserService class to be more flexible and easier to test, as it can be used with different implementations 
	of the LoggerInterface without having to change its code.
*/