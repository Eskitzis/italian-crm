<?php
session_start();
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$company = $_POST['company'];
$adress = $_POST['address'];
$zip = $_POST['zip'];
$city = $_POST['city'];
$country = $_POST['country'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$representive = $_POST['representive'];
$host = 'localhost';
$username = 'gruppocasa';
$password = 'b2tV*5e3';
$dbname = 'italiancrm';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
die('Connection failed: ' . $conn->connect_error);
}

$sql = "INSERT INTO customers (firstname, lastname, company, address, zip, city, country, email, telephone, representive ) VALUES ('$firstname', '$lastname', '$company', '$address', '$zip', '$city', '$country', '$email', '$telephone', '$representive')";
?>