<?php
// Connect to MySQL database
$host = 'localhost';
$username = 'your_username';
$password = 'your_password';
$dbname = 'your_database_name';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
  die('Connection failed: ' . $conn->connect_error);
}

// Retrieve data from table
$sql = 'SELECT * FROM your_table_name';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Output data of each row
  while($row = $result->fetch_assoc()) {
    // Create divs based on the data
    echo '<div>';
    echo '<h2>' . $row['title'] . '</h2>';
    echo '<p>' . $row['description'] . '</p>';
    echo '</div>';
  }
} else {
  echo 'No results found';
}

// Close MySQL connection
$conn->close();
?>
