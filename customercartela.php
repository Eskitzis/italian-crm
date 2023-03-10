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
    $fname = $_GET['firstname'];
    $lname = $_GET['lastname'];
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
  <title><?php echo $fname; echo ' '; echo $lname;?></title>
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
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>                <span class="sidepar-span"><?php echo $fname; echo ' '; echo $lname;?></span>
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
            <h1 class="app-content-headerText"><?php echo $fname; echo ' '; echo $lname;?></h1>
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
            <div style="float:right;">
              <input class="customerid deactivated" style="text-align: center;" type="text" data-noreset="true" value="<?php $id = $_GET['id']; echo "$id";?>" readonly>
            </div>
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
                <!--DATA ARCHIVE-->
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
              <div class="column right">
              <div>
	              <div class="leftdiv">
	                <h3>Detailed Order Status</h3>
	              </div>
	              <div style="float:right;">
                  <?php
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM orders WHERE customer_id = '$id'";
                    $result = $conn->query($sql);
                    $orders = array();
                    while ($row = mysqli_fetch_assoc($result)){
                      $orders[] = $row;
                    }
                  ?>
                  <select class="select-order" name="orders">
                    <?php foreach ($orders as $order) { ?>
                      <option value="<?php echo $order['id']; ?>"><?php echo $order['first_update']; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <br>
              <br>
              <br>
              <!--DETAILED ORDER STATUS OF LAST ORDER / BIT CAN SELECT ORDER FROM DROPDOWN MENU-->
              <div class="detailed-order">
	              <div>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="margin-left: 15px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>
                  <label for="" class="label-customer">Customer Order</label>
                  <?php
                    $sql = "SELECT * FROM order_status WHERE order_status = 'Customer Order' AND customer_id = '$id'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    echo '<span class="span-customer">'.$row['order_update'].'</span>';
                  ?>
                </div>
              </div>
              <div class="detailed-order">
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="margin-left: 15px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg>
                  <label for="" class="label-customer">GRUPPOCASA->FACTORY</label>
                  <?php
                    $sql = "SELECT * FROM order_status WHERE order_status = 'GRUPPOCASA->FACTORY' AND customer_id = '$id'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    echo '<span class="span-customer">'.$row['order_update'].'</span>';
                  ?>
                </div>
              </div>
              <div class="detailed-order">
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="margin-left: 15px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                    <label for="" class="label-customer">FACTORY->CUSTOMER (PROFORMA)</label>
                    <?php
                    $sql = "SELECT * FROM order_status WHERE order_status = 'FACTORY->CUSTOMER (PROFORMA)' AND customer_id = '$id'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    echo '<span class="span-customer">'.$row['order_update'].'</span>';
                  ?>     
                </div>           
              </div>
              <div class="detailed-order">
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="margin-left: 15px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                  <label for="" class="label-customer">GRUPPOCASA->CUSTOMER (PROFORMA)</label>
                  <?php
                    $sql = "SELECT * FROM order_status WHERE order_status = 'GRUPPOCASA->CUSTOMER (PROFORMA)' AND customer_id = '$id'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    echo '<span class="span-customer">'.$row['order_update'].'</span>';
                  ?>    
                </div>            
              </div>
              <div class="detailed-order">
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="margin-left: 15px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                  <label for="" class="label-customer">CUSTOMER->GRUPPOCASA (CONFIRMATION)</label>
                  <?php
                    $sql = "SELECT * FROM order_status WHERE order_status = 'CUSTOMER->GRUPPOCASA (CONFIRMATION)' AND customer_id = '$id'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    echo '<span class="span-customer">'.$row['order_update'].'</span>';
                  ?>    
                </div>            
              </div>
              <div class="detailed-order">
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="margin-left: 15px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                  <label for="" class="label-customer">GRUPPOCASA->FACTORY (CONFIRMATION)</label>
                  <?php
                    $sql = "SELECT * FROM order_status WHERE order_status = 'GRUPPOCASA->FACTORY (CONFIRMATION)' AND customer_id = '$id'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    echo '<span class="span-customer">'.$row['order_update'].'</span>';
                  ?>     
                </div>           
              </div>
              <div class="detailed-order">
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="margin-left: 15px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                  <label for="" class="label-customer">Advance payment 1</label>
                  <?php
                    $sql = "SELECT * FROM order_status WHERE order_status = 'Advance payment 1' AND customer_id = '$id'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    echo '<span class="span-customer">'.$row['order_update'].'</span>';
                  ?>  
                </div>             
              </div>
              <div class="detailed-order">
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="margin-left: 15px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                  <label for="" class="label-customer">Advance payment 2</label>
                  <?php
                    $sql = "SELECT * FROM order_status WHERE order_status = 'Advance payment 2' AND customer_id = '$id'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    echo '<span class="span-customer">'.$row['order_update'].'</span>';
                  ?>   
                </div>            
              </div>
              <div class="detailed-order">
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="margin-left: 15px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                  <label for="" class="label-customer">Invoices</label>
                  <?php
                    $sql = "SELECT * FROM order_status WHERE order_status = 'Invoices' AND customer_id = '$id'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    echo '<span class="span-customer">'.$row['order_update'].'</span>';
                  ?>     
                </div>           
              </div>
              <div class="detailed-order">
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="margin-left: 15px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                  <label for="" class="label-customer">Final payment</label>
                  <?php
                    $sql = "SELECT * FROM order_status WHERE order_status = 'Final payment' AND customer_id = '$id'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    echo '<span class="span-customer">'.$row['order_update'].'</span>';
                  ?>      
                </div>          
              </div>
              <div class="detailed-order">
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="margin-left: 15px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-package"><line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                  <label for="" class="label-customer">Order Shipped</label>
                  <?php
                    $sql = "SELECT * FROM order_status WHERE order_status = 'Order Shipped' AND customer_id = '$id'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    echo '<span class="span-customer">'.$row['order_update'].'</span>';
                  ?>
                </div>
              </div>  
	            <!--END DETAILED ORDER-->
            </div>
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