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
              <a href="home.html">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                <span class="sidepar-span">Home</span>
              </a>
            </li>
            <li class="sidebar-list-item">
              <a href="catalogs.html">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book-open"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>                
                <span class="sidepar-span">Catalogs</span>
              </a>
            </li>
            <li class="sidebar-list-item">
              <a href="factorys.html">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tool"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>                
                <span class="sidepar-span">Factorys</span>
              </a>
            </li>
            <li class="sidebar-list-item">
              <a href="orders.html">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pie-chart"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path><path d="M22 12A10 10 0 0 0 12 2v10z"></path></svg>
                <span class="sidepar-span">Orders</span>
              </a>
            </li>
            <li class="sidebar-list-item">
              <a href="customers.html">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>                
                <span class="sidepar-span">Customers</span>
              </a>
            </li>
            <li class="sidebar-list-item">
              <a href="admin.html">
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
                  <input class="customer-input" type="text" name="name" id="name" placeholder="Name">
                  <br>
                  <input class="customer-input" type="text" name="company" id="company" placeholder="Company">
                  <br>
                  <input class="customer-input" type="text" name="address" id="address" placeholder="Address">
                  <br>
                  <input class="customer-input" type="email" name="email" id="email" placeholder="E-Mail">
                  <br>
                  <input class="customer-input" type="text" name="telephone" id="telephone" placeholder="Telephone">
                  <br>
                  <input class="customer-input" type="text" name="representive" id="representive" placeholder="Representative/Salesman">
                  <br>
                  <button class="customer-button reset" type="reset">
                    Reset
                  </button>
                  <br>
                  <button class="customer-button apply" type="submit" value="submit">
                    Apply
                  </button>                  
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
                    <article class="leaderboard__profile" onclick="cust1()">
                        <img src="https://randomuser.me/api/portraits/men/37.jpg" alt="Evan Spiegel" class="leaderboard__picture">
                        <span class="leaderboard__name">Evan Spiegel</span>
                        <span class="leaderboard__value">20.01.2023<span style="color: black;">B</span></span>
                    </article>

                    <article class="leaderboard__profile" onclick="cust2()">
                        <img src="https://randomuser.me/api/portraits/men/37.jpg" alt="Evan Spiegel" class="leaderboard__picture">
                        <span class="leaderboard__name">Evan Spiegel</span>
                        <span class="leaderboard__value">20.01.2023<span style="color: black;">B</span></span>
                    </article>

                    <article class="leaderboard__profile" onclick="cust3()">
                        <img src="https://randomuser.me/api/portraits/men/37.jpg" alt="Evan Spiegel" class="leaderboard__picture">
                        <span class="leaderboard__name">Evan Spiegel</span>
                        <span class="leaderboard__value">20.01.2023<span style="color: black;">B</span></span>
                    </article>

                    <article class="leaderboard__profile" onclick="cust4()">
                      <img src="https://randomuser.me/api/portraits/men/37.jpg" alt="Evan Spiegel" class="leaderboard__picture">
                      <span class="leaderboard__name">Evan Spiegel</span>
                      <span class="leaderboard__value">20.01.2023<span style="color: black;">B</span></span>
                    </article>

                </div>
                <div class="flex-item-two">
                    <span style="font-size: large;">Detailed Order Status</span>
                    <div class="flex-container">
                        <div class="flex-item-left">
                            <article class="leaderboard__profile" onclick="ord1()">
                                <img src="assets/detailed_order/pre-order.png" alt="Pre-Order" class="leaderboard__icon">
                                <span class="leaderboard__name">Pre-Order</span>
                                <span class="leaderboard__value">20.01.2023<span style="color: black;">A<span style="color: red;">34</span></span></span>
                  
                            </article>
        
                            <article class="leaderboard__profile" onclick="ord2()">
                                <img src="assets/detailed_order/offering-customer.jpg" alt="Offer to Customer" class="leaderboard__icon">
                                <span class="leaderboard__name">Offer to Customer</span>
                                <span class="leaderboard__value">21.01.2023<span style="color: black;">B<span style="color: red;">12</span></span></span>

                            </article>
        
                            <article class="leaderboard__profile" onclick="ord3()">
                                <img src="assets/detailed_order/cost.png" alt="Payment Received" class="leaderboard__icon">
                                <span class="leaderboard__name">Payment Received</span>
                                <span class="leaderboard__value">22.01.2023<span style="color: black;">C<span style="color: red;">31</span></span></span>

                            </article>
        
                            <article class="leaderboard__profile" onclick="ord4()">
                                <img src="assets/detailed_order/factory.png" alt="Order to Factory" class="leaderboard__icon">
                                <span class="leaderboard__name">Order to Factory</span>
                                <span class="leaderboard__value">23.01.2023<span style="color: black;">D<span style="color: red;">24</span></span></span>
                            </article>        
                        </div>
                        <div class="flex-item-right">
                            <article class="leaderboard__profile" onclick="ord5()">
                                <img src="assets/detailed_order/manufacturing.png" alt="Order Received" class="leaderboard__icon">
                                <span class="leaderboard__name">Order Received</span>
                                <span class="leaderboard__value">24.01.2023<span style="color: black;">E<span style="color: red;">34</span></span></span>
                              </article>
        
                            <article class="leaderboard__profile" onclick="ord6()">
                                <img src="assets/detailed_order/order-delivery.png" alt="Complete" class="leaderboard__icon">
                                <span class="leaderboard__name">Complete</span>
                                <span class="leaderboard__value">25.01.2023<span style="color: black;">F<span style="color: red;">0</span></span></span>
                              </article>
        
                            <article class="leaderboard__profile" onclick="ord7()">
                                <img src="assets/detailed_order/fast.png" alt="Order to Customer" class="leaderboard__icon">
                                <span class="leaderboard__name">Order to Customer</span>
                                <span class="leaderboard__value">26.01.2023<span style="color: black;">G<span style="color: red;">23</span></span></span>
                              </article>
        
                            <article class="leaderboard__profile" onclick="ord8()">
                                <img src="assets/detailed_order/order.png" alt="Arrived" class="leaderboard__icon">
                                <span class="leaderboard__name">Arrived</span>
                                <span class="leaderboard__value">27.01.2023<span style="color: black;">H<span style="color: red;">12</span></span></span>
                              </article>
        
                        </div>
                    </div>
                </div>

                  <div id="customerdiv1" class="flex-item-three" style="display:none;"><span style="font-size: large;">Customer Name 1</span></div>
                  <div id="customerdiv2" class="flex-item-three" style="display:none;"><span style="font-size: large;">Customer Name 2</span></div>
                  <div id="customerdiv3" class="flex-item-three" style="display:none;"><span style="font-size: large;">Customer Name 3</span></div>
                  <div id="customerdiv4" class="flex-item-three" style="display:none;"><span style="font-size: large;">Customer Name 4</span></div>

                  <div id="orderdiv1" class="flex-item-three" style="display:none;"><span style="font-size: large;">Pre-Order</span></div>
                  <div id="orderdiv2" class="flex-item-three" style="display:none;"><span style="font-size: large;">Offer to Customer</span></div>
                  <div id="orderdiv3" class="flex-item-three" style="display:none;"><span style="font-size: large;">Payment Received</span></div>
                  <div id="orderdiv4" class="flex-item-three" style="display:none;"><span style="font-size: large;">Order to Factory</span></div>
                  <div id="orderdiv5" class="flex-item-three" style="display:none;"><span style="font-size: large;">Order Received</span></div>
                  <div id="orderdiv6" class="flex-item-three" style="display:none;"><span style="font-size: large;">Complete</span></div>
                  <div id="orderdiv7" class="flex-item-three" style="display:none;"><span style="font-size: large;">Order to Customer</span></div>
                  <div id="orderdiv8" class="flex-item-three" style="display:none;"><span style="font-size: large;">Arrived</span></div>

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
        function cust1() {
          document.getElementById("customerdiv1").style.display = "block";
          document.getElementById("customerdiv2").style.display = "none";
          document.getElementById("customerdiv3").style.display = "none";
          document.getElementById("customerdiv4").style.display = "none";

          document.getElementById("orderdiv1").style.display = "none";
          document.getElementById("orderdiv2").style.display = "none";
          document.getElementById("orderdiv3").style.display = "none";
          document.getElementById("orderdiv4").style.display = "none";
          document.getElementById("orderdiv5").style.display = "none";
          document.getElementById("orderdiv6").style.display = "none";
          document.getElementById("orderdiv7").style.display = "none";
          document.getElementById("orderdiv8").style.display = "none";
        }
        function cust2() {
          document.getElementById("customerdiv1").style.display = "none";
          document.getElementById("customerdiv2").style.display = "block";
          document.getElementById("customerdiv3").style.display = "none";
          document.getElementById("customerdiv4").style.display = "none";

          document.getElementById("orderdiv1").style.display = "none";
          document.getElementById("orderdiv2").style.display = "none";
          document.getElementById("orderdiv3").style.display = "none";
          document.getElementById("orderdiv4").style.display = "none";
          document.getElementById("orderdiv5").style.display = "none";
          document.getElementById("orderdiv6").style.display = "none";
          document.getElementById("orderdiv7").style.display = "none";
          document.getElementById("orderdiv8").style.display = "none";
        }
        function cust3() {
          document.getElementById("customerdiv1").style.display = "none";
          document.getElementById("customerdiv2").style.display = "none";
          document.getElementById("customerdiv3").style.display = "block";
          document.getElementById("customerdiv4").style.display = "none";

          document.getElementById("orderdiv1").style.display = "none";
          document.getElementById("orderdiv2").style.display = "none";
          document.getElementById("orderdiv3").style.display = "none";
          document.getElementById("orderdiv4").style.display = "none";
          document.getElementById("orderdiv5").style.display = "none";
          document.getElementById("orderdiv6").style.display = "none";
          document.getElementById("orderdiv7").style.display = "none";
          document.getElementById("orderdiv8").style.display = "none";
        }
        function cust4() {
          document.getElementById("customerdiv1").style.display = "none";
          document.getElementById("customerdiv2").style.display = "none";
          document.getElementById("customerdiv3").style.display = "none";
          document.getElementById("customerdiv4").style.display = "block";

          document.getElementById("orderdiv1").style.display = "none";
          document.getElementById("orderdiv2").style.display = "none";
          document.getElementById("orderdiv3").style.display = "none";
          document.getElementById("orderdiv4").style.display = "none";
          document.getElementById("orderdiv5").style.display = "none";
          document.getElementById("orderdiv6").style.display = "none";
          document.getElementById("orderdiv7").style.display = "none";
          document.getElementById("orderdiv8").style.display = "none";
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

          
          document.getElementById("customerdiv1").style.display = "none";
          document.getElementById("customerdiv2").style.display = "none";
          document.getElementById("customerdiv3").style.display = "none";
          document.getElementById("customerdiv4").style.display = "none";
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

          document.getElementById("customerdiv1").style.display = "none";
          document.getElementById("customerdiv2").style.display = "none";
          document.getElementById("customerdiv3").style.display = "none";
          document.getElementById("customerdiv4").style.display = "none";          
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

          document.getElementById("customerdiv1").style.display = "none";
          document.getElementById("customerdiv2").style.display = "none";
          document.getElementById("customerdiv3").style.display = "none";
          document.getElementById("customerdiv4").style.display = "none";
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

          document.getElementById("customerdiv1").style.display = "none";
          document.getElementById("customerdiv2").style.display = "none";
          document.getElementById("customerdiv3").style.display = "none";
          document.getElementById("customerdiv4").style.display = "none";
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

          document.getElementById("customerdiv1").style.display = "none";
          document.getElementById("customerdiv2").style.display = "none";
          document.getElementById("customerdiv3").style.display = "none";
          document.getElementById("customerdiv4").style.display = "none";
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

          document.getElementById("customerdiv1").style.display = "none";
          document.getElementById("customerdiv2").style.display = "none";
          document.getElementById("customerdiv3").style.display = "none";
          document.getElementById("customerdiv4").style.display = "none";
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

          document.getElementById("customerdiv1").style.display = "none";
          document.getElementById("customerdiv2").style.display = "none";
          document.getElementById("customerdiv3").style.display = "none";
          document.getElementById("customerdiv4").style.display = "none";
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

          document.getElementById("customerdiv1").style.display = "none";
          document.getElementById("customerdiv2").style.display = "none";
          document.getElementById("customerdiv3").style.display = "none";
          document.getElementById("customerdiv4").style.display = "none";
        }
    </script>
</body>
</html>