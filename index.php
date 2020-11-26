<?php
    $page = $_GET['page'] ?? 'home';
    if ($page === 'home') {
        header('Location: views/home.php');
    }
?>