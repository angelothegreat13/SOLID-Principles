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