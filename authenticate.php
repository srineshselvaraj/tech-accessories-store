<!-- 
    Srinesh Selvaraj
    4/19/2024
    IT202-002
    IT-202 Phase 5 Assignment: Read SQL Data with PHP and JavaScript
    ss4872@njit.edu
-->
<?php
    require_once('database_njit.php');
    function is_valid_admin_login($email, $password) {
      $db = getDatabase();
      $query = 'SELECT password FROM techManagers WHERE emailAddress = :email';
      $statement = $db->prepare($query);
      $statement->bindValue(':email', $email);
      $statement->execute();
      $row = $statement->fetch();
      $statement->closeCursor();  
      if ($row === false) {
        return false;
      } else {
        $hash = $row['password'];
        return password_verify($password, $hash);
      }
    }
    session_start();
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    if(is_valid_admin_login($email, $password)){
        $_SESSION['is_valid_admin'] = true;
        //echo "<p>You have successfully logged in</p>";
        $_SESSION['email'] = $email;

        require_once('database_njit.php'); 
        $db = getDatabase();
        $query = 'SELECT firstName FROM techManagers WHERE emailAddress = :email';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $first_name = $statement->fetchColumn();
        $statement->closeCursor();

        require_once('database_njit.php'); 
        $db = getDatabase();
        $query = 'SELECT lastName FROM techManagers WHERE emailAddress = :email';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $last_name = $statement->fetchColumn();
        $statement->closeCursor();

        $_SESSION['first_name'] = $first_name;
        $_SESSION['last_name'] = $last_name;
        
        include('home.php');
    }
    else{
        if($email == NULL & $password == NULL){
            $login_message = 'Please enter a valid email and password.';
        }
        else{
            $login_message = 'Invalid credentials.';
        }
        include('login.php');
    }
?>