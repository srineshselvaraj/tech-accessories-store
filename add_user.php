<!-- 
    Srinesh Selvaraj
    4/19/2024
    IT202-002
    IT-202 Phase 5 Assignment: Read SQL Data with PHP and JavaScript
    ss4872@njit.edu
-->
<?php
    require_once('database_njit.php');
    function addTechManager($email, $password, $firstName, $lastName) {
        $db = getDatabase();
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $query = 'INSERT INTO techManagers (emailAddress, password, firstName, lastName, dateCreated)
                VALUES (:email, :password, :firstName, :lastName, NOW())';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $hash);
        $statement->bindValue(':firstName', $firstName);
        $statement->bindValue(':lastName', $lastName);
        $statement->execute();
        $statement->closeCursor();
    }

    addTechManager("tas@email.com", "ilovetech99", "Tech", "Accessories");
    addTechManager("techuser1@email.com", "iamuser1", "Tech", "User1");
    addTechManager("techuser2@email.com", "iamuser2", "Tech", "User2");
?>