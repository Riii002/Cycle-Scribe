<?php 
    session_start(); 
    include 'connect.php';
    if(isset($_POST['yesDel']))
    {
        $oid = $_POST['txtDelId'];
        $deleteImg = $_POST['txtDelImg'];
        $sql = "delete from tblOrder where orderId = $oid";
        $res = mysqli_query($conn,$sql);
        $path = "uploads/book/$deleteImg";
        if(file_exists($path))
        {
            unlink($path);
        }    
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>User Reports</title>

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

    <link rel="stylesheet" id="css-main" href="assets/css/dashmix.min.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/xwork.min.css"> -->
  </head>

  <body>
   
    <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">
     
    <!-- Sidebar -->
    <?php include 'sidebar.php'; ?>
    <!-- Header -->
    <?php include 'header.php'; ?>      

    <!-- Main Container -->
    <main id="main-container">
        <!-- Hero -->
        <div class="content">
            <div class="d-md-flex justify-content-md-start align-items-md-center py-3 pt-md-3 pb-md-0 text-center text-md-start">
            <div class="col-md-6">
                    <h2 class="block-title">
                        Customer Orders
                    </h2>
                </div>    
                <!-- Export Link -->
                <div class="col-md-6 head">
                    <div class="float-end me-5">
                        <a href="exportUserReport.php" class="btn btn-success"><i class="dwn"></i>Export</a>
                    </div>
                </div>                
            </div>
        </div>

        <!-- Page Content -->
        <div class="content">
            <div class="d-flex align-items-center justify-content-center mb-5">
                <div class="block block-rounded p-5">  
                <table class="table" id="userTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <!-- <th scope="col"></th> -->
                                <th scope="col">User Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Password</th>                                
                                <th scope="col">Total Orders</th>                                
                                <th scope="col">profilePic</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $select = "SELECT u.*,u.userid,u.userName,COUNT(orderId) AS totalOrders FROM tblOrder o INNER JOIN tblUser u on o.userId=u.userid GROUP BY userId ORDER BY totalOrders DESC LIMIT 20;";
                                $result = mysqli_query($con,$select) or die("Error Occured while fetching user records.".mysqli_error($con));
                                $count = 1;
                                while($row=mysqli_fetch_assoc($result))
                                {
                                    // $orderId = $row['orderId'];
                                    // $img = $row['bookImg'];
                                    ?>
                            <tr>
                                <td><?php echo $count;$count++; ?></td>
                                <!-- <td><?php echo $row['quantity']; ?></td> -->
                                <td><?php echo $row['userName']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['password']; ?></td>
                                <td><?php echo $row['totalOrders']; ?></td>
                                <td><?php echo $row['profilePic']; ?></td>                                
                            </tr>
                            <?php } ?>
                        </tbody>
                </table>
                    <script>
                        $(document).ready(function() 
                        {    
                            $('.table').DataTable({
                                "paging": true,            
                                "lengthChange": true,      
                                "searching": true,         
                                "ordering": true,          
                                "info": true,              
                                "autoWidth": false,        
                                "pageLength": 3            
                            });
                        });
                    </script>
                </div>
            </div>
        
        </div>
        
      </main>
      
    <!-- BS Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Are you sure you want to delete Book with id <?php echo $cat_id;?>            
        </div>
        <div class="modal-footer">
            <form action="" method="post">
                <input type="hidden" id="txtDeleteId" name="txtDelId" />
                <input type="hidden" id="txtDeleteImg" name="txtDelImg" />
                <button type="buttons" class="btn btn-secondary" data-bs-dismiss="modal" name="no">No</button>
                <button type="submit" class="btn btn-primary" name="yesDel" id="yesDel">Yes</button>
            </form>
        </div>
        </div>
    </div>
    </div>
    <!-- Footer -->
    <?php include 'footer.php'; ?>
      
    </div>   
    
    <script src="assets/js/dashmix.app.min.js"></script>

    <!-- Page JS Plugins -->
    <script src="assets/js/plugins/chart.js/chart.umd.js"></script>

    <!-- Page JS Code -->
    <script src="assets/js/pages/be_pages_dashboard.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  </body>
</html>
