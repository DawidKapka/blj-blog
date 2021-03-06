<?php
function validateInput($name, $message) { 
    if (isNameCorrect($name) === false || isMessageCorrect($message) === false) { 
        echo '<div class=error-box><ul>';
    
        if (isNameCorrect($name) === false) {
            echo '<li class="error">Enter a valid Name!</li>';
        }
        if (isMessageCorrect($message) === false) {
            echo '<li class="error">The Message cannot be empty!</li>';
        }
        echo '</ul></div>';
    } 
}
function validateComment($comment_name, $comment) { 
    if (isCommentCorrect($comment) === false) { 
        echo '<div class=error-box><ul>';
        if (isCommentCorrect($comment) === false) {
            echo '<li class="error">The Comment cannot be empty!</li>';
        }
        echo '</ul></div>';
    } 
}

function validateRegister($name, $email, $password, $password_repeat) {
    if (isUsernameCorrect($name) === false || isEmailCorrect($email) === false || isPasswordCorrect($password) === false || isRepeatedPasswordCorrect($password, $password_repeat) !== false) { 
        echo '<div class=error-box><ul>';
    
        if (isUsernameCorrect($name) === false) {
            echo '<li class="error">Enter a valid Name!</li>';
        }
        if (isEmailCorrect($email) === false) {
            echo '<li class="error">Enter a valid Email-Address!</li>';
        }
        if (isPasswordCorrect($password) === false) {
            echo '<li class="error">Enter a valid Password! (min. 8 characters)</li>';
        }
        if (isRepeatedPasswordCorrect($password, $password_repeat) === false) {
            echo '<li class="error">Passwords do not match!</li>';
        }
        echo '</ul></div>';
    } else {
        echo '<p class="success">Registration successful!</p>';
    }
}
function validateName($name) {
    if (isNameCorrect($name) === false) { 
        echo '<div class=error-box><ul>';
            echo '<li class="error">Enter a valid Name!</li>';
        echo '</ul></div>';
    }
}
function validateEmail($email) {
    if (isEmailCorrect($email) === false) { 
        echo '<div class=error-box><ul>';
            echo '<li class="error">Enter a valid Email!</li>';
        echo '</ul></div>';
    }
}
function validatePassword($password) {
    if (isPasswordCorrect($password) === false) {
        echo '<div class=error-box><ul>';
            echo '<li class="error">Password is too short! (min. 8 characters)</li>';
        echo '</ul></div>';
    }
}
?>
