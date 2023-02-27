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

if(isset($_POST['customer_submit'])){
  $firstname = mysqli_real_escape_string($conn, $_POST["firstname"]);
	$lastname = mysqli_real_escape_string($conn, $_POST["lastname"]);
  $company = mysqli_real_escape_string($conn, $_POST["company"]);
	$address = mysqli_real_escape_string($conn, $_POST["address"]);
  $zip = mysqli_real_escape_string($conn, $_POST["zip"]);
	$city = mysqli_real_escape_string($conn, $_POST["city"]);
  $country = mysqli_real_escape_string($conn, $_POST["country"]);
	$email = mysqli_real_escape_string($conn, $_POST["email"]);
  $telephone = mysqli_real_escape_string($conn, $_POST["telephone"]);
	$representative = mysqli_real_escape_string($conn, $_POST["representative"]);
  $current_timestamp = time();
  $lastupdate = date('d-m-Y H:i:s', $current_timestamp);

  
  $sql = "INSERT INTO customers (firstname, lastname, company, addr, zip, city, country, email, telephone, representative, lastupdate) VALUES ('$firstname', '$lastname', '$company', '$address', '$zip', '$city', '$country', '$email', '$telephone', '$representative', '$lastupdate')";
  if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
if(isset($_POST['order_submit'])){
  $customer_id = mysqli_real_escape_string($conn, $_POST["customerid"]);
	$lastname = mysqli_real_escape_string($conn, $_POST["customerlastname"]);
  $category = mysqli_real_escape_string($conn, $_POST["category"]);
	$first_status = mysqli_real_escape_string($conn, $_POST["addstatus"]);
  $current_timestamp = time();
  $first_update = date('d-m-Y H:i:s', $current_timestamp);
	$representive = mysqli_real_escape_string($conn, $_POST["representative"]);
  
  $sql = "INSERT INTO orders (customer_id, name, category, first_status, first_update, representative) VALUES ('$customer_id', '$lastname', '$category', '$first_status', '$first_update', '$representative')";
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />    
    <link rel="stylesheet" href="css/admin-panel.css">
    <link rel="stylesheet" href="css/customer.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="icon" type="image/x-icon" href="assets/crm.png">
    <title>Customers</title>
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
            <li class="sidebar-list-item">
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
            <li class="sidebar-list-item active">
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
          <div class="account-info" onclick="alert('MY ACCOUNT');">
            <div class="account-info-picture" >
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
            <h1 class="app-content-headerText">Customers</h1>
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
                    <input class="customer-input" type="text" name="representative" id="representative" placeholder="Representative/Salesman">
                    <br>
                    <button class="customer-button reset" type="reset">Reset</button>
                    <br>
                    <button class="customer-button apply" type="submit" name="customer_submit" value="submit">Apply</button>                  
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
              <button class="action-button list" title="List View">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
              </button>
              <button class="action-button grid active" title="Grid View">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
              </button>
            </div>
          </div>
          <div class="products-area-wrapper tableView">
            <div class="products-header">
              <div class="product-cell image">Name<button class="sort-button">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
                </button></div>
              <div class="product-cell category">Company<button class="sort-button">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
                </button></div>
              <div class="product-cell status-cell">Address<button class="sort-button">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
                </button></div>
              <div class="product-cell sales">E-Mail<button class="sort-button">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
                </button></div>
              <div class="product-cell stock">Telephone<button class="sort-button">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
                </button></div>
              <div class="product-cell price">Representative<button class="sort-button">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
                </button></div>
                <div class="product-cell price">User Last Update:<button class="sort-button">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
                </button></div>
                <div class="product-cell price">Archive<button class="sort-button">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
                </button></div>
            </div>
            <?php
              //DIV FOR EACH CUSTOMER
              //END DIV FOR EACH CUSTOMER
              $sql = 'SELECT * FROM customers';
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                // Output data of each row
                  while($row = $result->fetch_assoc()) {
                    // Create divs based on the data
                    echo '<div class="products-row" onclick="cartela(\''.$row['id'].'\', \''.$row['firstname'].'\', \''.$row['lastname'].'\')">';
                    echo '<button id="menupopup" class="cell-more-button" onclick="moreoptions(\''.$row['id'].'\', \''.$row['firstname'].'\', \''.$row['lastname'].'\')";><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg></button>';
                    echo '<div class="product-cell image"><!--IMAGE GOES HERE--><span>' . $row['firstname'] .' '. $row['lastname'] . '</span></div>';
                    echo '<div class="product-cell category"><span class="cell-label">Company:</span>' . $row['company'] .'</div>';
                    echo '<div class="product-cell sales"><span class="cell-label">Address:</span><span style="text-align: right;">' . $row['addr'] .','. $row['zip'] . ','. $row['city'] .' '. $row['country'] .'</span></div>';
                    echo '<div class="product-cell sales"><span class="cell-label">E-Mail:</span>' . $row['email'] .'</div>';
                    echo '<div class="product-cell stock"><span class="cell-label">Telephone:</span>' . $row['telephone'] .'</div>';
                    echo '<div class="product-cell price"><span class="cell-label">Representative:</span>' . $row['representative'] .'</div>';
                    echo '<div class="product-cell price"><span class="cell-label">Status Last Order:</span><span class="status active">' . $row['lastupdate'] .'</span></div>';
                    echo '<div class="product-cell price"><span class="cell-label">Archive:</span>' . $row['archive'] .'</div>';
                    echo '</div>';
                  }
                }
            ?>
          </div>
        </div>
      </div>
      <div id="menumodal" class="w3-modal">
        <div class="w3-modal-content w3-animate-top w3-card-4">
          <span class="close">&times;</span>
          <h2>Add Order</h2>
            <form action="" method="post" style="width:100% !important;">
              <div class="total-group">
                <label class="total-label">ID:</label>
                <input class="modal-input deactivated" type="text" data-noreset="true" name="customerid" id="customerid" readonly>
              </div>
  		        <div class="total-group">
    		        <label class="total-label">Lastname:</label>
    		        <input class="modal-input deactivated" type="text" data-noreset="true" name="customerlastname" id="customerlastname" readonly>
  		        </div>
              <div class="total-group">
    		        <label class="total-label">Category:</label>
    		        <input class="modal-input" type="text" name="category" id="category">
  		        </div>
              <div class="total-group">
    		        <label class="total-label">Status:</label>
                <select class="modal-select" name="addstatus" id="addstatus">
                    <option value="Customer Order">Customer Order</option>
                    <option value="GRUPPOCASA->FACTORY ORD">GRUPPOCASA->FACTORY</option>
                    <option value="FACTORY->CUSTOMER PF">FACTORY->CUSTOMER (PROFORMA)</option>
                    <option value="GRUPPOCASA->CUSTOMER PF">GRUPPOCASA->CUSTOMER (PROFORMA)</option>
                    <option value="CUSTOMER->GRUPPOCASA">CUSTOMER->GRUPPOCASA (CONFIRMATION)</option>
                    <option value="GRUPPOCASA->FACTORY">GRUPPOCASA->FACTORY (CONFIRMATION)</option>
                    <option value="Advance payment 1">Advance payment 1</option>
                    <option value="Advance payment 2">Advance payment 2</option>
                    <option value="Invoices">Invoices</option>
                    <option value="Final payment">Final payment</option>
                    <option value="shipped">Order Shipped</option>
                </select>             
  		        </div>
              <div class="total-group">
    		        <label class="total-label">Representative:</label>
    		        <input class="modal-input" type="text" name="representative" id="representative">
  		        </div>
              <br>
              <div class="buttons-center">
                <button class="modal-button-blue" type="button" onclick="customReset()">Reset</button>
                <button class="modal-button-green" type="submit" name="order_submit" value="submit">Apply</button>
              </div>
            </form>
        </div>
      </div>
      <div id="customermodal" class="w3-modal">
        <div class="w3-modal-content w3-animate-top w3-card-4">
          <span class="close ct">&times;</span>
          <h2 id="customername">Customer</h2>
          <input class="modal-input deactivated" type="text" data-noreset="true" name="cartelacustomerid" id="cartelacustomerid" readonly>
          <div class="customer-container" id="customercontainer">
                    <div id="btn-group" class="column full">
                      <button id="factory1" onclick="factory(this.id)">Factory1</button>
                      <button id="factory2" onclick="factory(this.id)">Factory2</button>
                      <button id="factory3" onclick="factory(this.id)">Factory3</button>
                      <button id="factory4" onclick="factory(this.id)">Factory4</button>
                      <button id="factory5" onclick="factory(this.id)">Factory5</button>
                      <button id="factory6" onclick="factory(this.id)">Factory6</button>
                      <button id="factory7" onclick="factory(this.id)">Factory7</button>
                      <button id="factory8" onclick="factory(this.id)">Factory8</button>
                      <button id="factory9" onclick="factory(this.id)">Factory9</button>
                      <button id="factory10" onclick="factory(this.id)">Factory10</button>
                      <button id="factory11" onclick="factory(this.id)">Factory11</button>
                    </div>
                    <br>
                    <div class="row">
                      <div class="column left">
                        <?php
                          $sql = "SELECT * FROM orders";
                          $result = mysqli_query($conn, $sql);
                          $orders = array();
                          while ($row = mysqli_fetch_assoc($result)){
                            $orders[] = $row;
                          }
                        ?>
                        <div style="text-align: right;">
                          <select class="orders-select" name="orders">
                          <?php foreach ($orders as $order) { ?>
                            <option value="<?php echo $order['id']; ?>"><?php echo $order['first_update']; ?></option>
                          <?php } ?>
                          </select>
                        </div>

                      <!--DETAILED ORDER STATUS OF LAST ORDER / BIT CAN SELECT ORDER FROM DROPDOWN MENU-->
                      <div class="detailed-order">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="margin-left: 15px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>
                        <label for="" class="label-customer">Customer Order</label>
                        <span class="span-customer">-</span>
                      </div>
                      <div class="detailed-order">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="margin-left: 15px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg>
                        <label for="" class="label-customer">GRUPPOCASA->FACTORY</label>
                        <span class="span-customer">-</span>
                      </div>
                      <div class="detailed-order">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="margin-left: 15px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                        <label for="" class="label-customer">FACTORY->CUSTOMER (PROFORMA)</label>
                        <span class="span-customer">-</span>
                      </div>
                      <div class="detailed-order">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="margin-left: 15px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                        <label for="" class="label-customer">GRUPPOCASA->CUSTOMER (PROFORMA)</label>
                        <span class="span-customer">-</span>
                      </div>
                      <div class="detailed-order">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="margin-left: 15px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                        <label for="" class="label-customer">CUSTOMER->GRUPPOCASA (CONFIRMATION)</label>
                        <span class="span-customer">-</span>
                      </div>
                      <div class="detailed-order">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="margin-left: 15px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                        <label for="" class="label-customer">GRUPPOCASA->FACTORY (CONFIRMATION)</label>
                        <span class="span-customer">-</span>
                      </div>
                      <div class="detailed-order">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="margin-left: 15px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                        <label for="" class="label-customer">Advance payment 1</label>
                        <span class="span-customer">-</span>
                      </div>
                      <div class="detailed-order">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="margin-left: 15px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                        <label for="" class="label-customer">Advance payment 2</label>
                        <span class="span-customer">-</span>
                      </div>
                      <div class="detailed-order">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="margin-left: 15px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                        <label for="" class="label-customer">Invoices</label>
                        <span class="span-customer">-</span>
                      </div>
                      <div class="detailed-order">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="margin-left: 15px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                        <label for="" class="label-customer">Final payment</label>
                        <span class="span-customer">-</span>
                      </div>
                      <div class="detailed-order">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="margin-left: 15px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-package"><line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                        <label for="" class="label-customer">Order Shipped</label>
                        <span class="span-customer">-</span>
                      </div>  
                      <!--END DETAILED ORDER-->
                      </div>
                      <div class="column right">
                    <!--DATA ARCHIVE-->
                    <div class="products-area-wrapper tableView2">
                      <div class="products-header2">
                        <div class="product-cell2 img">
                          <span>Data Archive</span>
                        </div>
                      </div>
                        <div id="main-content" class="file_manager">
                          <div class="container">
                            <div class="row clearfix">
                              
                              <div class="col-lg-3 col-md-4 col-sm-12 custom-card">
                                <div class="card">
                                  <div class="file">
                                    <a href="javascript:void(0);">
                                      <div class="hover">
                                        <button type="button" class="btn btn-icon btn-danger">
                                          <i class="fa fa-trash"></i>
                                        </button>
                                      </div>
                                      <div class="icon">
                                        <i class="fa fa-file text-info"></i>
                                      </div>
                                      <div class="file-name">
                                        <p class="m-b-5 text-muted">Document_2017.doc</p>
                                        <small><span class="date text-muted">Nov 02, 2017</span></small>
                                      </div>
                                    </a>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-3 col-md-4 col-sm-12 custom-card">
                                <div class="card">
                                  <div class="file">
                                    <a href="javascript:void(0);">
                                      <div class="hover">
                                        <button type="button" class="btn btn-icon btn-danger">
                                          <i class="fa fa-trash"></i>
                                        </button>
                                      </div>
                                      <div class="icon">
                                        <i class="fa fa-file text-info"></i>
                                      </div>
                                      <div class="file-name">
                                        <p class="m-b-5 text-muted">Document_2017.doc</p>
                                        <small><span class="date text-muted">Nov 02, 2017</span></small>
                                      </div>
                                    </a>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-3 col-md-4 col-sm-12 custom-card">
                                <div class="card">
                                  <div class="file">
                                    <a href="javascript:void(0);">
                                      <div class="hover">
                                        <button type="button" class="btn btn-icon btn-danger">
                                          <i class="fa fa-trash"></i>
                                        </button>
                                      </div>
                                      <div class="icon">
                                        <i class="fa fa-file text-info"></i>
                                      </div>
                                      <div class="file-name">
                                        <p class="m-b-5 text-muted">Document_2017.doc</p>
                                        <small><span class="date text-muted">Nov 02, 2017</span></small>
                                      </div>
                                    </a>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-3 col-md-4 col-sm-12 custom-card">
                                <div class="card">
                                  <div class="file">
                                    <a href="javascript:void(0);">
                                      <div class="hover">
                                        <button type="button" class="btn btn-icon btn-danger">
                                          <i class="fa fa-trash"></i>
                                        </button>
                                      </div>
                                      <div class="icon">
                                        <i class="fa fa-file text-info"></i>
                                      </div>
                                      <div class="file-name">
                                        <p class="m-b-5 text-muted">Document_2017.doc</p>
                                        <small><span class="date text-muted">Nov 02, 2017</span></small>
                                      </div>
                                    </a>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-3 col-md-4 col-sm-12 custom-card">
                                <div class="card">
                                  <div class="file">
                                    <a href="javascript:void(0);">
                                      <div class="hover">
                                        <button type="button" class="btn btn-icon btn-danger">
                                          <i class="fa fa-trash"></i>
                                        </button>
                                      </div>
                                      <div class="icon">
                                        <i class="fa fa-file text-info"></i>
                                      </div>
                                      <div class="file-name">
                                        <p class="m-b-5 text-muted">Document_2017.doc</p>
                                        <small><span class="date text-muted">Nov 02, 2017</span></small>
                                      </div>
                                    </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                          </div>
                        </div>
                      </div>
                    <!--END DATA ARCHIVE-->  
                    </div>   
        </div>
      </div>
</div>
    <script>
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
            document.querySelector(".products-area-wrapper").classList.remove("tableView");
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
        var x = window.matchMedia("(max-width: 6000px)")
        gridcontent(x) // Call listener function at run time
        x.addListener(gridcontent) // Attach listener function on state changes
        /////////////////////CUSTOM CUSTOMER CARTELA //////////////////////////////
        function factory(clicked_id){
          alert(clicked_id);
        }
        //MENU MODAL
        const modal = document.getElementById("menumodal");
        const span = document.getElementsByClassName("close")[0];
        const ctmodal = document.getElementById("customermodal");
        const ctspan = document.getElementsByClassName("ct")[0];
        function moreoptions(id,fname,lname) {
          event.stopPropagation();
          modal.style.display = "block";
          document.getElementById('customerid').value = id;
          document.getElementById('customerlastname').value = fname +' '+ lname;
        }
        function cartela(id,fname,lname) {
          ctmodal.style.display = "block";
          document.getElementById('cartelacustomerid').value = id;
          document.getElementById('customername').innerHTML = fname +' '+ lname;
        }        
        span.onclick = function() {
          modal.style.display = "none";
        }
        ctspan.onclick = function() {
          ctmodal.style.display = "none";
        }
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
          if (event.target == ctmodal) {
            ctmodal.style.display = "none";
          }
        }
        function customReset(){
          var fieldsToReset = document.querySelectorAll("input:not([data-noreset='true'])")
          for(var i=0;i<fieldsToReset.length;i++){
            fieldsToReset[i].value = null;
          }
        }
        //////////////////////////////////////////////////////////////////////////////////////
      </script>
</body>
</html>