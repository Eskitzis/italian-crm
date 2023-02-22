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
	$address = mysqli_real_escape_string($conn, $_POST["address"]);
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
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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
                <div class="product-cell price">Factorys<button class="sort-button">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
                </button></div>
                <div class="product-cell price">Status Last Order<button class="sort-button">
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
                echo $customercartela; 
                if ($result->num_rows > 0) {
                $customercartela = '
                  <div class="customer-container" id="customercontainer" style="display: none;">
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
                    <div class="row">
                      <div class="column left">
                    <!--DETAILED ORDER STATUS OF LAST ORDER / BIT CAN SELECT ORDER FROM DROPDOWN MENU-->
                    <div class="products-area-wrapper tableView2">
                      <div class="products-header2">
                        <div class="product-cell2 img">
                          <span>Detaileid Order Status</span>
                        </div>
                      </div>
                    </div>
                    <div class="products-row2">
                      <div class="product-cell2 img">
                        <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-cart-plus svg-customer" viewBox="0 0 16 16"><path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"/><path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/></svg>                  
                        <p class="span-order">Pre-Order</p>
                          <p class="span-order-right">-</p>
                      </div>
                    </div>
                    <div class="products-row2">
                      <div class="product-cell2 img">
                        <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-envelope-paper-fill svg-customer" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M6.5 9.5 3 7.5v-6A1.5 1.5 0 0 1 4.5 0h7A1.5 1.5 0 0 1 13 1.5v6l-3.5 2L8 8.75l-1.5.75ZM1.059 3.635 2 3.133v3.753L0 5.713V5.4a2 2 0 0 1 1.059-1.765ZM16 5.713l-2 1.173V3.133l.941.502A2 2 0 0 1 16 5.4v.313Zm0 1.16-5.693 3.337L16 13.372v-6.5Zm-8 3.199 7.941 4.412A2 2 0 0 1 14 16H2a2 2 0 0 1-1.941-1.516L8 10.072Zm-8 3.3 5.693-3.162L0 6.873v6.5Z"/></svg>                            
                          <p class="span-order">Offer to Customer</p>
                          <p class="span-order-right">-</p>                    
                      </div>
                    </div>
                    <div class="products-row2">
                      <div class="product-cell2 img">
                        <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-currency-exchange svg-customer" viewBox="0 0 16 16"><path d="M0 5a5.002 5.002 0 0 0 4.027 4.905 6.46 6.46 0 0 1 .544-2.073C3.695 7.536 3.132 6.864 3 5.91h-.5v-.426h.466V5.05c0-.046 0-.093.004-.135H2.5v-.427h.511C3.236 3.24 4.213 2.5 5.681 2.5c.316 0 .59.031.819.085v.733a3.46 3.46 0 0 0-.815-.082c-.919 0-1.538.466-1.734 1.252h1.917v.427h-1.98c-.003.046-.003.097-.003.147v.422h1.983v.427H3.93c.118.602.468 1.03 1.005 1.229a6.5 6.5 0 0 1 4.97-3.113A5.002 5.002 0 0 0 0 5zm16 5.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0zm-7.75 1.322c.069.835.746 1.485 1.964 1.562V14h.54v-.62c1.259-.086 1.996-.74 1.996-1.69 0-.865-.563-1.31-1.57-1.54l-.426-.1V8.374c.54.06.884.347.966.745h.948c-.07-.804-.779-1.433-1.914-1.502V7h-.54v.629c-1.076.103-1.808.732-1.808 1.622 0 .787.544 1.288 1.45 1.493l.358.085v1.78c-.554-.08-.92-.376-1.003-.787H8.25zm1.96-1.895c-.532-.12-.82-.364-.82-.732 0-.41.311-.719.824-.809v1.54h-.005zm.622 1.044c.645.145.943.38.943.796 0 .474-.37.8-1.02.86v-1.674l.077.018z"/></svg>
                        <p class="span-order">Payment Received</p>
                        <p class="span-order-right">20.12.2002</p>                   
                      </div>
                    </div>
                    <div class="products-row2">
                      <div class="product-cell2 img">
                        <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-pencil-square svg-customer" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg>
                        <p class="span-order">Order to Factory</p>
                        <p class="span-order-right">-</p> 
                      </div>
                    </div>
                    <div class="products-row2">
                      <div class="product-cell2 img">
                        <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-receipt-cutoff svg-customer" viewBox="0 0 16 16"><path d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zM11.5 4a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z"/><path d="M2.354.646a.5.5 0 0 0-.801.13l-.5 1A.5.5 0 0 0 1 2v13H.5a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1H15V2a.5.5 0 0 0-.053-.224l-.5-1a.5.5 0 0 0-.8-.13L13 1.293l-.646-.647a.5.5 0 0 0-.708 0L11 1.293l-.646-.647a.5.5 0 0 0-.708 0L9 1.293 8.354.646a.5.5 0 0 0-.708 0L7 1.293 6.354.646a.5.5 0 0 0-.708 0L5 1.293 4.354.646a.5.5 0 0 0-.708 0L3 1.293 2.354.646zm-.217 1.198.51.51a.5.5 0 0 0 .707 0L4 1.707l.646.647a.5.5 0 0 0 .708 0L6 1.707l.646.647a.5.5 0 0 0 .708 0L8 1.707l.646.647a.5.5 0 0 0 .708 0L10 1.707l.646.647a.5.5 0 0 0 .708 0L12 1.707l.646.647a.5.5 0 0 0 .708 0l.509-.51.137.274V15H2V2.118l.137-.274z"/></svg>
                        <p class="span-order">Order Received</p>
                        <p class="span-order-right">-</p> 
                      </div>
                    </div>
                    <div class="products-row2">
                      <div class="product-cell2 img">
                        <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-clipboard-check svg-customer" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/><path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/><path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/></svg>                
                        <p class="span-order">Complete</p>
                        <p class="span-order-right">-</p> 
                      </div>
                    </div>
                    <div class="products-row2">
                      <div class="product-cell2 img">
                        <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-truck svg-customer" viewBox="0 0 16 16"><path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/></svg>
                        <p class="span-order">Order to Customer</p>
                        <p class="span-order-right">-</p> 
                      </div>
                    </div>
                    <div class="products-row2">
                      <div class="product-cell2 img">
                        <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-check-square svg-customer" viewBox="0 0 16 16"><path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/><path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z"/></svg>
                        <p class="span-order">Arrived</p>
                        <p class="span-order-right">-</p> 
                      </div>
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
                ';
                // Output data of each row
                  while($row = $result->fetch_assoc()) {
                    // Create divs based on the data
                    echo '<div class="products-row" id="customer1" onclick="cartela(this.id)">';
                    echo '<button id="menupopup" class="cell-more-button " onclick="moreoptions(' . $row['id'] .')"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg></button>';
                    echo '<div class="product-cell image"><!--IMAGE GOES HERE--><span>' . $row['firstname'] .' '. $row['lastname'] . '</span></div>';
                    echo '<div class="product-cell category"><span class="cell-label">Company:</span>' . $row['company'] .'</div>';
                    echo '<div class="product-cell status-cell"><span class="cell-label">Address:</span><span>' . $row['addr'] .','. $row['zip'] . ','. $row['city'] .' '. $row['country'] .'</span></div>';
                    echo '<div class="product-cell sales"><span class="cell-label">E-Mail:</span>' . $row['email'] .'</div>';
                    echo '<div class="product-cell stock"><span class="cell-label">Telephone:</span>' . $row['telephone'] .'</div>';
                    echo '<div class="product-cell price"><span class="cell-label">Representative:</span>' . $row['representive'] .'</div>';
                    echo '<div class="product-cell price"><span class="cell-label">Factorys:</span>' . $row['factorys'] .'</div>';
                    echo '<div class="product-cell price"><span class="cell-label">Status Last Order:</span><span class="status active">' . $row['lastupdate'] .'</span></div>';
                    echo '<div class="product-cell price"><span class="cell-label">Archive:</span>' . $row['archive'] .'</div>';
                    echo '</div>';
                    //echo $customercartela;
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
            <form action="" style="width:100% !important;">
              <div class="total-group">
                <label class="total-label">ID:</label>
                <input class="modal-input deactivated" type="text" data-noreset="true" name="customerid" id="customerid" disabled>
              </div>
  		        <div class="total-group">
    		        <label class="total-label">Lastname:</label>
    		        <input class="modal-input deactivated" type="text" data-noreset="true" name="customerlastname" id="customerlastname" disabled>
  		        </div>
              <div class="total-group">
    		        <label class="total-label">Category:</label>
    		        <input class="modal-input" type="text" name="" id="">
  		        </div>
              <div class="total-group">
    		        <label class="total-label">Status:</label>
                <select class="modal-select" name="addstatus" id="addstatus">
                    <option value="orderfromcustomer">Customer Order</option>
                    <option value="orderfromus">GRUPPOCASA->FACTORY</option>
                    <option value="proformafromfactory">FACTORY->CUSTOMER (PROFORMA)</option>
                    <option value="proformafromus">GRUPPOCASA->CUSTOMER (PROFORMA)</option>
                    <option value="confirmationfromcustomer">CUSTOMER->GRUPPOCASA (CONFIRMATION)</option>
                    <option value="confirmationtoitaly">GRUPPOCASA->FACTORY (CONFIRMATION)</option>
                    <option value="advance1">Advance payment 1</option>
                    <option value="advance2">Advance payment 2</option>
                    <option value="invoice">Invoices</option>
                    <option value="final">Final payment</option>
                    <option value="shipped">Order Shipped</option>
                </select>             
  		        </div>
              <div class="total-group">
    		        <label class="total-label">Representive:</label>
    		        <input class="modal-input" type="text" name="" id="">
  		        </div>
              <br>
              <div class="buttons-center">
                <button class="modal-button-blue" type="button" onclick="customReset()">Reset</button>
                <button class="modal-button-green" type="submit" value="submit">Apply</button>
              </div>
            </form>
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
        function cartela(clicked_customer) {
          var c = document.getElementById("customercontainer");
          if (c.style.display === "none") {
            c.style.display = "block";
          } else {
            c.style.display = "none";
          }
          //alert(clicked_customer);
        }
        //////////////////////////////////////////////////////////////////////////////////////
        function factory(clicked_id){
          alert(clicked_id);
        }
        //MENU MODAL
        const modal = document.getElementById("menumodal");
        const span = document.getElementsByClassName("close")[0];
        function moreoptions(id) {
          modal.style.display = "block";
          document.getElementById('customerid').value = id;
        }
        span.onclick = function() {
          modal.style.display = "none";
        }
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
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