<?php 

/*
    Single Responsibility Principle
        - is a software design pattern that states that a class should have only one responsibility,
            or one reason to change. In other words, a class should have a single, well-defined purpose, 
            and all its methods and properties should be related to that purpose.
        - a class should have one, and only one responsibility.
        - a class should be responsible for a single task.
        - a class should only depend on one part of the business.
*/

class User {
    private $name;
    private $email;

    public function __construct($name, $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    // public function formatToJson()
    // {
    //     return json_encode([
    //         'name' => $this->name,
    //         'email' => $this->email
    //     ]);
    // }

    // public function validate($data)
    // {
    //     $errors = [];

    //     if (!isset($data['name'])) {
    //         $errors[] = 'User requires a name.';
    //     }
    //     if (!isset($data['email'])) {
    //         $errors[] = 'User requires an email address.';
    //     }

    //     return $errors;
    // }
}

class JsonFormatter {

    public static function format($data)
    {
        return json_encode($data, JSON_PRETTY_PRINT);
    }
}

class UserRequest {
    protected static $errors = [];

    public static function validate($data)
    {
        if (empty($data['name'])) {
            self::$errors[] = 'User requires a name';
        }

        if (empty($data['email'])) {
            self::$errors[] = 'User requires an email';
        }

        return self::$errors;
    }
}

$name = 'Juan Dela Cruz';
$email = 'juandc@gmail.com';
$user = new User($name, $email);

// echo $user->getName();
// $user->setName('Pedro Gamboa');
// echo $user->getName();

$data = [
    'name' =>  $email,
    'email' => $email
];

$json = JsonFormatter::format($data);
echo $json;

$validate = UserRequest::validate($data);
print_r($validate);


/*
In this example we seperate the formatToJson() and validate() method from User class 
because these two methods are no longer covered by the responsility of the class, 
User class should have only one responsibility which is to manage the data for a user.

In order to fix the issue, I made two classes that each had their own responsibility
    - JsonFormatter Class - its main responsibility is to format the data from array to json.
    - UserRequest Class - its main responsibility is to validate request from user.
*/