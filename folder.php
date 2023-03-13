<?php
    session_start();
    // Connect to MySQL database
    $host = 'localhost';
    $username = 'gruppocasa';
    $password = 'b2tV*5e3';
    $dbname = 'italiancrm';

    $conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
    }
    $id = $_GET['id'];
    $fname = $_GET['firstname'];
    $lname = $_GET['lastname'];
    echo '<h1>This would be the folder of the Customer:</h1>';
    echo $id;
    $sql = "SELECT * FROM customers WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    // Get the count of rows and print it
    if (mysqli_num_rows($result) > 0) {
    } else {
      echo "0";
    }
    echo $row['firstname'];
    echo $row['lastname'];
?>