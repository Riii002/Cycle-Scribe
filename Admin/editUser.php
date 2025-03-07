<?php 
    session_start(); 
    include 'connect.php';  
    if(isset($_GET["uid"]))
    {
        $uid = $_GET["uid"];
        $sql = "SELECT * FROM tbluser WHERE userid='$uid';";
        $res= mysqli_query($con,$sql);
        while($row=mysqli_fetch_assoc($res))
        {
            $name = $row["userName"];
            $email = $row["email"];
            $password = $row["password"];
            $img = $row["profilePic"];
            $status = $row["status"];
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

    <title>Edit Feedback</title>

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
                <a class="btn btn-primary" href="viewUser.php">View User</a>
                </div>           
            </div>
        </div>

        <!-- Page Content -->
        <div class="content">
            <div class="d-flex align-items-center justify-content-center mb-5">
                <div class="block block-rounded p-5">  
                    <form action="" method="post" id="userForm" enctype="multipart/form-data">
                        <div class="form-group mb-4">
                            <label for="txtUserName" class="form-label">User Name</label>
                            <input type="text" class="form-control" id="txtUserName" name="txtUserName" value="<?php echo $name; ?>">
                            <span id="txtUserName" class="form-text"></span>
                        </div>
                        <div class="form-group mb-4">
                            <label for="txtEmail" class="form-label">Email</label>
                            <input type="text" class="form-control" id="txtEmail" name="txtEmail" value="<?php echo $email; ?>">
                            <span id="txtEmail" class="form-text"></span>
                        </div>
                        <div class="form-group mb-4">
                            <label for="txtPassword" class="form-label">Password</label>
                            <input type="text" class="form-control" id="txtPassword" name="txtPassword" value="<?php echo $password; ?>">
                            <span id="txtPassword" class="form-text"></span>
                        </div>
                        <div class="form-group mb-4">
                            <label for="UserImg" class="form-label">Profile Pic</label>
                            <input type="file" class="form-control" id="UserImg" name="UserImg">
                            <img src="../uploads/user/<?php echo $img; ?>" width="200px" height="150px" class="m-3">
                            <span id="UserImg" class="form-text"></span>
                        </div>
                        <button type="submit" name="btnEdit" class="btn btn-primary py-3 w-100 mb-4">Edit</button>
                        <?php if ($status == 'Active') { ?>
                        <a class="btn btn-info py-3 w-100 mb-4" href="suspendUser.php?uid=<?php echo $uid ?>">Suspend</a>
                        <?php } 
                        else { ?>
                            <a class="btn btn-info py-3 w-100 mb-4" href="undoSuspend.php?uid=<?php echo $uid ?>">Activate</a>
                        <?php } ?> 
                        <!-- <button type="submit" name="btnEdit" class="btn btn-primary py-3 w-100 mb-4">Suspend</button> -->
                    </form>                    
                </div>
                <?php 
                if (isset($_POST['btnEdit'])) 
                {
                    $UserName = $_POST['txtUserName'];
                    $email = $_POST['txtEmail']; 
                    $password = $_POST['txtPassword']; 
                    $img_loc = $_FILES['UserImg']['tmp_name'];
                    $filename = pathinfo($_FILES['UserImg']['name'], PATHINFO_FILENAME);
                    $upload_dir = "../uploads/user/";
                    if($img_loc!=null)
                    {                            
                        unlink("uploads/user/".$img);
                        $extension = pathinfo($_FILES['UserImg']['name'], PATHINFO_EXTENSION);  //gets extension of file
                        $img_name = $filename . "_" . time() . "." . $extension;
                        move_uploaded_file($img_loc, $upload_dir . $img_name);
                    }
                    else
                    {
                        $img_name = $img;   
                    }
                    $result = mysqli_query($con, "Update tbluser set userName='$UserName',email='$email',password='$password',profilePic='$img_name' where userid='$uid'") or 
                    die("Error Occurred while updating data: " . mysqli_error($con));
            
                    if ($result) 
                    {
                        echo "<div class='row'><div class='alert alert-success' role='alert'>Update Successful!</div></div>";
                        echo "<script>window.location='viewUser.php'</script>";
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
        $("#userForm").validate({

            rules: {
                txtUserName:{
                    required: true,
                    minlength: 2
                },
                txtEmail:
                {
                    required: true,
                    email: true
                },
                txtPassword:
                {
                    required: true,
                    minlength: 6 
                }
                // ,
                // UserImg:
                // {
                //     required: true
                // }
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
