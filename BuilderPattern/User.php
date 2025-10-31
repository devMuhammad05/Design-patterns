<?php


class User
{
    public string $firstName;
    public string $lastName;
    public int $age;
    public string $email;
    public ?string $role;


    public function showInfo(): void
    {
        echo "{$this->firstName} {$this->lastName}, {$this->age} years old, {$this->role}";
    }
}

class UserBuilder 
{
    private User $user;

    public function __construct() 
    {
        $this->user = new User();
    }

    public function setFirstName(string $firstName): self 
    {
        $this->user->firstName = $firstName;
        return $this;
    }

    public function setLastName(string $lastName): self 
    {
        $this->user->lastName = $lastName;
        return $this;
    }

    public function setAge(int $age): self 
    {
        $this->user->age = $age;
        return $this;
    }

    public function setEmail(string $email): self 
    {
        $this->user->email = $email;
        return $this;
    }

    public function setRole(?string $role): self 
    {
        $this->user->role = $role;
        return $this;
    }

    public function build(): User
    {
        return $this->user;
    }

}


$user = (new UserBuilder())
            ->setFirstName("Muhammad")
            ->setLastName("Yahaya")
            ->setEmail("y.adeleke05@gmail.com")
            ->setAge(10)
            ->setRole('Backend Developer')
            ->build();

$user->showInfo();