<?php
$name = $GLOBALS['name'][1] ?? '';
$message = $_POST["blog-input"]?? '';
$date = date('y.m.d H:i:s');
$GLOBALS['date'] = $date;
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