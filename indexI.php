<?php

require_once 'setting.php';

$connction = new mysqli($host, $user, $pass, $data);

if ($connction->connect_error) die('Error');

$query = "select * from users";
$result = $connction->query($query);

if (!$result) die('Error result');

$row = $result->num_rows;

for ($i = 0; $i < $row; $i++) {
    $result->data_seek($i);
    echo 'Номер пользователя' . $result->fetch_assoc()['id'] . ' ';
    $result->data_seek($i);
    echo 'Имя: ' . $result->fetch_assoc()['name'] . '<br>';
}

$result->close();
$connction->close();

// echo '<pre>';
// print_r($result);
// echo '</pre>';
