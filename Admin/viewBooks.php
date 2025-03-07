<?php 
    session_start(); 
    include 'connect.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>View Books</title>

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

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
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
            <div class="d-md-flex justify-content-md-end align-items-md-center py-3 pt-md-3 pb-md-0 text-center text-md-start">
                <div>
                    <a class="btn btn-primary" href="addBook.php">Add New Book</a>
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
                                <th scope="col">Book Title</th>
                                <th scope="col">Book Author</th>
                                <th scope="col">Publisher</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $result = mysqli_query($con,"select * from tblbook") or die("Error Occured while fetching user records.".mysqli_error($con));
                                $count = 1;
                                while($row=mysqli_fetch_assoc($result))
                                {
                                    $bookId = $row['bookId'];
                                    $img = $row['bookImg'];
                                    ?>
                            <tr>
                                <td><?php echo $count;$count++; ?></td>
                                <td><?php echo $row['title']; ?></td>
                                <td><?php echo $row['author']; ?></td>
                                <td><?php echo $row['publisher']; ?></td>
                                
                                <td>
                                    <a href="../uploads/book/<?php echo $img; ?>" target="_blank">
                                        <img src="../uploads/book/<?php echo $img; ?>" alt="image" width="100" height="150">
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="editBook.php?bid=<?php echo $bookId ?>">Edit</a>
                                    <a class="btn btn-danger" href="deleteBook.php?bid=<?php echo $bookId ?>&img=<?php echo $img ?>">Delete</a>
                                    <a href="BookDetails.php" class="btn btn-info me-1 mt-1">View More</a>
                                </td>
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
