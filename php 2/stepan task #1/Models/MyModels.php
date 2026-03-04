<?php 

declare(strict_types = 1);

class Person
{
    private string $firstName;
    private string $lastName;

    public function __construct(string $firstName, string $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getFullName(): string
    {
        return $this->firstName . ' ' . $this->lastName;
    }
}

class User{
    
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

class Expert
{
    private Person $person;
    private User $user;

    public function __construct(Person $person, User $user)
    {
        $this->person = $person;
        $this->user = $user;

        $this->syncFromPerson();
    }

    public function getFullName(): string
    {
        return $this->person->getFullName();
    }

    public function changePersonName(string $firstName, string $lastName): void
    {
        $this->person->setFirstName($firstName);
        $this->person->setLastName($lastName);

        $this->syncFromPerson();
    }

    public function changeUserName(string $fullName): void
    {
        $this->user->setFullName($fullName);

        $this->syncFromUser();
    }

    private function syncFromPerson(): void
    {
        $this->user->setFullName($this->person->getFullName());
    }

    private function syncFromUser(): void
    {
        $parts = explode(' ', $this->user->getFullName());

        $this->person->setFirstName($parts[0] ?? '');
        $this->person->setLastName($parts[1] ?? '');
    }
}




