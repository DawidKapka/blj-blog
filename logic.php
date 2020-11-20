<?php
$user = 'root';
$password = '';

$pdo = new PDO('mysql:host=localhost;dbname=blog', $user, $password, [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
]);

if (isNameCorrect($name) === true && isMessageCorrect($message) === true) {
    $pdo->query("INSERT INTO posts (created_by, created_at, post_message) VALUES ('$name', '$date', '$message')");
}

?>