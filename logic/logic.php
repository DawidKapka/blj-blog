<?php
    if (!isset($_SESSION)) {
        session_start();
    }

//posts & comments database
$dbuser = 'd041e_dakapka';
$dbpassword = '12345_Db!!!';

$pdo = new PDO('mysql:host=mysql2.webland.ch;dbname=d041e_dakapka', $dbuser, $dbpassword, [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
]);

//save post 
if (isNameCorrect($name) === true && isMessageCorrect($message) === true) {
    $stmt = $pdo->prepare("INSERT INTO `posts` (created_by, post_message, image_url) VALUES (:username, :post_message, :post_image)");
    $stmt->execute([':username' => $name[1], ':post_message' => $message, ':post_image' => $image]);
}

//load all posts
$statements = $pdo->query('SELECT * FROM `posts` ORDER BY `created_at` DESC');

//save registered user Info
if (isset($_POST["register-box"])) {
    if (isUsernameCorrect($name_register) === true && isEmailCorrect($email) === true && isPasswordCorrect($password) === true && isRepeatedPasswordCorrect($password, $password_repeat) === true) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $register = $pdo->prepare("INSERT INTO `users` (username, email, user_password) VALUES (:username, :email, :user_password)");
        $register->execute([':username' => $name_register, ':email' => $email, ':user_password' => $password]);
    } 
}
//get user info on login
if (isset($_POST["login-box"])) {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $credentials = $pdo->prepare("SELECT * FROM `users` WHERE username = :username OR email = :username AND user_password = :user_password");
        $credentials->execute([':username' => $name_register, ':user_password' => $password_hash]);
        $login = false;
        foreach ($credentials->fetchAll() as $credential) {
            if ($name_register === $credential[1] && password_verify($password, $credential[3]) === true) {
                $login = true;
            } elseif ($name_register === $credential[2] && password_verify($credential[3], $password_hash) === true) {
                $login = true;
            }
        }
        if ($login === true) {
            $_SESSION['userid'] = $credential[0];

        }
}

//get username
if (isset($_SESSION['userid'])) {
    $username_db = $pdo->prepare("SELECT * FROM `users` WHERE id_user = :id_session");
    $username_db->execute([':id_session' => $_SESSION['userid']]);
    foreach ($username_db->fetchAll() as $login_username) {
        $GLOBALS['name'] = $login_username;
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