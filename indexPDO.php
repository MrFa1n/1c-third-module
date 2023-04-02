<?php
$username = 'root';
$pass = 'root';

$connectionPDO = new PDO('mysql:host=localhost;dbname=1c-third;', $username, $pass);
if ($connectionPDO) die('Error');


// $query = "delete from users where name='Ivan'";
// $request = $connectionPDO->exec($query);
// print("Запросов было выполнено" . $request);


$name = 'Ilya';
$age = 45;
$login = 'GG';
$pass = '102938';

$arraUser = [
    'Name' => $name,
    'Age' => $age,
    'Login' => $login,
    'Password' => $pass
];

$sqlquery = "insert users (`name`, `age`, `login`, `pass`) value (:Name, :Age, :Login, :Password)";
// insert users(`name`, `age`, `login`, `pass`) value ('test', 10, 'login', '123123');
$request = $connectionPDO->prepare($sqlquery);
$request->execute($arraUser);
