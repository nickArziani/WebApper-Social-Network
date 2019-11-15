<?php
$dsn = 'mysql:dbname=webupper_invite;host=localhost';
$user = 'webupper_invite';
$password = 'webupper_invite';

try {
    $dbh = new PDO($dsn, $user, $password);
$dbh->exec("set names utf8");
} catch (PDOException $e) {
    echo 'Подключение не удалось: ' . $e->getMessage();
}

?>