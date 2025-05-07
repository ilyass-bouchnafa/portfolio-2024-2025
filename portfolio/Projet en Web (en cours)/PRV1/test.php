<?php 
    session_start(); 

    if (isset($_SESSION['user']) && isset($_SESSION['user_id'])) {
        $userIdSession = $_SESSION['user_id'];
        if (!isset($_GET['id']) || $_GET['id'] != $userIdSession) {
            header("Location: test.php?id=" . $userIdSession);
            exit();
        }
    }
?>

