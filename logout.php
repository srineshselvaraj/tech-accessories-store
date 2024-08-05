<!-- 
    Srinesh Selvaraj
    4/19/2024
    IT202-002
    IT-202 Phase 5 Assignment: Read SQL Data with PHP and JavaScript
    ss4872@njit.edu
-->
<?php
    session_start();
    $_SESSION = [];
    session_destroy();
    $login_message = 'You have been logged out.';
    include('login.php');
?>