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
    echo '<br>';
    $sql = "SELECT * FROM customers WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
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
  <link rel="stylesheet" href="css/customercartela.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="icon" type="image/x-icon" href="assets/crm.png">
  <title><?php echo $row['firstname'];; echo ' '; echo $row['lastname']?></title>
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
            <li class="sidebar-list-item active">
              <a href="">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path></svg>
              <span class="sidepar-span"><?php echo $row['firstname']; echo ' '; echo $row['lastname'];?></span>
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
                <h1 class="app-content-headerText"><?php echo $row['firstname']; echo ' '; echo $row['lastname'];?></h1>
                <button class="mode-switch" title="Switch Theme">
                    <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
                        <defs></defs>
                        <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
                    </svg>
                </button>
                <button class="app-content-headerButton">Update</button>
            </div>
            <div class="app-content-actions" hidden>
                <div class="app-content-actions-wrapper"hidden>
                    <div class="filter-button-wrapper"hidden>
                        <button class="action-button jsFilter" hidden></button>
                    </div>
                    <div hidden>
                        <button class="action-button list active" title="List View"></button>
                        <button class="action-button grid" title="Grid View"></button>
                    </div>
                </div>
            </div>
            <div class="products-area-wrapper tableView">
                <h1>Custom Folder Code Goes Here</h1>
            </div>
        </div>
    </div>
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
    </script>
</body>
</html>