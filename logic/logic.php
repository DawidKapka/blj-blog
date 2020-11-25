<?php //posts & comments database
$dbuser = 'root';
$dbpassword = '';

$pdo = new PDO('mysql:host=localhost;dbname=blog', $dbuser, $dbpassword, [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
]);

if (isNameCorrect($name) === true && isMessageCorrect($message) === true) {
    $pdo->query("INSERT INTO `posts` (created_by, created_at, post_message, image_url) VALUES ('$name', '$date', '$message', '$image')");
}

$statements = $pdo->query('SELECT * FROM `posts` ORDER BY `created_at` DESC');

/*
if (isCommentNameCorrect($comment_name) === true && isCommentCorrect($comment) === true) {
    $pdo->query("INSERT INTO `comments` (fk_post_id, created_by, created_at, comment_text) VALUES (FOREIGN KEY [fk_post_id] ($id), '$comment_name', '$date', '$comment')");
}
*/

if (isUsernameCorrect($name) === true && isEmailCorrect($email) === true && isPasswordCorrect($password) === true && isRepeatedPasswordCorrect($password, $password_repeat) === true) {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $pdo->query("INSERT INTO `users` (username, email, user_password) VALUES ('$name', '$email', '$password')");
} 

?>
<?php //blog links database
$dbuser = 'd041e_listuder';
$dbpassword = '12345_Db!!!';

$pdo = new PDO('mysql:host=mysql2.webland.ch;dbname=d041e_listuder', $dbuser, $dbpassword, [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
]);

$sqlQuerry = $pdo->query("SELECT * FROM `blog_url`");
?>