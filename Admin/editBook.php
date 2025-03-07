<?php 
    session_start(); 
    include 'connect.php';    
    $q = "select * from tblBook";
    $res = mysqli_query($con,$q);
    while($r=mysqli_fetch_assoc($res))
    {
        
    }
    if(isset($_GET["bid"]))
    {
        $bid = $_GET["bid"];
        $sql = "SELECT * FROM tblBook WHERE bookid='$bid';";
        $res= mysqli_query($con,$sql);
        while($row=mysqli_fetch_assoc($res))
        {
            $BookTitle = $row['title'];
            $author = $row['author'];
            $publisher = $row['publisher'];
            $PublishedDate = $row['publishedDate'];
            $Description = $row['description'];
            $price = $row['price'];
            $Quantity = $row['quantity'];
            $category = $row['category'];
            $img = $row['bookImg']; 
        }
    }
    else
    {
        echo "User Id not found.";
    }  
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>Edit Book</title>

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>
    <script></script>      
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
                <a class="btn btn-primary" href="viewBooks.php">View Book</a>
                </div>           
            </div>
        </div>

        <!-- Page Content -->
        <div class="content">
            <div class="d-flex align-items-center justify-content-center mb-5">
                <div class="block block-rounded p-5">  
                    <form action="" method="post" id="bookForm" enctype="multipart/form-data">
                        <div class="form-group mb-4">
                            <label for="txtBookTitle" class="form-label">Book Title</label>
                            <input type="text" class="form-control" id="txtBookTitle" name="txtBookTitle" value="<?php echo $BookTitle ?>">
                            <span id="txtBookTitle" class="form-text"></span>
                        </div>
                        <div class="form-group mb-4">
                            <label for="txtAuthor" class="form-label">Author</label>
                            <input type="text" class="form-control" id="txtAuthor" name="txtAuthor" value="<?php echo $author ?>">
                            <span id="txtAuthor" class="form-text"></span>
                        </div>
                        <div class="form-group mb-4">
                            <label for="txtPublisher" class="form-label">Publisher</label>
                            <input type="text" class="form-control" id="txtPublisher" name="txtPublisher" value="<?php echo $publisher ?>">
                            <span id="txtPublisher" class="form-text"></span>
                        </div>
                        <div class="form-group mb-4">
                            <label for="txtPublishedDate" class="form-label">Published Date</label>
                            <input type="text" class="form-control" id="txtPublishedDate" name="txtPublishedDate" value="<?php echo $PublishedDate ?>">
                            <span id="txtPublishedDate" class="form-text"></span>
                        </div>
                        <div class="form-group mb-4">
                            <label for="txtDescription" class="form-label">Description</label> <br>
                            <textarea name="txtDescription" id="txtDescription" cols="40" rows="5" placeholder="Desciption of Book..."><?php echo $Description ?></textarea>
                            <span id="txtDescription" class="form-text"></span>
                        </div>
                        <div class="form-group mb-4">
                            <label for="txtPrice" class="form-label">price</label>
                            <input type="text" class="form-control" id="txtPrice" name="txtPrice" value="<?php echo $price ?>">
                            <span id="txtPrice" class="form-text"></span>
                        </div>
                        <div class="form-group mb-4">
                            <label for="txtQuantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="txtQuantity" name="txtQuantity" value="<?php echo $Quantity ?>">
                            <span id="txtQuantity" class="form-text"></span>
                        </div>
                        <div class="form-group mb-4">
                            <label for="txtCategory" class="form-label">Category</label>
                            <input type="text" class="form-control" id="txtCategory" name="txtCategory" value="<?php echo $category ?>">
                            <span id="txtCategory" class="form-text"></span>
                        </div>                        
                        <div class="form-group mb-4">
    <label for="BookImg" class="form-label">Book Image</label>
    <input type="file" class="form-control" id="BookImg" name="BookImg">
    <img src="../uploads/book/<?php echo $img; ?>" width="200px" height="250px" class="m-3">
    <span id="BookImg" class="form-text"></span>
</div>
                        <button type="submit" name="btnEdit" class="btn btn-primary py-3 w-100 mb-4">Edit</button>
                    </form>                    
                </div>
                <?php 
                    if (isset($_POST['btnEdit'])) 
                    {
                        $BookTitle = $_POST['txtBookTitle'];
                        $author = $_POST['txtAuthor']; 
                        $publisher = $_POST['txtPublisher']; 
                        $PublishedDate = $_POST['txtPublishedDate']; 
                        $Description = $_POST['txtDescription']; 
                        $IsRecycled = $_POST['txtPrice']; 
                        $Quantity = $_POST['txtQuantity']; 
                        $OrderId = $_POST['txtCategory']; 
                        
                        // Handling file upload
                        $img_loc = $_FILES['BookImg']['tmp_name'];
                        $filename = pathinfo($_FILES['BookImg']['name'], PATHINFO_FILENAME);
                        $extension = pathinfo($_FILES['BookImg']['name'], PATHINFO_EXTENSION); 
                        $img_name = $filename . "_" . time() . "." . $extension;

                        // Check if the folder exists
                        $upload_dir = "../uploads/book/";

                        if($img_loc!=null)
                        {                            
                            unlink("../uploads/book/".$img);
                            $extension = pathinfo($_FILES['BookImg']['name'], PATHINFO_EXTENSION);  
                            $img_name = $filename . "_" . time() . "." . $extension;
                            move_uploaded_file($img_loc, $upload_dir . $img_name);
                        }
                        else
                        {
                            $img_name = $img;   
                        }
                        $result = mysqli_query($con, "Update tblBook set title='$BookTitle',author='$author',publisher='$publisher',publishedDate='$PublishedDate',description='$Description',quantity='$Quantity',BookImg='$img_name', category='$category' where bookId='$bid'") or 
                        die("Error Occurred while updating data: " . mysqli_error($con));
                
                        if ($result) 
                        {
                            echo "<div class='row'><div class='alert alert-success' role='alert'>Update Successful!</div></div>";
                            echo "<script>window.location='viewBooks.php'</script>";
                        } 
                        else 
                        {
                            echo "<div class='row'><div class='alert alert-danger'>Update unsuccessful.</div></div>";
                        }
                    } 
                ?>

            </div>
        
        </div>
        
      </main>
      
    <!-- Footer -->
    <?php include 'footer.php'; ?>
      
    </div>   
    <!-- Ensure only one version of jQuery is loaded -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<!-- jQuery Validation Plugin -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>


    <script>
    $(document).ready(function()
    {
        $("#bookForm").validate({

            rules: 
            {
                
                txtBookTitle: {
                required: true,
                minlength: 3
            },
            txtAuthor: {
                required: true
            },
            txtPublisher: {
                required: true
            },
            txtUserName: {
                required: true
            },
            txtQuantity: {
                required: true
                // digits: true 
            },
            txtPrice: {
                required: true
                // digits: true 
            },
            txtDescription: {
                required: true
            },
            // BookImg: {
            //     required: true
            //     // extension: "jpg,jpeg,png,gif" 
            // },
            txtPublishedDate: {
                required: true
                // date: true 
            }

            }
        });
    });
    </script>
    <script src="assets/js/dashmix.app.min.js"></script>

    <!-- Page JS Plugins -->
    <script src="assets/js/plugins/chart.js/chart.umd.js"></script>

    <!-- Page JS Code -->
    <script src="assets/js/pages/be_pages_dashboard.min.js"></script>
    <!-- DataTables JS -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  </body>
</html>
