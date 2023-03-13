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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $firstname = mysqli_real_escape_string($conn, $_POST["firstname"]);
	$lastname = mysqli_real_escape_string($conn, $_POST["lastname"]);
  $company = mysqli_real_escape_string($conn, $_POST["company"]);
	$adress = mysqli_real_escape_string($conn, $_POST["address"]);
  $zip = mysqli_real_escape_string($conn, $_POST["zip"]);
	$city = mysqli_real_escape_string($conn, $_POST["city"]);
  $country = mysqli_real_escape_string($conn, $_POST["country"]);
	$email = mysqli_real_escape_string($conn, $_POST["email"]);
  $telephone = mysqli_real_escape_string($conn, $_POST["telephone"]);
	$representive = mysqli_real_escape_string($conn, $_POST["representive"]);
  
  $sql = "INSERT INTO customers (firstname, lastname, company, addr, zip, city, country, email, telephone, representive) VALUES ('$firstname', '$lastname', '$company', '$address', '$zip', '$city', '$country', '$email', '$telephone', '$representive')";
  if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />    
    <link rel="stylesheet" href="css/admin-panel.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/x-icon" href="assets/crm.png">
    <link href="assets/css/feather.css" rel="stylesheet" type="text/css">
    <title>Home</title>
</head>
<body>
    <div class="app-container">
        <div class="sidebar">
          <div class="sidebar-header">
            <div class="app-icon">
                <img src="" alt="">
            </div>
          </div>
          <ul class="sidebar-list">
            <li class="sidebar-list-item active">
              <a href="home.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                <span class="sidepar-span">Home</span>
              </a>
            </li>
            <li class="sidebar-list-item">
              <a href="catalogs.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book-open"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>                
                <span class="sidepar-span">Catalogs</span>
              </a>
            </li>
            <li class="sidebar-list-item">
              <a href="factorys.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tool"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>                
                <span class="sidepar-span">Factorys</span>
              </a>
            </li>
            <li class="sidebar-list-item">
              <a href="orders.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pie-chart"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path><path d="M22 12A10 10 0 0 0 12 2v10z"></path></svg>
                <span class="sidepar-span">Orders</span>
              </a>
            </li>
            <li class="sidebar-list-item">
              <a href="customers.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>                
                <span class="sidepar-span">Customers</span>
              </a>
            </li>
            <li class="sidebar-list-item">
              <a href="admin.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>                
                <span class="sidepar-span">Admin</span>
              </a>
            </li>
          </ul>          
          <div class="account-info" onclick="alert('hi its a message');">
            <div class="account-info-picture">
              <img src="assets/crm.png" alt="Account">
            </div>
            <div class="account-info-name">ITPlusNet.gr</div>
            <button class="account-info-more">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></svg>
            </button>
          </div>
        </div>
        <div class="app-content">
          <div class="app-content-header">
            <h1 class="app-content-headerText">Home</h1>
            <button class="mode-switch" title="Switch Theme">
              <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
                <defs></defs>
                <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
              </svg>
            </button>
            <div class="customer-button-wrapper">
            <button class="app-content-headerButton customer customerjs">Add Customer</button>

            <div class="customer-menu">  
              <div class="customer-menu-buttons">
                <form action="" method="post">
                  <input class="customer-input" type="text" name="firstname" id="firstname" placeholder="First Name" required>
                  <br>
                  <input class="customer-input" type="text" name="lastname" id="lastname" placeholder="Last Name" required>
                  <br>
                  <input class="customer-input" type="text" name="company" id="company" placeholder="Company">
                  <br>
                  <input class="customer-input" type="text" name="address" id="address" placeholder="Address">
                  <br>
                  <input class="customer-input" type="text" name="zip" id="zip" placeholder="ZIP/Postal Code">
                  <br>
                  <input class="customer-input" type="text" name="city" id="city" placeholder="City">
                  <br>
                  <input class="customer-input" type="text" name="country" id="country" placeholder="Country">
                  <br>
                  <input class="customer-input" type="email" name="email" id="email" placeholder="E-Mail">
                  <br>
                  <input class="customer-input" type="text" name="telephone" id="telephone" placeholder="Telephone">
                  <br>
                  <input class="customer-input" type="text" name="representive" id="representive" placeholder="Representative/Salesman">
                  <br>
                  <button class="customer-button reset" type="reset">Reset</button>
                  <br>
                  <button class="customer-button apply" type="submit" value="submit">Apply</button>
                </form>
              </div>
            </div>
          </div>

          </div>
          <div class="app-content-actions">
            <input class="search-bar" placeholder="Search..." type="search">
            <div class="app-content-actions-wrapper">
              <div class="filter-button-wrapper">
                <button class="action-button filter jsFilter"><span>Filter</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-filter"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></svg></button>
                <div class="filter-menu">
                  <label>Category</label>
                  <select>
                    <option>All Categories</option>
                    <option>Furniture</option>                     
                    <option>Decoration</option>
                    <option>Kitchen</option>
                    <option>Bathroom</option>
                  </select>
                  <label>Status</label>
                  <select>
                    <option>All Status</option>
                    <option>Active</option>
                    <option>Disabled</option>
                  </select>
                  <div class="filter-menu-buttons">
                    <button class="filter-button reset">
                      Reset
                    </button>
                    <button class="filter-button apply">
                      Apply
                    </button>
                  </div>
                </div>
              </div>
              <button class="action-button list active" title="List View">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
              </button>
              <button class="action-button grid" title="Grid View">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
              </button>
            </div>
          </div>
          <div class="products-area-wrapper tableView">
            <!---MY CODE GOES HERE-->
            <div class="flex-container">
                <div class="flex-item-one">
                    <span style="font-size: large;">Active Orders</span>
                    <?php
                      //DIV FOR EACH CUSTOMER
                      //END DIV FOR EACH CUSTOMER
                      $sql = 'SELECT * FROM orders';
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        // Output data of each row
                          while($row = $result->fetch_assoc()) {
                            // Create divs based on the data
                            echo '<article class="leaderboard__profile" onclick="cust(\''.$row['name'].'\')">';
                            echo '<img src="" alt="" class="leaderboard__picture">';
                            echo '<span class="leaderboard__name">' . $row['name'] .'</span>';
                            echo '<span class="leaderboard__value">' . $row['first_status'] .'<span style="color: black;">';
                              if ($row['first_status'] == "Customer Order"){echo 'A';}
                              if ($row['first_status'] == "GRUPPOCASA->FACTORY"){echo 'B';}
                              if ($row['first_status'] == "FACTORY->CUSTOMER (PROFORMA)"){echo 'C';}
                              if ($row['first_status'] == "GRUPPOCASA->CUSTOMER (PROFORMA)"){echo 'D';}
                              if ($row['first_status'] == "CUSTOMER->GRUPPOCASA (CONFIRMATION)"){echo 'E';}
                              if ($row['first_status'] == "GRUPPOCASA->FACTORY (CONFIRMATION)"){echo 'F';}
                              if ($row['first_status'] == "Advance payment 1"){echo 'G';}
                              if ($row['first_status'] == "Advance payment 2"){echo 'H';}
                              if ($row['first_status'] == "Invoices"){echo 'I';}
                              if ($row['first_status'] == "Final payment"){echo 'J';}
                              if ($row['first_status'] == "Order Shipped"){echo 'K';}
                              '</span></span>';
                            echo '</article>';
                          }
                        }
                    ?>
                </div>
                <div class="flex-item-two">
                    <span style="font-size: large;">Detailed Order Status</span>
                    <div class="flex-container">
                        <div class="flex-item-left">
                            <article class="leaderboard__profile" onclick="ord1()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="margin-left: 15px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>
                                <span class="leaderboard__name">Customer Order</span>
                                <span class="leaderboard__value">
                                  <?php
                                    $sql = "SELECT * FROM order_status WHERE order_status = 'Customer Order' ORDER BY id DESC LIMIT 1";
                                    $result = mysqli_query($conn, $sql);
                                    // Check if the query returned any results
                                    if (mysqli_num_rows($result) > 0) {
                                      // Get the row as an associative array
                                      $row = mysqli_fetch_assoc($result);
                                      // Access the cell from the last row
                                      $date_only = date("d.m.Y", strtotime($row["order_update"]));
                                      echo $date_only;
                                    } else {
                                      echo "-";
                                    }
                                  ?>
                                  <span style="color: black;">
                                    A
                                    <span style="color: red;" id="span1">
                                      <?php
                                        $sql = "SELECT COUNT(*) as count FROM order_status WHERE order_status = 'Customer Order'";
                                        $result = mysqli_query($conn, $sql);
                                        // Get the count of rows and print it
                                        if (mysqli_num_rows($result) > 0) {
                                          $row = mysqli_fetch_assoc($result);
                                          $count = $row["count"];
                                          echo $count;
                                        } else {
                                          echo "0";
                                        }
                                      ?>
                                    </span>
                                  </span>
                                </span>
                            </article>

                            <article class="leaderboard__profile" onclick="ord2()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="margin-left: 15px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg>
                                <span class="leaderboard__name">GRUPPOCASA->FACTORY</span>
                                <span class="leaderboard__value">
                                  <?php
                                    $sql = "SELECT * FROM order_status WHERE order_status = 'GRUPPOCASA->FACTORY' ORDER BY id DESC LIMIT 1";
                                    $result = mysqli_query($conn, $sql);
                                    // Check if the query returned any results
                                    if (mysqli_num_rows($result) > 0) {
                                      // Get the row as an associative array
                                      $row = mysqli_fetch_assoc($result);
                                      // Access the cell from the last row
                                      $date_only = date("d.m.Y", strtotime($row["order_update"]));
                                      echo $date_only;
                                    } else {
                                      echo "-";
                                    }
                                  ?>
                                  <span style="color: black;">
                                    B
                                    <span style="color: red;" id="span2">
                                      <?php
                                        $sql = "SELECT COUNT(*) as count FROM order_status WHERE order_status = 'GRUPPOCASA->FACTORY'";
                                        $result = mysqli_query($conn, $sql);
                                        // Get the count of rows and print it
                                        if (mysqli_num_rows($result) > 0) {
                                          $row = mysqli_fetch_assoc($result);
                                          $count = $row["count"];
                                          echo $count;
                                        } else {
                                          echo "0";
                                        }
                                      ?>
                                    </span>
                                  </span>
                                </span>
                            </article>
        
                            <article class="leaderboard__profile" onclick="ord3()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="margin-left: 15px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                <span class="leaderboard__name">FACTORY->CUSTOMER (PROFORMA)</span>
                                <span class="leaderboard__value">
                                  <?php
                                    $sql = "SELECT * FROM order_status WHERE order_status = 'FACTORY->CUSTOMER (PROFORMA)' ORDER BY id DESC LIMIT 1";
                                    $result = mysqli_query($conn, $sql);
                                    // Check if the query returned any results
                                    if (mysqli_num_rows($result) > 0) {
                                      // Get the row as an associative array
                                      $row = mysqli_fetch_assoc($result);
                                      // Access the cell from the last row
                                      $date_only = date("d.m.Y", strtotime($row["order_update"]));
                                      echo $date_only;
                                    } else {
                                      echo "-";
                                    }
                                  ?>                                  
                                  <span style="color: black;">
                                    C
                                    <span style="color: red;" id="span3">
                                      <?php
                                        $sql = "SELECT COUNT(*) as count FROM order_status WHERE order_status = 'FACTORY->CUSTOMER (PROFORMA)'";
                                        $result = mysqli_query($conn, $sql);
                                        // Get the count of rows and print it
                                        if (mysqli_num_rows($result) > 0) {
                                          $row = mysqli_fetch_assoc($result);
                                          $count = $row["count"];
                                          echo $count;
                                        } else {
                                          echo "0";
                                        }
                                      ?>
                                    </span>
                                  </span>
                                </span>
                            </article>
        
                            <article class="leaderboard__profile" onclick="ord4()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="margin-left: 15px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                <span class="leaderboard__name">GRUPPOCASA->CUSTOMER (PROFORMA)</span>
                                <span class="leaderboard__value">
                                  <?php
                                    $sql = "SELECT * FROM order_status WHERE order_status = 'GRUPPOCASA->CUSTOMER (PROFORMA)' ORDER BY id DESC LIMIT 1";
                                    $result = mysqli_query($conn, $sql);
                                    // Check if the query returned any results
                                    if (mysqli_num_rows($result) > 0) {
                                      // Get the row as an associative array
                                      $row = mysqli_fetch_assoc($result);
                                      // Access the cell from the last row
                                      $date_only = date("d.m.Y", strtotime($row["order_update"]));
                                      echo $date_only;
                                    } else {
                                      echo "-";
                                    }
                                  ?>                                  
                                  <span style="color: black;">
                                    D
                                    <span style="color: red;" id="span4">
                                      <?php
                                        $sql = "SELECT COUNT(*) as count FROM order_status WHERE order_status = 'GRUPPOCASA->CUSTOMER (PROFORMA)'";
                                        $result = mysqli_query($conn, $sql);
                                        // Get the count of rows and print it
                                        if (mysqli_num_rows($result) > 0) {
                                          $row = mysqli_fetch_assoc($result);
                                          $count = $row["count"];
                                          echo $count;
                                        } else {
                                          echo "0";
                                        }
                                      ?>
                                    </span>
                                  </span>
                                </span>
                            </article>  

                            <article class="leaderboard__profile" onclick="ord5()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="margin-left: 15px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                                <span class="leaderboard__name">CUSTOMER->GRUPPOCASA (CONFIRMATION)</span>
                                <span class="leaderboard__value">
                                  <?php
                                    $sql = "SELECT * FROM order_status WHERE order_status = 'CUSTOMER->GRUPPOCASA (CONFIRMATION)' ORDER BY id DESC LIMIT 1";
                                    $result = mysqli_query($conn, $sql);
                                    // Check if the query returned any results
                                    if (mysqli_num_rows($result) > 0) {
                                      // Get the row as an associative array
                                      $row = mysqli_fetch_assoc($result);
                                      // Access the cell from the last row
                                      $date_only = date("d.m.Y", strtotime($row["order_update"]));
                                      echo $date_only;
                                    } else {
                                      echo "-";
                                    }
                                  ?>                                  
                                  <span style="color: black;">
                                    E
                                    <span style="color: red;" id="span5">
                                      <?php
                                        $sql = "SELECT COUNT(*) as count FROM order_status WHERE order_status = 'CUSTOMER->GRUPPOCASA (CONFIRMATION)'";
                                        $result = mysqli_query($conn, $sql);
                                        // Get the count of rows and print it
                                        if (mysqli_num_rows($result) > 0) {
                                          $row = mysqli_fetch_assoc($result);
                                          $count = $row["count"];
                                          echo $count;
                                        } else {
                                          echo "0";
                                        }
                                      ?>
                                    </span>
                                  </span>
                                </span>
                            </article>
        
                            <article class="leaderboard__profile" onclick="ord6()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="margin-left: 15px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                                <span class="leaderboard__name">GRUPPOCASA->FACTORY (CONFIRMATION)</span>
                                <span class="leaderboard__value">
                                  <?php
                                    $sql = "SELECT * FROM order_status WHERE order_status = 'GRUPPOCASA->FACTORY (CONFIRMATION)' ORDER BY id DESC LIMIT 1";
                                    $result = mysqli_query($conn, $sql);
                                    // Check if the query returned any results
                                    if (mysqli_num_rows($result) > 0) {
                                      // Get the row as an associative array
                                      $row = mysqli_fetch_assoc($result);
                                      // Access the cell from the last row
                                      $date_only = date("d.m.Y", strtotime($row["order_update"]));
                                      echo $date_only;
                                    } else {
                                      echo "-";
                                    }
                                  ?>                                  
                                  <span style="color: black;">
                                    F
                                    <span style="color: red;" id="span6">
                                      <?php
                                        $sql = "SELECT COUNT(*) as count FROM order_status WHERE order_status = 'GRUPPOCASA->FACTORY (CONFIRMATION)'";
                                        $result = mysqli_query($conn, $sql);
                                        // Get the count of rows and print it
                                        if (mysqli_num_rows($result) > 0) {
                                          $row = mysqli_fetch_assoc($result);
                                          $count = $row["count"];
                                          echo $count;
                                        } else {
                                          echo "0";
                                        }
                                      ?>
                                    </span>
                                  </span>
                                </span>
                            </article>      
                        </div>
                        <div class="flex-item-right">
                            <article class="leaderboard__profile" onclick="ord7()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="margin-left: 15px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                                <span class="leaderboard__name">Advance payment 1</span>
                                <span class="leaderboard__value">
                                  <?php
                                    $sql = "SELECT * FROM order_status WHERE order_status = 'Advance payment 1' ORDER BY id DESC LIMIT 1";
                                    $result = mysqli_query($conn, $sql);
                                    // Check if the query returned any results
                                    if (mysqli_num_rows($result) > 0) {
                                      // Get the row as an associative array
                                      $row = mysqli_fetch_assoc($result);
                                      // Access the cell from the last row
                                      $date_only = date("d.m.Y", strtotime($row["order_update"]));
                                      echo $date_only;
                                    } else {
                                      echo "-";
                                    }
                                  ?>                                  
                                  <span style="color: black;">
                                    G
                                    <span style="color: red;" id="span7">
                                      <?php
                                        $sql = "SELECT COUNT(*) as count FROM order_status WHERE order_status = 'Advance payment 1'";
                                        $result = mysqli_query($conn, $sql);
                                        // Get the count of rows and print it
                                        if (mysqli_num_rows($result) > 0) {
                                          $row = mysqli_fetch_assoc($result);
                                          $count = $row["count"];
                                          echo $count;
                                        } else {
                                          echo "0";
                                        }
                                      ?>
                                    </span>
                                  </span>
                                </span>
                            </article>
        
                            <article class="leaderboard__profile" onclick="ord8()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="margin-left: 15px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                                <span class="leaderboard__name">Advance payment 2</span>
                                <span class="leaderboard__value">
                                  <?php
                                    $sql = "SELECT * FROM order_status WHERE order_status = 'Advance payment 2' ORDER BY id DESC LIMIT 1";
                                    $result = mysqli_query($conn, $sql);
                                    // Check if the query returned any results
                                    if (mysqli_num_rows($result) > 0) {
                                      // Get the row as an associative array
                                      $row = mysqli_fetch_assoc($result);
                                      // Access the cell from the last row
                                      $date_only = date("d.m.Y", strtotime($row["order_update"]));
                                      echo $date_only;
                                    } else {
                                      echo "-";
                                    }
                                  ?>                                  
                                  <span style="color: black;">
                                    H
                                    <span style="color: red;" id="span8">
                                      <?php
                                        $sql = "SELECT COUNT(*) as count FROM order_status WHERE order_status = 'Advance payment 2'";
                                        $result = mysqli_query($conn, $sql);
                                        // Get the count of rows and print it
                                        if (mysqli_num_rows($result) > 0) {
                                          $row = mysqli_fetch_assoc($result);
                                          $count = $row["count"];
                                          echo $count;
                                        } else {
                                          echo "0";
                                        }
                                      ?>
                                    </span>
                                  </span>
                                </span>
                            </article>

                            <article class="leaderboard__profile" onclick="ord9()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="margin-left: 15px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                                <span class="leaderboard__name">Invoices</span>
                                <span class="leaderboard__value">
                                  <?php
                                    $sql = "SELECT * FROM order_status WHERE order_status = 'Invoices' ORDER BY id DESC LIMIT 1";
                                    $result = mysqli_query($conn, $sql);
                                    // Check if the query returned any results
                                    if (mysqli_num_rows($result) > 0) {
                                      // Get the row as an associative array
                                      $row = mysqli_fetch_assoc($result);
                                      // Access the cell from the last row
                                      $date_only = date("d.m.Y", strtotime($row["order_update"]));
                                      echo $date_only;
                                    } else {
                                      echo "-";
                                    }
                                  ?>                                  
                                  <span style="color: black;">
                                    I
                                    <span style="color: red;" id="span9">
                                      <?php
                                        $sql = "SELECT COUNT(*) as count FROM order_status WHERE order_status = 'Invoices'";
                                        $result = mysqli_query($conn, $sql);
                                        // Get the count of rows and print it
                                        if (mysqli_num_rows($result) > 0) {
                                          $row = mysqli_fetch_assoc($result);
                                          $count = $row["count"];
                                          echo $count;
                                        } else {
                                          echo "0";
                                        }
                                      ?>
                                    </span>
                                  </span>
                                </span>
                            </article>

                            <article class="leaderboard__profile" onclick="ord10()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="margin-left: 15px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                                <span class="leaderboard__name">Final payment</span>
                                <span class="leaderboard__value">
                                  <?php
                                    $sql = "SELECT * FROM order_status WHERE order_status = 'Final payment' ORDER BY id DESC LIMIT 1";
                                    $result = mysqli_query($conn, $sql);
                                    // Check if the query returned any results
                                    if (mysqli_num_rows($result) > 0) {
                                      // Get the row as an associative array
                                      $row = mysqli_fetch_assoc($result);
                                      // Access the cell from the last row
                                      $date_only = date("d.m.Y", strtotime($row["order_update"]));
                                      echo $date_only;
                                    } else {
                                      echo "-";
                                    }
                                  ?>                                  
                                  <span style="color: black;">
                                    J
                                    <span style="color: red;" id="span10">
                                      <?php
                                        $sql = "SELECT COUNT(*) as count FROM order_status WHERE order_status = 'Final payment'";
                                        $result = mysqli_query($conn, $sql);
                                        // Get the count of rows and print it
                                        if (mysqli_num_rows($result) > 0) {
                                          $row = mysqli_fetch_assoc($result);
                                          $count = $row["count"];
                                          echo $count;
                                        } else {
                                          echo "0";
                                        }
                                      ?>
                                    </span>
                                  </span>
                                </span>
                            </article>

                            <article class="leaderboard__profile" onclick="ord11()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="margin-left: 15px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-package"><line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                                <span class="leaderboard__name">Order Shipped</span>
                                <span class="leaderboard__value">
                                  <?php
                                    $sql = "SELECT * FROM order_status WHERE order_status = 'Order Shipped' ORDER BY id DESC LIMIT 1";
                                    $result = mysqli_query($conn, $sql);
                                    // Check if the query returned any results
                                    if (mysqli_num_rows($result) > 0) {
                                      // Get the row as an associative array
                                      $row = mysqli_fetch_assoc($result);
                                      // Access the cell from the last row
                                      $date_only = date("d.m.Y", strtotime($row["order_update"]));
                                      echo $date_only;
                                    } else {
                                      echo "-";
                                    }
                                  ?>
                                  <span style="color: black;">
                                    K
                                    <span style="color: red;" id="span11">
                                      <?php
                                        $sql = "SELECT COUNT(*) as count FROM order_status WHERE order_status = 'Order Shipped'";
                                        $result = mysqli_query($conn, $sql);
                                        // Get the count of rows and print it
                                        if (mysqli_num_rows($result) > 0) {
                                          $row = mysqli_fetch_assoc($result);
                                          $count = $row["count"];
                                          echo $count;
                                        } else {
                                          echo "0";
                                        }
                                      ?>
                                    </span>
                                  </span>
                                </span>
                            </article>
                        </div>
                    </div>
                </div>

                <div id="customerdiv" class="flex-item-three" style="display:none;">
                  <span style="font-size: medium;" id="customername" name="customername"></span>
                </div>

                <div id="orderdiv1" class="flex-item-three" style="display:none;">
                  <span style="font-size: medium;">Customer Order</span>
                  <?php
                    //DIV FOR EACH CUSTOMER
                    //END DIV FOR EACH CUSTOMER
                    $sql = 'SELECT * FROM order_status WHERE order_status = "Customer Order"';
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                      // Output data of each row
                        while($row = $result->fetch_assoc()) {
                          // Create divs based on the data
                          echo '<article class="leaderboard__profile">';
                          echo '<span class="leaderboard__name">' . $row['order_update'] .'</span>';
                          echo '<span class="leaderboard__value">';
                            $customer_id = $row['customer_id'];
                            $sql = "SELECT * FROM customers WHERE id = '$customer_id'";
                            $customer_result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($customer_result) > 0) {
                              // Loop through each row in the customers table (there should only be one)
                              while ($customer_row = mysqli_fetch_assoc($customer_result)) {
                                  // Do something with the customer data, for example:
                                  echo $customer_row['firstname'] . " " . $customer_row['lastname'];
                              }
                            }
                            '<span style="color: black;">' . $row[''] .'</span></span>';
                          echo '</article>';
                        }
                      }
                    ?>
                </div>

                <div id="orderdiv2" class="flex-item-three" style="display:none;">
                  <span style="font-size: medium;">GRUPPOCASA->FACTORY</span>
                  <?php
                    //DIV FOR EACH CUSTOMER
                    //END DIV FOR EACH CUSTOMER
                    $sql = 'SELECT * FROM order_status WHERE order_status = "GRUPPOCASA->FACTORY"';
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                      // Output data of each row
                        while($row = $result->fetch_assoc()) {
                          // Create divs based on the data
                          echo '<article class="leaderboard__profile">';
                          echo '<span class="leaderboard__name">' . $row['order_update'] .'</span>';
                          echo '<span class="leaderboard__value">';
                            $customer_id = $row['customer_id'];
                            $sql = "SELECT * FROM customers WHERE id = '$customer_id'";
                            $customer_result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($customer_result) > 0) {
                              // Loop through each row in the customers table (there should only be one)
                              while ($customer_row = mysqli_fetch_assoc($customer_result)) {
                                  // Do something with the customer data, for example:
                                  echo $customer_row['firstname'] . " " . $customer_row['lastname'];
                              }
                            }
                            '<span style="color: black;">' . $row[''] .'</span></span>';
                          echo '</article>';
                        }
                      }
                    ?>
                </div>

                <div id="orderdiv3" class="flex-item-three" style="display:none;">
                  <span style="font-size: medium;">FACTORY->CUSTOMER (PROFORMA)</span>
                  <?php
                    //DIV FOR EACH CUSTOMER
                    //END DIV FOR EACH CUSTOMER
                    $sql = 'SELECT * FROM order_status WHERE order_status = "FACTORY->CUSTOMER (PROFORMA)"';
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                      // Output data of each row
                        while($row = $result->fetch_assoc()) {
                          // Create divs based on the data
                          echo '<article class="leaderboard__profile">';
                          echo '<span class="leaderboard__name">' . $row['order_update'] .'</span>';
                          echo '<span class="leaderboard__value">';
                            $customer_id = $row['customer_id'];
                            $sql = "SELECT * FROM customers WHERE id = '$customer_id'";
                            $customer_result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($customer_result) > 0) {
                              // Loop through each row in the customers table (there should only be one)
                              while ($customer_row = mysqli_fetch_assoc($customer_result)) {
                                  // Do something with the customer data, for example:
                                  echo $customer_row['firstname'] . " " . $customer_row['lastname'];
                              }
                            }
                            '<span style="color: black;">' . $row[''] .'</span></span>';
                          echo '</article>';
                        }
                      }
                    ?>
                </div>

                <div id="orderdiv4" class="flex-item-three" style="display:none;">
                  <span style="font-size: medium;">GRUPPOCASA->CUSTOMER (PROFORMA)</span>
                  <?php
                    //DIV FOR EACH CUSTOMER
                    //END DIV FOR EACH CUSTOMER
                    $sql = 'SELECT * FROM order_status WHERE order_status = "GRUPPOCASA->CUSTOMER (PROFORMA)"';
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                      // Output data of each row
                        while($row = $result->fetch_assoc()) {
                          // Create divs based on the data
                          echo '<article class="leaderboard__profile">';
                          echo '<span class="leaderboard__name">' . $row['order_update'] .'</span>';
                          echo '<span class="leaderboard__value">';
                            $customer_id = $row['customer_id'];
                            $sql = "SELECT * FROM customers WHERE id = '$customer_id'";
                            $customer_result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($customer_result) > 0) {
                              // Loop through each row in the customers table (there should only be one)
                              while ($customer_row = mysqli_fetch_assoc($customer_result)) {
                                  // Do something with the customer data, for example:
                                  echo $customer_row['firstname'] . " " . $customer_row['lastname'];
                              }
                            }
                            '<span style="color: black;">' . $row[''] .'</span></span>';
                          echo '</article>';
                        }
                      }
                    ?>
                </div>

                <div id="orderdiv5" class="flex-item-three" style="display:none;">
                  <span style="font-size: medium;">CUSTOMER->GRUPPOCASA (CONFIRMATION)</span>
                  <?php
                    //DIV FOR EACH CUSTOMER
                    //END DIV FOR EACH CUSTOMER
                    $sql = 'SELECT * FROM order_status WHERE order_status = "CUSTOMER->GRUPPOCASA (CONFIRMATION)"';
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                      // Output data of each row
                        while($row = $result->fetch_assoc()) {
                          // Create divs based on the data
                          echo '<article class="leaderboard__profile">';
                          echo '<span class="leaderboard__name">' . $row['order_update'] .'</span>';
                          echo '<span class="leaderboard__value">';
                            $customer_id = $row['customer_id'];
                            $sql = "SELECT * FROM customers WHERE id = '$customer_id'";
                            $customer_result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($customer_result) > 0) {
                              // Loop through each row in the customers table (there should only be one)
                              while ($customer_row = mysqli_fetch_assoc($customer_result)) {
                                  // Do something with the customer data, for example:
                                  echo $customer_row['firstname'] . " " . $customer_row['lastname'];
                              }
                            }
                            '<span style="color: black;">' . $row[''] .'</span></span>';
                          echo '</article>';
                        }
                      }
                    ?>
                </div>

                <div id="orderdiv6" class="flex-item-three" style="display:none;">
                  <span style="font-size: medium;">GRUPPOCASA->FACTORY (CONFIRMATION)</span>
                  <?php
                    //DIV FOR EACH CUSTOMER
                    //END DIV FOR EACH CUSTOMER
                    $sql = 'SELECT * FROM order_status WHERE order_status = "GRUPPOCASA->FACTORY (CONFIRMATION)"';
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                      // Output data of each row
                        while($row = $result->fetch_assoc()) {
                          // Create divs based on the data
                          echo '<article class="leaderboard__profile">';
                          echo '<span class="leaderboard__name">' . $row['order_update'] .'</span>';
                          echo '<span class="leaderboard__value">';
                            $customer_id = $row['customer_id'];
                            $sql = "SELECT * FROM customers WHERE id = '$customer_id'";
                            $customer_result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($customer_result) > 0) {
                              // Loop through each row in the customers table (there should only be one)
                              while ($customer_row = mysqli_fetch_assoc($customer_result)) {
                                  // Do something with the customer data, for example:
                                  echo $customer_row['firstname'] . " " . $customer_row['lastname'];
                              }
                            }
                            '<span style="color: black;">' . $row[''] .'</span></span>';
                          echo '</article>';
                        }
                      }
                    ?>
                </div>

                <div id="orderdiv7" class="flex-item-three" style="display:none;">
                  <span style="font-size: medium;">Advance payment 1</span>
                  <?php
                    //DIV FOR EACH CUSTOMER
                    //END DIV FOR EACH CUSTOMER
                    $sql = 'SELECT * FROM order_status WHERE order_status = "Advance payment 1"';
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                      // Output data of each row
                        while($row = $result->fetch_assoc()) {
                          // Create divs based on the data
                          echo '<article class="leaderboard__profile">';
                          echo '<span class="leaderboard__name">' . $row['order_update'] .'</span>';
                          echo '<span class="leaderboard__value">';
                            $customer_id = $row['customer_id'];
                            $sql = "SELECT * FROM customers WHERE id = '$customer_id'";
                            $customer_result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($customer_result) > 0) {
                              // Loop through each row in the customers table (there should only be one)
                              while ($customer_row = mysqli_fetch_assoc($customer_result)) {
                                  // Do something with the customer data, for example:
                                  echo $customer_row['firstname'] . " " . $customer_row['lastname'];
                              }
                            }
                            '<span style="color: black;">' . $row[''] .'</span></span>';
                          echo '</article>';
                        }
                      }
                    ?>
                </div>

                <div id="orderdiv8" class="flex-item-three" style="display:none;">
                  <span style="font-size: medium;">Advance payment 2</span>
                  <?php
                    //DIV FOR EACH CUSTOMER
                    //END DIV FOR EACH CUSTOMER
                    $sql = 'SELECT * FROM order_status WHERE order_status = "Advance payment 2"';
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                      // Output data of each row
                        while($row = $result->fetch_assoc()) {
                          // Create divs based on the data
                          echo '<article class="leaderboard__profile">';
                          echo '<span class="leaderboard__name">' . $row['order_update'] .'</span>';
                          echo '<span class="leaderboard__value">';
                            $customer_id = $row['customer_id'];
                            $sql = "SELECT * FROM customers WHERE id = '$customer_id'";
                            $customer_result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($customer_result) > 0) {
                              // Loop through each row in the customers table (there should only be one)
                              while ($customer_row = mysqli_fetch_assoc($customer_result)) {
                                  // Do something with the customer data, for example:
                                  echo $customer_row['firstname'] . " " . $customer_row['lastname'];
                              }
                            }
                            '<span style="color: black;">' . $row[''] .'</span></span>';
                          echo '</article>';
                        }
                      }
                    ?>
                </div>

                <div id="orderdiv9" class="flex-item-three" style="display:none;">
                  <span style="font-size: medium;">Invoices</span>
                  <?php
                    //DIV FOR EACH CUSTOMER
                    //END DIV FOR EACH CUSTOMER
                    $sql = 'SELECT * FROM order_status WHERE order_status = "Invoices"';
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                      // Output data of each row
                        while($row = $result->fetch_assoc()) {
                          // Create divs based on the data
                          echo '<article class="leaderboard__profile">';
                          echo '<span class="leaderboard__name">' . $row['order_update'] .'</span>';
                          echo '<span class="leaderboard__value">';
                            $customer_id = $row['customer_id'];
                            $sql = "SELECT * FROM customers WHERE id = '$customer_id'";
                            $customer_result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($customer_result) > 0) {
                              // Loop through each row in the customers table (there should only be one)
                              while ($customer_row = mysqli_fetch_assoc($customer_result)) {
                                  // Do something with the customer data, for example:
                                  echo $customer_row['firstname'] . " " . $customer_row['lastname'];
                              }
                            }
                            '<span style="color: black;">' . $row[''] .'</span></span>';
                          echo '</article>';
                        }
                      }
                    ?>
                </div>

                <div id="orderdiv10" class="flex-item-three" style="display:none;">
                  <span style="font-size: medium;">Final payment</span>
                  <?php
                    //DIV FOR EACH CUSTOMER
                    //END DIV FOR EACH CUSTOMER
                    $sql = 'SELECT * FROM order_status WHERE order_status = "Final payment"';
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                      // Output data of each row
                        while($row = $result->fetch_assoc()) {
                          // Create divs based on the data
                          echo '<article class="leaderboard__profile">';
                          echo '<span class="leaderboard__name">' . $row['order_update'] .'</span>';
                          echo '<span class="leaderboard__value">';
                            $customer_id = $row['customer_id'];
                            $sql = "SELECT * FROM customers WHERE id = '$customer_id'";
                            $customer_result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($customer_result) > 0) {
                              // Loop through each row in the customers table (there should only be one)
                              while ($customer_row = mysqli_fetch_assoc($customer_result)) {
                                  // Do something with the customer data, for example:
                                  echo $customer_row['firstname'] . " " . $customer_row['lastname'];
                              }
                            }
                            '<span style="color: black;">' . $row[''] .'</span></span>';
                          echo '</article>';
                        }
                      }
                    ?>
                </div>

                <div id="orderdiv11" class="flex-item-three" style="display:none;">
                  <span style="font-size: medium;">Order Shipped</span>
                  <?php
                    //DIV FOR EACH CUSTOMER
                    //END DIV FOR EACH CUSTOMER
                    $sql = 'SELECT * FROM order_status WHERE order_status = "Order Shipped"';
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                      // Output data of each row
                        while($row = $result->fetch_assoc()) {
                          // Create divs based on the data
                          echo '<article class="leaderboard__profile">';
                          echo '<span class="leaderboard__name">' . $row['order_update'] .'</span>';
                          echo '<span class="leaderboard__value">';
                            $customer_id = $row['customer_id'];
                            $sql = "SELECT * FROM customers WHERE id = '$customer_id'";
                            $customer_result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($customer_result) > 0) {
                              // Loop through each row in the customers table (there should only be one)
                              while ($customer_row = mysqli_fetch_assoc($customer_result)) {
                                  // Do something with the customer data, for example:
                                  echo $customer_row['firstname'] . " " . $customer_row['lastname'];
                              }
                            }
                            '<span style="color: black;">' . $row[''] .'</span></span>';
                          echo '</article>';
                        }
                      }
                    ?>
                </div>
            </div>
            <div class="flex-item-three">
              <canvas id="orderstatuschart" class="canvas-css"></canvas>
              <canvas id="ordersfulfilled" class="canvas-css"></canvas>                                      
            </div>
        </div>
      </div>
      <script>
        var yValues = [];
        for (var i = 1; i <= 11; i++) {
          var span = document.getElementById("span" + i);
          var text = span.textContent;
          yValues.push(parseInt(text));
        }
        new Chart("orderstatuschart", {
          type: "doughnut",
          data: {
            labels: ["A", "B", "C", "D", "E","F","G","H","I","J","K"],
            datasets: [{
              backgroundColor: ["#8F2D56", "#4B0082", "#00FF7F", "#FFD700", "#FF8C00", "#DC143C", "#00CED1", "#008080", "#FF1493", "#FF69B4", "#9400D3"],
              data: yValues
            }]
          },
          options: {
            title: {
              display: true,
              text: "Order Status"
            }
          }
        });
        new Chart("ordersfulfilled", {
          type: "doughnut",
          data: {
            labels: ["FULLFILED", "ACTIVE"],
            datasets: [{
              backgroundColor: ["#8F2D56", "#4B0082"],
              data: ["50", "50"]
            }]
          },
          options: {
            title: {
              display: true,
              text: "Orders Fulfilled"
            }
          }
        });
      </script>
      <script>
        $(document).ready(function () {
            $('select').selectize({
             sortField: 'text'
            });
        });
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
        //BLACK AND WHITE JS
        document.querySelector(".jsFilter").addEventListener("click", function () {
            document.querySelector(".filter-menu").classList.toggle("active");
        });

        document.querySelector(".customerjs").addEventListener("click", function () {
            document.querySelector(".customer-menu").classList.toggle("active");
        });
  
        document.querySelector(".grid").addEventListener("click", function () {
            document.querySelector(".list").classList.remove("active");
            document.querySelector(".grid").classList.add("active");
            document.querySelector(".products-area-wrapper").classList.add("gridView");
            document
                .querySelector(".products-area-wrapper")
                .classList.remove("tableView");
        });
  
        document.querySelector(".list").addEventListener("click", function () {
            document.querySelector(".list").classList.add("active");
            document.querySelector(".grid").classList.remove("active");
            document.querySelector(".products-area-wrapper").classList.remove("gridView");
            document.querySelector(".products-area-wrapper").classList.add("tableView");
        });
  
        var modeSwitch = document.querySelector('.mode-switch');
        modeSwitch.addEventListener('click', function () {                      
            document.documentElement.classList.toggle('light');
            modeSwitch.classList.toggle('active');
        });
        //////////////////////////////////////////////////////////////////////////////////////
        function gridcontent(x) {
        if (x.matches) { // If media query matches
          document.querySelector(".products-area-wrapper").classList.add("gridView");
          document.querySelector(".products-area-wrapper").classList.remove("tableView");
        } else {
          document.querySelector(".products-area-wrapper").classList.remove("gridView");
          document.querySelector(".products-area-wrapper").classList.add("tableView");
        }
        }
        var x = window.matchMedia("(max-width: 500px)")
        gridcontent(x) // Call listener function at run time
        x.addListener(gridcontent) // Attach listener function on state changes
        /////////////////////////////////////////////////////////////////////////////////////
        function cust(name) {
          document.getElementById("customerdiv").style.display = "block";
          document.getElementById('customername').innerHTML = name;
          
          document.getElementById("orderdiv1").style.display = "none";
          document.getElementById("orderdiv2").style.display = "none";
          document.getElementById("orderdiv3").style.display = "none";
          document.getElementById("orderdiv4").style.display = "none";
          document.getElementById("orderdiv5").style.display = "none";
          document.getElementById("orderdiv6").style.display = "none";
          document.getElementById("orderdiv7").style.display = "none";
          document.getElementById("orderdiv8").style.display = "none";
          document.getElementById("orderdiv9").style.display = "none";
          document.getElementById("orderdiv10").style.display = "none";
          document.getElementById("orderdiv11").style.display = "none";
        }
        function ord1() {
          document.getElementById("orderdiv1").style.display = "block";
          document.getElementById("orderdiv2").style.display = "none";
          document.getElementById("orderdiv3").style.display = "none";
          document.getElementById("orderdiv4").style.display = "none";
          document.getElementById("orderdiv5").style.display = "none";
          document.getElementById("orderdiv6").style.display = "none";
          document.getElementById("orderdiv7").style.display = "none";
          document.getElementById("orderdiv8").style.display = "none";
          document.getElementById("orderdiv9").style.display = "none";
          document.getElementById("orderdiv10").style.display = "none";
          document.getElementById("orderdiv11").style.display = "none";

          
          document.getElementById("customerdiv").style.display = "none";
        }
        function ord2() {
          document.getElementById("orderdiv1").style.display = "none";
          document.getElementById("orderdiv2").style.display = "block";
          document.getElementById("orderdiv3").style.display = "none";
          document.getElementById("orderdiv4").style.display = "none";
          document.getElementById("orderdiv5").style.display = "none";
          document.getElementById("orderdiv6").style.display = "none";
          document.getElementById("orderdiv7").style.display = "none";
          document.getElementById("orderdiv8").style.display = "none";
          document.getElementById("orderdiv9").style.display = "none";
          document.getElementById("orderdiv10").style.display = "none";
          document.getElementById("orderdiv11").style.display = "none";

          document.getElementById("customerdiv").style.display = "none";     
        }
        function ord3() {
          document.getElementById("orderdiv1").style.display = "none";
          document.getElementById("orderdiv2").style.display = "none";
          document.getElementById("orderdiv3").style.display = "block";
          document.getElementById("orderdiv4").style.display = "none";
          document.getElementById("orderdiv5").style.display = "none";
          document.getElementById("orderdiv6").style.display = "none";
          document.getElementById("orderdiv7").style.display = "none";
          document.getElementById("orderdiv8").style.display = "none";
          document.getElementById("orderdiv9").style.display = "none";
          document.getElementById("orderdiv10").style.display = "none";
          document.getElementById("orderdiv11").style.display = "none";

          document.getElementById("customerdiv").style.display = "none";
        }
        function ord4() {
          document.getElementById("orderdiv1").style.display = "none";
          document.getElementById("orderdiv2").style.display = "none";
          document.getElementById("orderdiv3").style.display = "none";
          document.getElementById("orderdiv4").style.display = "block";
          document.getElementById("orderdiv5").style.display = "none";
          document.getElementById("orderdiv6").style.display = "none";
          document.getElementById("orderdiv7").style.display = "none";
          document.getElementById("orderdiv8").style.display = "none";
          document.getElementById("orderdiv9").style.display = "none";
          document.getElementById("orderdiv10").style.display = "none";
          document.getElementById("orderdiv11").style.display = "none";

          document.getElementById("customerdiv").style.display = "none";
        }
        function ord5() {
          document.getElementById("orderdiv1").style.display = "none";
          document.getElementById("orderdiv2").style.display = "none";
          document.getElementById("orderdiv3").style.display = "none";
          document.getElementById("orderdiv4").style.display = "none";
          document.getElementById("orderdiv5").style.display = "block";
          document.getElementById("orderdiv6").style.display = "none";
          document.getElementById("orderdiv7").style.display = "none";
          document.getElementById("orderdiv8").style.display = "none";
          document.getElementById("orderdiv9").style.display = "none";
          document.getElementById("orderdiv10").style.display = "none";
          document.getElementById("orderdiv11").style.display = "none";

          document.getElementById("customerdiv").style.display = "none";
        }
        function ord6() {
          document.getElementById("orderdiv1").style.display = "none";
          document.getElementById("orderdiv2").style.display = "none";
          document.getElementById("orderdiv3").style.display = "none";
          document.getElementById("orderdiv4").style.display = "none";
          document.getElementById("orderdiv5").style.display = "none";
          document.getElementById("orderdiv6").style.display = "block";
          document.getElementById("orderdiv7").style.display = "none";
          document.getElementById("orderdiv8").style.display = "none";
          document.getElementById("orderdiv9").style.display = "none";
          document.getElementById("orderdiv10").style.display = "none";
          document.getElementById("orderdiv11").style.display = "none";

          document.getElementById("customerdiv").style.display = "none";
        }
        function ord7() {
          document.getElementById("orderdiv1").style.display = "none";
          document.getElementById("orderdiv2").style.display = "none";
          document.getElementById("orderdiv3").style.display = "none";
          document.getElementById("orderdiv4").style.display = "none";
          document.getElementById("orderdiv5").style.display = "none";
          document.getElementById("orderdiv6").style.display = "none";
          document.getElementById("orderdiv7").style.display = "block";
          document.getElementById("orderdiv8").style.display = "none";
          document.getElementById("orderdiv9").style.display = "none";
          document.getElementById("orderdiv10").style.display = "none";
          document.getElementById("orderdiv11").style.display = "none";

          document.getElementById("customerdiv").style.display = "none";
        }
        function ord8() {
          document.getElementById("orderdiv1").style.display = "none";
          document.getElementById("orderdiv2").style.display = "none";
          document.getElementById("orderdiv3").style.display = "none";
          document.getElementById("orderdiv4").style.display = "none";
          document.getElementById("orderdiv5").style.display = "none";
          document.getElementById("orderdiv6").style.display = "none";
          document.getElementById("orderdiv7").style.display = "none";
          document.getElementById("orderdiv8").style.display = "block";
          document.getElementById("orderdiv9").style.display = "none";
          document.getElementById("orderdiv10").style.display = "none";
          document.getElementById("orderdiv11").style.display = "none";

          document.getElementById("customerdiv").style.display = "none";
        }
        function ord9() {
          document.getElementById("orderdiv1").style.display = "none";
          document.getElementById("orderdiv2").style.display = "none";
          document.getElementById("orderdiv3").style.display = "none";
          document.getElementById("orderdiv4").style.display = "none";
          document.getElementById("orderdiv5").style.display = "none";
          document.getElementById("orderdiv6").style.display = "none";
          document.getElementById("orderdiv7").style.display = "none";
          document.getElementById("orderdiv8").style.display = "none";
          document.getElementById("orderdiv9").style.display = "block";
          document.getElementById("orderdiv10").style.display = "none";
          document.getElementById("orderdiv11").style.display = "none";

          document.getElementById("customerdiv").style.display = "none";
        }
        function ord10() {
          document.getElementById("orderdiv1").style.display = "none";
          document.getElementById("orderdiv2").style.display = "none";
          document.getElementById("orderdiv3").style.display = "none";
          document.getElementById("orderdiv4").style.display = "none";
          document.getElementById("orderdiv5").style.display = "none";
          document.getElementById("orderdiv6").style.display = "none";
          document.getElementById("orderdiv7").style.display = "none";
          document.getElementById("orderdiv8").style.display = "none";
          document.getElementById("orderdiv9").style.display = "none";
          document.getElementById("orderdiv10").style.display = "block";
          document.getElementById("orderdiv11").style.display = "none";

          document.getElementById("customerdiv").style.display = "none";
        }
        function ord11() {
          document.getElementById("orderdiv1").style.display = "none";
          document.getElementById("orderdiv2").style.display = "none";
          document.getElementById("orderdiv3").style.display = "none";
          document.getElementById("orderdiv4").style.display = "none";
          document.getElementById("orderdiv5").style.display = "none";
          document.getElementById("orderdiv6").style.display = "none";
          document.getElementById("orderdiv7").style.display = "none";
          document.getElementById("orderdiv8").style.display = "none";
          document.getElementById("orderdiv9").style.display = "none";
          document.getElementById("orderdiv10").style.display = "none";
          document.getElementById("orderdiv11").style.display = "block";

          document.getElementById("customerdiv").style.display = "none";
        }
      </script>
</body>
</html>