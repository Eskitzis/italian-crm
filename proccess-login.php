<?php
    //values passed from index form
    $username = $_POST['user'];
    $password = $_POST['pass'];

    //prevent injections
    $username = stripcslashes($username);
    $password = stripcslashes($password);

    $con = mysqli_connect('localhost', 'gruppocasa', 'b2tV*5e3', 'italiancrm');

    //Query the database for user
    $result = mysqli_query($con, "select * from 'users' where username = '$username' and password = '$password'") 
              or die("Failed to query database".mysql_error());
    $row = mysqli_fetch_array($result, MYSQLI_BOTH);

    if ($row['username'] == $username && $row['password'] == $password && $row['role'] == "employee"){
        //echo "Login Success!!! Welcome ".$row['username']." ".$row['role'];
        session_start();
        header("Location: home.php");
        $_SESSION['fname'] = $row['fullname'];
    }

    if ($row['username'] == $username && $row['password'] == $password && $row['role'] == "admin"){
        //echo "Login Success!!! Welcome ".$row['username']." ".$row['role'];
        session_start();
        header("Location: home.php");
        $_SESSION['fname'] = $row['fullname'];
        
    }
?>