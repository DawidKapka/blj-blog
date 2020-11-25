<?php
$comment_name = $_POST["comment-name"] ?? '';
$comment = $_POST["comment"] ?? '';
$comment_date = date('d.m.y H:i:s');

function isCommentNameCorrect($comment_name) {
    if (!empty($comment_name) && !is_numeric($comment_name)) {
        return true;
    } else {
        return false;
    }
}
function isCommentCorrect($comment) {
    if (!empty($comment)) {
        return true;
    } else {
        return false;
    }
}
?>