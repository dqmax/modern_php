<?php 

declare(strict_types = 1);

class Person{
    private string $firstName;
    private string $lastName;

    public function __construct($firstName, $lastName){}

    public function getfirstName(): string{
        return $this->firstName;
    }

    public function getlastName(): string{
        return $this->lastName;
    }

    public function setfirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function setlastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getFullName(): string
    {
        return $this->firstName . ' ' . $this->lastName;
    }
}

class User{
    // sync User & Person 
    
    private string $fullName;

    public function __construct(string $fullName)
    {
        $this->fullName = $fullName;
    }

    public function getFullName(): string
    {
        return $this->fullName;
    }

    public function setFullName(string $fullName): void
    {
        $this->fullName = $fullName;
    }

}

class Expert{
    // all works through Expert 
    
    public function getFullName(Person $fullname){}
}


