<?php 
  session_start();
  include 'connect.php';

  $user = "select COUNT(userName) As UserCount  from tbluser;";
  $userC = mysqli_query($con,$user) or die("Query Failed!!" . mysqli_error($mysql));
  $userrow = mysqli_fetch_assoc($userC);
  
  $request = "select COUNT(recycleid) As RequestCount from tblrecyclerequest where status='Pending';";
  $requestC = mysqli_query($con,$request) or die("Query Failed!!" . mysqli_error($mysql));
  $requestrow = mysqli_fetch_assoc($requestC);
  
  $order = "select COUNT(orderId) As OrderCount from tblorder;";
  $orderC = mysqli_query($con,$order) or die("Query Failed!!" . mysqli_error($mysql));
  $orderrow = mysqli_fetch_assoc($orderC);
  
  $book = "select COUNT(orderId) As BooksCount from tblorder;";
  $bookC = mysqli_query($con,$book) or die("Query Failed!!" . mysqli_error($mysql));
  $bookrow = mysqli_fetch_assoc($bookC);
  
  // $sell = "select COUNT(sellId) As SoldCount from tblSellBook;";
  // $sellC = mysqli_query($con,$sell) or die("Query Failed!!" . mysqli_error($mysql));
  // $sellrow = mysqli_fetch_assoc($sellC);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>Cycle Scribe</title>

    <meta name="description" content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="index, follow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="Dashmix">
    <meta property="og:description" content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Stylesheets -->
    <!-- Dashmix framework -->
    <link rel="stylesheet" id="css-main" href="assets/css/dashmix.min.css">
    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/xwork.min.css"> -->
    <!-- END Stylesheets -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  </head>

  <body>
    <!-- Page Container -->
    <!--
      Available classes for #page-container:

      GENERIC

        'remember-theme'                            Remembers active color theme and dark mode between pages using localStorage when set through
                                                    - Theme helper buttons [data-toggle="theme"],
                                                    - Layout helper buttons [data-toggle="layout" data-action="dark_mode_[on/off/toggle]"]
                                                    - ..and/or Dashmix.layout('dark_mode_[on/off/toggle]')

      SIDEBAR & SIDE OVERLAY

        'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
        'sidebar-mini'                              Mini hoverable Sidebar (screen width > 991px)
        'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
        'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
        'sidebar-dark'                              Dark themed sidebar

        'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
        'side-overlay-o'                            Visible Side Overlay by default

        'enable-page-overlay'                       Enables a visible clickable Page Overlay (closes Side Overlay on click) when Side Overlay opens

        'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

      HEADER

        ''                                          Static Header if no class is added
        'page-header-fixed'                         Fixed Header


      FOOTER

        ''                                          Static Footer if no class is added
        'page-footer-fixed'                         Fixed Footer (please have in mind that the footer has a specific height when is fixed)

      HEADER STYLE

        ''                                          Classic Header style if no class is added
        'page-header-dark'                          Dark themed Header
        'page-header-glass'                         Light themed Header with transparency by default
                                                    (absolute position, perfect for light images underneath - solid light background on scroll if the Header is also set as fixed)
        'page-header-glass page-header-dark'         Dark themed Header with transparency by default
                                                    (absolute position, perfect for dark images underneath - solid dark background on scroll if the Header is also set as fixed)

      MAIN CONTENT LAYOUT

        ''                                          Full width Main Content if no class is added
        'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
        'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)

      DARK MODE

        'sidebar-dark page-header-dark dark-mode'   Enable dark mode (light sidebar/header is not supported with dark mode)
    -->
    <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">

      <!-- Sidebar -->
      <!--
        Sidebar Mini Mode - Display Helper classes

        Adding 'smini-hide' class to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
        Adding 'smini-show' class to an element will make it visible (opacity: 1) when the sidebar is in mini mode
          If you would like to disable the transition animation, make sure to also add the 'no-transition' class to your element

        Adding 'smini-hidden' to an element will hide it when the sidebar is in mini mode
        Adding 'smini-visible' to an element will show it (display: inline-block) only when the sidebar is in mini mode
        Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
      -->
     
      <?php include 'sidebar.php'; ?>
      <!-- END Sidebar -->

      <!-- Header -->
        <?php include 'header.php'; ?>
      <!-- END Header -->

      <!-- Main Container -->
      <main id="main-container">
        <!-- Hero -->
        <div class="content">
          <div class="d-md-flex justify-content-md-between align-items-md-center py-3 pt-md-3 pb-md-0 text-center text-md-start">
            <div>
              <h1 class="h3 mb-1">
                Dashboard
              </h1>
              <p class="fw-medium mb-0 text-muted">
                Welcome, <?php echo $_SESSION['AdminName']; ?>!
              </p>
            </div>            
          </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">
          
          <!-- Overview -->
          <div class="row items-push">
            <div class="col-sm-6 col-xl-3">
              <div class="block block-rounded text-center d-flex flex-column h-100 mb-0">
                <div class="block-content block-content-full flex-grow-1">
                  <div class="item rounded-3 bg-body mx-auto my-3">
                    <i class="fa fa-users fa-lg text-primary"></i>
                  </div>
                  <div class="fs-1 fw-bold"><?php echo $userrow['UserCount'] ?></div>
                  <div class="text-muted mb-3">Registered Users</div>
                </div>
                <div class="block-content block-content-full block-content-sm bg-body-light fs-sm">
                  <a class="fw-medium" href="viewUser.php">
                    View all users
                    <i class="fa fa-arrow-right ms-1 opacity-25"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3">
              <div class="block block-rounded text-center d-flex flex-column h-100 mb-0">
                <div class="block-content block-content-full flex-grow-1">
                  <div class="item rounded-3 bg-body mx-auto my-3">
                    <i class="fa fa-level-up-alt fa-lg text-primary"></i>
                  </div>
                  <div class="fs-1 fw-bold"><?php echo $requestrow['RequestCount'] ?></div>
                  <div class="text-muted mb-3">Pending Recycle Requests</div>
                </div>
                <div class="block-content block-content-full block-content-sm bg-body-light fs-sm">
                  <a class="fw-medium" href="viewRecycleRequest.php">
                    View All Recyle Requests
                    <i class="fa fa-arrow-right ms-1 opacity-25"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3">
              <div class="block block-rounded text-center d-flex flex-column h-100 mb-0">
                <div class="block-content block-content-full flex-grow-1">
                  <div class="item rounded-3 bg-body mx-auto my-3">
                    <i class="fa fa-chart-line fa-lg text-primary"></i>
                  </div>
                  <div class="fs-1 fw-bold"><?php echo $orderrow['OrderCount'];  ?></div>
                  <div class="text-muted mb-3">Orders Placed</div>
                </div>
                <div class="block-content block-content-full block-content-sm bg-body-light fs-sm">
                  <a class="fw-medium" href="viewOrders.php">
                    View all Orders
                    <i class="fa fa-arrow-right ms-1 opacity-25"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3">
              <div class="block block-rounded text-center d-flex flex-column h-100 mb-0">
                <div class="block-content block-content-full flex-grow-1">
                  <div class="item rounded-3 bg-body mx-auto my-3">
                    <i class="fa fa-chart-line fa-lg text-primary"></i>
                  </div>
                  <div class="fs-1 fw-bold"><?php echo $bookrow['BooksCount'];  ?></div>
                  <div class="text-muted mb-3">Available Books</div>
                </div>
                <div class="block-content block-content-full block-content-sm bg-body-light fs-sm">
                  <a class="fw-medium" href="viewBooks.php">
                    View all Books
                    <i class="fa fa-arrow-right ms-1 opacity-25"></i>
                  </a>
                </div>
              </div>
            </div>
            <!-- <div class="col-sm-6 col-xl-3">
              <div class="block block-rounded text-center d-flex flex-column h-100 mb-0">
                <div class="block-content block-content-full">
                  <div class="item rounded-3 bg-body mx-auto my-3">
                    <i class="fa fa-wallet fa-lg text-primary"></i>
                  </div>
                  <div class="fs-1 fw-bold"><?php echo $sellrow['SoldCount']; ?></div>
                  <div class="text-muted mb-3">Books Sold</div>
                </div>
                <div class="block-content block-content-full block-content-sm bg-body-light fs-sm">
                  <a class="fw-medium" href="javascript:void(0)">
                    View All Books Available
                    <i class="fa fa-arrow-right ms-1 opacity-25"></i>
                  </a>
                </div>
              </div>
            </div> -->
          </div> 
          <!-- END Overview -->

          <!-- Store Growth -->
          <!-- <div class="block block-rounded">
            <div class="block-header block-header-default">
              <h3 class="block-title">
                Store Growth
              </h3>
              <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                  <i class="si si-refresh"></i>
                </button>
                <button type="button" class="btn-block-option">
                  <i class="si si-wrench"></i>
                </button>
              </div>
            </div>
            <div class="block-content block-content-full">
              <div class="row">
                <div class="col-md-5 col-xl-4 d-md-flex align-items-md-center">
                  <div class="p-md-2 p-lg-3">
                    <div class="py-3">
                      <div class="fs-1 fw-bold">1,430</div>
                      <div class="fw-semibold">Your new website Customers</div>
                      <div class="py-3 d-flex align-items-center">
                        <div class="bg-success-light p-2 rounded me-3">
                          <i class="fa fa-fw fa-arrow-up text-success"></i>
                        </div>
                        <p class="mb-0">
                          You have a <span class="fw-semibold text-success">12% customer growth</span> in the last 30 days. This is amazing, keep it up!
                        </p>
                      </div>
                    </div>
                    <div class="py-3">
                      <div class="fs-1 fw-bold">65</div>
                      <div class="fw-semibold">New products added</div>
                      <div class="py-3 d-flex align-items-center">
                        <div class="bg-success-light p-2 rounded me-3">
                          <i class="fa fa-fw fa-arrow-up text-success"></i>
                        </div>
                        <p class="mb-0">
                          You’ve managed to add <span class="fw-semibold text-success">12% more products</span> in the last 30 days. Store’s portfolio is growing!
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-7 col-xl-8 d-md-flex align-items-md-center">
                  <div class="p-md-2 p-lg-3 w-100" style="height: 450px;">
                    Bars Chart Container
                     Chart.js Chart is initialized in js/pages/be_pages_dashboard.min.js which was auto compiled from _js/pages/be_pages_dashboard.js
                     For more info and examples you can check out http://www.chartjs.org/docs/ 
                    <canvas id="js-chartjs-analytics-bars"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
          <!-- END Store Growth -->

          <!-- Latest Orders -->
          <!-- <div class="row">
            <div class="col-md-8"> -->
              <div class="block block-rounded p-5">
              <table class="table">
                <h3 class="block-title">
                      Recent Orders
                </h3>
                        <thead>
                            <tr>
                              <th scope="col">Quantity</th>
                                <th scope="col">User Name</th>
                                <th scope="col">Order Date</th>
                                <th scope="col">Order Amount</th>
                                <th scope="col">Payement Method</th>
                                <th scope="col">Order Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $select = "select *,u.userName from tblOrder ord inner join tbluser u on ord.userId=u.userId order by ord.orderDate desc LIMIT 10";
                                $result = mysqli_query($con,$select) or die("Error Occured while fetching order records.".mysqli_error($con));
                                $count = 1;
                                while($row=mysqli_fetch_assoc($result))
                                {
                                    $orderId = $row['orderId'];
                                    // $img = $row['bookImg'];
                                    ?>
                            <tr>
                                <td><?php echo $row['quantity']; ?></td>
                                <td><?php echo $row['userName']; ?></td>
                                <td><?php echo $row['orderDate']; ?></td>
                                <td><?php echo $row['orderAmount']; ?></td>
                                <td><?php echo $row['paymentMethod']; ?></td>
                                <td><?php echo $row['orderStatus']; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                </table>
              </div>
              <!-- END Latest Orders -->
            <!-- </div> -->
            <!-- <div class="col-md-4 d-flex flex-column">
              <div class="block block-rounded">
                <div class="block-content block-content-full d-flex justify-content-between align-items-center flex-grow-1">
                  <div class="me-3">
                    <p class="fs-3 fw-bold mb-0">
                      35,698
                    </p>
                    <p class="text-muted mb-0">
                      Completed orders
                    </p>
                  </div>
                  <div class="item rounded-circle bg-body">
                    <i class="fa fa-check fa-lg text-primary"></i>
                  </div>
                </div>
                <div class="block-content block-content-full block-content-sm bg-body-light fs-sm text-center">
                  <a class="fw-medium" href="javascript:void(0)">
                    View Archive
                    <i class="fa fa-arrow-right ms-1 opacity-25"></i>
                  </a>
                </div>
              </div>
              <div class="block block-rounded text-center d-flex flex-column flex-grow-1">
                <div class="block-content block-content-full d-flex align-items-center flex-grow-1">
                  <div class="w-100">
                    <div class="item rounded-3 bg-body mx-auto my-3">
                      <i class="fa fa-archive fa-lg text-primary"></i>
                    </div>
                    <div class="fs-1 fw-bold">75</div>
                    <div class="text-muted mb-3">Products out of stock</div>
                    <div class="d-inline-block px-3 py-1 rounded-pill fs-sm fw-semibold text-warning bg-warning-light">
                      5% of portfolio
                    </div>
                  </div>
                </div>
                <div class="block-content block-content-full block-content-sm bg-body-light fs-sm">
                  <a class="fw-medium" href="javascript:void(0)">
                    Order supplies
                    <i class="fa fa-arrow-right ms-1 opacity-25"></i>
                  </a>
                </div>
              </div>
            </div> -->
          <!-- </div> -->
          <!-- END Latest Orders + Stats -->
        </div>
        <!-- END Page Content -->
      </main>
      <!-- END Main Container -->

      <!-- Footer -->
        <?php include 'footer.php'; ?>
      <!-- END Footer -->
    </div>
    <!-- END Page Container -->

    <!--
      Dashmix JS

      Core libraries and functionality
      webpack is putting everything together at assets/_js/main/app.js
    -->
    <script src="assets/js/dashmix.app.min.js"></script>

    <!-- Page JS Plugins -->
    <script src="assets/js/plugins/chart.js/chart.umd.js"></script>

    <!-- Page JS Code -->
    <script src="assets/js/pages/be_pages_dashboard.min.js"></script>
  </body>
</html>
