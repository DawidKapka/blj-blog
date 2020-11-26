<?php
$name_register = $_POST["name"] ?? '';
$email = $_POST["email"] ?? '';
$password = $_POST["password"] ?? '';
$password_repeat = $_POST["password-repeat"] ?? 'a';

function isUsernameCorrect($name_register) {
    if (!empty($name_register) && !is_numeric($name_register)) {
        return true;
    } else {
        return false;
    }
}
function isEmailCorrect($email) {
    if (!empty($email)) {
        return true;
    } else {
        return false;
    }
}
function isPasswordCorrect($password) {
    if (!empty($password) && strlen($password) >= 8) {
        return true;
    } else {
        return false;
    }
}
function isRepeatedPasswordCorrect($password, $password_repeat) {
    if ($password === $password_repeat) {
        return true;
    } else {
        return false;
    }
}
?>