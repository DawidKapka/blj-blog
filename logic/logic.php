<?php //posts & comments database
$dbuser = 'root';
$dbpassword = '';

$pdo = new PDO('mysql:host=localhost;dbname=blog', $dbuser, $dbpassword, [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
]);

//save post 
if (isNameCorrect($name) === true && isMessageCorrect($message) === true) {
    $pdo->query("INSERT INTO `posts` (created_by, created_at, post_message, image_url) VALUES ('$name', '$date', '$message', '$image')");
}

//load all posts
$statements = $pdo->query('SELECT * FROM `posts` ORDER BY `created_at` DESC');

/*
if (isCommentNameCorrect($comment_name) === true && isCommentCorrect($comment) === true) {
    $pdo->query("INSERT INTO `comments` (fk_post_id, created_by, created_at, comment_text) VALUES (FOREIGN KEY [fk_post_id] ($id), '$comment_name', '$date', '$comment')");
}
*/

//save registered user Info
if (isset($_POST["register-box"])) {
    if (isUsernameCorrect($name) === true && isEmailCorrect($email) === true && isPasswordCorrect($password) === true && isRepeatedPasswordCorrect($password, $password_repeat) === true) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $pdo->query("INSERT INTO `users` (username, email, user_password) VALUES ('$name', '$email', '$password')");
    } 
}


//get user info on login
if (isset($_POST["login-box"])) {
        echo $password;
        $password_hash = $pdo->prepare("SELECT * FROM `users` WHERE username = :username");
        $password_hash->execute([':username' => $name]);
        foreach ($password_hash->fetchAll() as $x) {
            echo $x[3];
        }
}

?>
<?php //blog links database
$dbuser2 = 'd041e_listuder';
$dbpassword2 = '12345_Db!!!';

$pdo2 = new PDO('mysql:host=mysql2.webland.ch;dbname=d041e_listuder', $dbuser2, $dbpassword2, [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
]);

$sqlQuerry = $pdo2->query("SELECT * FROM `blog_url`");
?>