<?php
    //values passed from index form
    $username = $_POST['user'];
    $password = $_POST['pass'];

    //prevent injections
    $username = stripcslashes($username);
    $password = stripcslashes($password);

    $myServer = "localhost";
    $myUser = "gruppocasa";
    $myPass = "b2tV*5e3";
    $myDB = "italiancrm";

    $con = mysqli_connect($myServer, $myUser, $myPass, $myDB);
    /*
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
      }
      echo "Connected successfully";
    */
    //Query the database for user
    $result = mysqli_query($con, "SELECT * FROM `users` WHERE username = '$username' and password = '$password'") 
              or die("Failed to query database".mysql_error());
    $row = mysqli_fetch_array($result, MYSQLI_BOTH);

    if ($row['username'] == $username && $row['password'] == $password && $row['role'] == "employee"){
        //echo "Login Success!!! Welcome ".$row['username']." ".$row['role'];
        session_start();
        $_SESSION['user'] = $username;
        header("Location: home.php");
    }

    if ($row['username'] == $username && $row['password'] == $password && $row['role'] == "admin"){
        //echo "Login Success!!! Welcome ".$row['username']." ".$row['role'];
        session_start();
        $_SESSION['user'] = $username;
        header("Location: home.php");
    }
?>