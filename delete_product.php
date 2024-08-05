<!-- 
    Srinesh Selvaraj
    4/19/2024
    IT202-002
    IT-202 Phase 5 Assignment: Read SQL Data with PHP and JavaScript
    ss4872@njit.edu
-->
<?php
    require_once("database_njit.php");

    $techID = $_POST['techID'];
    $techID = filter_input(INPUT_POST, 'techID', FILTER_VALIDATE_INT);
    $techCategoryID = filter_input(INPUT_POST, 'techCategoryID', FILTER_VALIDATE_INT);
    $db = getDatabase();
    if($techID != FALSE && $techCategoryID != FALSE){
        $query = 'DELETE FROM techAccessoriesStore WHERE techID = :techID';   
    }
    $statement = $db->prepare($query);
    $statement->bindValue(':techID', $techID);
    $success = $statement->execute();
    $statement->closeCursor();
    include("products.php");
?>