<!-- 
    Srinesh Selvaraj
    4/19/2024
    IT202-002
    IT-202 Phase 5 Assignment: Read SQL Data with PHP and JavaScript
    ss4872@njit.edu
-->
<?php
    function getDatabase(){
        $dsn = 'mysql:host=sql1.njit.edu;port=3306;dbname=ss4872';
        $username = 'ss4872';
        $password = 'Sricomputer1$';

        try{
            $db = new PDO($dsn, $username, $password);
        } catch(PDOException $ex) {
            $error_message = $ex->getMessage();
            include('database_error.php');
            exit();
        }
        return $db;
    }
?>