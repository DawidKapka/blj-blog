<?php //posts & comments database
$user = 'root';
$password = '';

$pdo = new PDO('mysql:host=localhost;dbname=blog', $user, $password, [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
]);

if (isNameCorrect($name) === true && isMessageCorrect($message) === true) {
    $pdo->query("INSERT INTO posts (created_by, created_at, post_message, image_url) VALUES ('$name', '$date', '$message', '$image')");
}

$statements = $pdo->query('SELECT * FROM `posts` ORDER BY `created_at` DESC');

?>
<?php //blog links database
$user = 'd041e_listuder';
$password = '12345_Db!!!';

$pdo = new PDO('mysql:host=mysql2.webland.ch;dbname=d041e_listuder', $user, $password, [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
]);

$sqlQuerry = $pdo->query("SELECT * FROM `blog_url`");
?>