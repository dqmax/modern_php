<?php 

require __DIR__ . '/MyModels.php';

$person = new Person('Maxim', 'Diacicovschi');
$user = new User('Nickname');

$expert = new Expert($person, $user);

echo $expert->getFullName();

$expert->changePersonName('Max', 'Ivanov');

echo $expert->getFullName();  

$expert->changeUserName('Alice Brown');

echo $person->getFullName();