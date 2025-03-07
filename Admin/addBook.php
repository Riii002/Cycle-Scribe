<?php 
    session_start(); 
    include 'connect.php';    
    $q = "select * from tblBook";
    $res = mysqli_query($con,$q);
    while($r=mysqli_fetch_assoc($res))
    {
        
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>Add Book</title>

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
                            <input type="text" class="form-control" id="txtBookTitle" name="txtBookTitle">
                        </div>
                        <div class="form-group mb-4">
                            <label for="txtAuthor" class="form-label">Author</label>
                            <input type="text" class="form-control" id="txtAuthor" name="txtAuthor">
                        </div>
                        <div class="form-group mb-4">
                            <label for="txtPublisher" class="form-label">Publisher</label>
                            <input type="text" class="form-control" id="txtPublisher" name="txtPublisher">
                        </div>
                        <div class="form-group mb-4">
                            <label for="txtPublishedDate" class="form-label">Published Date</label>
                            <input type="date" class="form-control" id="txtPublishedDate" name="txtPublishedDate">
                        </div>
                        <div class="form-group mb-4">
                            <label for="txtDescription" class="form-label">Description</label> <br>
                            <textarea name="txtDescription" id="txtDescription" cols="40" rows="5" placeholder="Desciption of Book..."></textarea>
                            <!-- <input type="text" class="form-control" id="txtPublisher" name="txtPublisher"> --> <br>
                        </div>
                        <!-- <div class="form-group mb-4">
                            <label for="txtIsRecycled" class="form-label">is this book Recycled ? (0 for No / 1 for Yes)</label>
                            <input type="text" class="form-control" id="txtIsRecycled" name="txtIsRecycled">
                        </div> -->
                        <div class="form-group mb-4">
                            <label for="txtPrice" class="form-label">Price</label>
                            <input type="text" class="form-control" id="txtPrice" name="txtPrice">
                        </div>
                        <div class="form-group mb-4">
                            <label for="txtQuantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="txtQuantity" name="txtQuantity">
                        </div>
                        <!-- <div class="form-group mb-4">
                            <label for="txtOrderId" class="form-label">Order Id</label>
                            <input type="text" class="form-control" id="txtOrderId" name="txtOrderId">
                        </div>                         -->
                        <div class="form-group mb-4">
                            <label for="Category" class="form-label">Category</label>
                            <input type="text" class="form-control" id="Category" name="Category">
                        </div>
                        <div class="form-group mb-4">
                            <label for="BookImg" class="form-label">Book Image</label>
                            <input type="file" class="form-control" id="BookImg" name="BookImg">
                        </div>
                        <button type="submit" name="btnAdd" class="btn btn-primary py-3 w-100 mb-4">Add</button>
                    </form>                    
                </div>
                <?php 
                    if (isset($_POST['btnAdd'])) 
                    {
                        $BookTitle = $_POST['txtBookTitle'];
                        $author = $_POST['txtAuthor']; 
                        $publisher = $_POST['txtPublisher']; 
                        $PublishedDate = $_POST['txtPublishedDate']; 
                        $Description = $_POST['txtDescription']; 
                        // $IsRecycled = $_POST['txtIsRecycled']; 
                        $Quantity = $_POST['txtQuantity']; 
                        // $OrderId = $_POST['txtOrderId'];  
                        $Category = $_POST['Category']; 
                        $price = $_POST['txtPrice']; 
                        
                        // Handling file upload
                        $img_loc = $_FILES['BookImg']['tmp_name'];
                        $filename = pathinfo($_FILES['BookImg']['name'], PATHINFO_FILENAME);
                        $extension = pathinfo($_FILES['BookImg']['name'], PATHINFO_EXTENSION); 
                        $img_name = $filename . "_" . time() . "." . $extension;

                        // Check if the folder exists
                        $upload_dir = "../uploads/book/";
                        
                        // Move the file to the uploads folder
                        if (move_uploaded_file($img_loc, $upload_dir . $img_name)) {
                            // Insert data into database
                            $result = mysqli_query($con, "INSERT INTO tblBook (Title, author, publisher, publishedDate, Description, price, Quantity, bookImg, category) VALUES ('$BookTitle','$author','$publisher', '$PublishedDate', '$Description', '$price', '$Quantity', '$img_name','$Category')") or die("Error Occurred while inserting data: " . mysqli_error($con));
                            
                            if ($result) 
                            {
                                echo "<script>window.location='viewBooks.php'</script>";
                                exit();
                            } 
                            else 
                            {
                                echo "<div class='alert alert-danger'>Insert unsuccessful.</div>";
                            }
                        } 
                        else 
                        {
                            echo "<div class='alert alert-danger'>File upload failed. Check folder permissions.</div>";
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
$(document).ready(function() {

    $("#bookForm").validate({
        rules: {
            txtBookTitle: {
                required: true,
                minlength: 3
            },
            txtAuthor: {
                required: true,
                minlength: 3
            },
            txtPublisher: {
                required: true,
                minlength: 3
            },
            txtQuantity: {
                required: true,
                digits: true
            },
            txtDescription: {
                required: true
            },
            txtPrice: {
                required: true,
                number: true // Ensure price is a number
            },
            Category: {
                required: true,
                minlength: 3
            },
            BookImg: {
                required: true,
                extension: "jpg,jpeg,png"
            },
            txtPublishedDate: {
                required: true,
                date: true
            }
        },
        messages: {
            txtBookTitle: {
                required: "Please enter the book title",
                minlength: "Title must be at least 3 characters long"
            },
            txtAuthor: {
                required: "Please enter the author's name",
                minlength: "Author must be at least 3 characters long"
            },
            txtPublisher: {
                required: "Please enter the publisher's name",
                minlength: "Publisher must be at least 3 characters long"
            },
            txtQuantity: {
                required: "Please enter the quantity",
                digits: "Quantity must be a valid digit"
            },
            txtDescription: {
                required: "Please enter a description"
            },
            txtPrice: {
                required: "Please enter price",
                number: "Price must be a valid number"
            },
            Category: {
                required: "Please specify the category of the book",
                minlength: "Category must be at least 3 characters long"
            },
            BookImg: {
                required: "Please upload a book image",
                extension: "Only image files (jpg, jpeg, png) are allowed"
            },
            txtPublishedDate: {
                required: "Please enter the published date",
                date: "Enter a valid date"
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
