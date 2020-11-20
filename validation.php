<?php
$name = $_POST["name"] ?? '';
$message = $_POST["blog-input"] ?? '';
$date = date('d.m.y H:i:s');
$image = $_POST['img'] ?? '';
function isNameCorrect($name) {
    if (!empty($name) && !is_numeric($name)) {
        return true;
    } else {
        return false;
    }
}
function isMessageCorrect($message) {
    if (!empty($message)) {
        return true;
    } else {
        return false;
    }
}
?>