<?php 
    session_start(); 
    include 'connect.php';

    // Check if the session variable is set
    if (!isset($_SESSION['AdminName'])) 
    {
        header('Location: login.php');
        exit;
    }

    $UserName = $_SESSION['AdminName']; // Retrieve the logged-in user's name

    // Execute the SQL query to get the user data
    $sql = "SELECT * FROM tblAdmin WHERE name='$UserName'";
    $res = mysqli_query($con, $sql);

    // Check if query was successful
    if ($res && mysqli_num_rows($res) > 0) {
        $userData = mysqli_fetch_assoc($res); // Fetch the user data
    } else {
        // If no data is found or there's an issue with the query
        echo "<div class='alert alert-danger'>Error: Could not retrieve user data. Please try again later.</div>";
        $userData = null; // Set $userData to null in case of failure
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Admin Profile</title>

    <link rel="stylesheet" id="css-main" href="assets/css/dashmix.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <style>
      /* Tab styling */
.nav-tabs {
    /* border-bottom: 2px solid #0665d0; Blue underline */
    /* justify-content: center;  */
    border: none;
}

.nav-tabs .nav-item {
    margin-bottom: -1px; 
    border: none;
}

.nav-tabs .nav-link {
    background-color: #f8f9fa; 
    /* border: 1px solid #0665d0;  */
    border-radius: 4px 4px 0 0; 
    color: #0665d0; 
    font-weight: bold;
    padding: 10px 20px; 
    transition: background-color 0.3s ease, color 0.3s ease; 
}

.nav-tabs .nav-link.active {
    background-color: #0665d0; 
    color: #fff; 
    border: none;
}

.nav-tabs .nav-link:hover {
    background-color: #e2e6ea; 
    color: #0665d0; 
}

.tab-content {
    border: none; 
    padding: 20px;
    background-color: #fff;
    border-radius: 0 0 4px 4px; 
}

form label {
    font-weight: bold;
    color: #333; 
}

form input[type="text"],
form input[type="email"],
form input[type="password"],
form input[type="file"] {
    border: 1px solid #0665d0;
    border-radius: 4px;
    padding: 10px;
    width: 100%;
    margin-bottom: 15px;
}

form button {
    background-color: #0665d0;
    border: none;
    padding: 10px 20px;
    color: #fff;
    border-radius: 4px;
    transition: background-color 0.3s ease;
}

form button:hover {
    background-color: #0056b3;
    cursor: pointer;
}

img.rounded-circle {
    border: 4px solid #0665d0; 
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
}

    </style>
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
                    <!-- <a class="btn btn-primary" href="addBook.php">Add New Book</a> -->
                </div>               
            </div>
        </div>
      
        <!-- Page Content -->
        <div class="content">
            <!-- Admin Profile Picture -->
            <?php if ($userData): ?>
                <div class="d-flex justify-content-center mb-5">
                    <img src="../uploads/admin/<?php echo $userData['profilePic']; ?>" alt="Admin Profile" class="img-fluid rounded-circle" style="width: 250px; height: 250px;">
                </div>

                <!-- Tabs for User Information and Update Information -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="user-info-tab" data-bs-toggle="tab" data-bs-target="#user-info" type="button" role="tab" aria-controls="user-info" aria-selected="true">User Information</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="update-info-tab" data-bs-toggle="tab" data-bs-target="#update-info" type="button" role="tab" aria-controls="update-info" aria-selected="false">Update Information</button>
                  </li>
                </ul>
                <div class="tab-content mt-3 mb-3" id="myTabContent">
                  
                  <!-- User Information Tab -->
                  <div class="tab-pane fade show active" id="user-info" role="tabpanel" aria-labelledby="user-info-tab">
                    <!-- <h3>User Information</h3> -->
                    <p><strong>Name:</strong> <?php echo $userData['name']; ?></p>
                    <p><strong>Password:</strong> <?php echo $userData['password']; ?></p>
                    <p><strong>Email:</strong> <?php echo $userData['email']; ?></p>
                    <p><strong>Contact Number:</strong> <?php echo $userData['contactNo']; ?></p>
                    <p><strong>Image:</strong> <?php echo $userData['profilePic']; ?></p>
                  </div>

                  <!-- Update Information Tab -->
                  <div class="tab-pane fade" id="update-info" role="tabpanel" aria-labelledby="update-info-tab">
                    <!-- <h3>Update Information</h3> -->
                    <form action="" method="post" enctype="multipart/form-data" id="adminForm">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $userData['name']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" class="form-control" id="password" name="password" value="<?php echo $userData['password']; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $userData['email']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="contactNo" class="form-label">contact Number</label>
                            <input type="text" class="form-control" id="contactNo" name="contactNo" value="<?php echo $userData['contactNo']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="profilePic" class="form-label">Profile Picture</label>
                            <input type="file" class="form-control" id="profilePic" name="profilePic">
                            <a href="../uploads/admin/<?php echo $userData['profilePic']; ?>" target="_blank">
                              <img src="../uploads/admin/<?php echo $userData['profilePic']; ?>" alt="image" width="150" height="200" class="m-3">
                            </a>
                        </div>
                        <input type="hidden" name="UserName" value="<?php echo $UserName; ?>">
                        <button type="submit" class="btn btn-primary" name="btnUpdate">Update</button>
                        <a class="btn btn-primary" href="changePassword.php?id=<?php echo $userData['id'] ?>">Change Password</a>    
                    </form>
                  </div>
                </div>
            <?php else: ?>
                <div class="alert alert-danger">No user data found for the logged-in user.</div>
            <?php endif; ?>
        </div>
        
      </main>

    <!-- Footer -->
    <?php include 'footer.php'; ?>
      
    </div>   
   
    <!-- Include necessary JS files -->
    <script src="assets/js/dashmix.app.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>
    <script>
$(document).ready(function () {
    $("#adminForm").validate({
        rules: {
            name: {
                required: true,
            },
            email: {
                required: true,
                email: true
            },
            contactNo: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 10
            }
            //,
            // profilePic: {
            //     required: true,
            //     extension: "jpg,jpeg,png"
            // }
        },
        messages: {
            name: {
                required: "Please enter your name.",
            },
            email: {
                required: "Please enter your email address.",
                email: "Please enter a valid email address."
            },
            contactNo: {
                required: "Please provide a contact number.",
                digits: "Please enter a valid 10-digit phone number.",
                minlength: "Phone number must be 10 digits long.",
                maxlength: "Phone number must be 10 digits long."
            }
            // ,
            // profilePic: {
            //     extension: "Please upload a valid image file (jpg, jpeg, png, gif)."
            // }
        }
    });
});

    </script>      
  </body>
</html>
<?php

include 'connect.php';

if (isset($_POST['submit'])) 
{
    $old_password = $_POST['OldPassword'];
    $new_password = $_POST['NewPassword'];
    $confirm_new_password = $_POST['CPassword'];


    $q = "SELECT * FROM tbladmin WHERE id='$id'";
    $res = mysqli_query($con, $q);

    if (mysqli_num_rows($res) > 0) 
    {
        $row = mysqli_fetch_assoc($res);
        $userid = $row['userid'];
        $username = $row['userName'];
        $password = $row['password'];

        if($old_password == $password)
        {
            if ($new_password == $confirm_new_password) 
            {
                $query = "UPDATE tblUser SET password = '$new_password' WHERE userid = '$userid'";
                mysqli_query($con, $query);

                echo "<script>alert('Password changed successfully.');</script>";
                echo "<script>window.location='userProfile.php';</script>";
            } 
            else 
            {
                echo "<script>alert('New password and confirm new password do not match.');</script>";
            }
        } 
        else
            echo "<script>alert('Old password is incorrect.');</script>";

    }
    else 
    {
    echo "<script>alert('User  not found.');</script>";
    }
}
if(isset($_REQUEST['btnUpdate']))
{
    $name = $_POST['name'];
    $email = $_POST['email']; 
    $contactNo = $_POST['contactNo']; 
    $img_loc = $_FILES['profilePic']['tmp_name'];
    $filename = pathinfo($_FILES['profilePic']['name'], PATHINFO_FILENAME);
    $upload_dir = "../uploads/admin/";
    if($img_loc!=null)
    {                            
        unlink("../uploads/admin/".$img);
        $extension = pathinfo($_FILES['profilePic']['name'], PATHINFO_EXTENSION);  //gets extension of file
        $img_name = $filename . $extension;
        move_uploaded_file($img_loc, $upload_dir . $img_name);
    }
    else
    {
        $img_name = $img;   
    }
    $result = mysqli_query($con, "Update tbladmin set name='$name',email='$email',contactNo='$contactNo',profilePic='$img_name' where name='$UserName'") or 
    die("Error Occurred while updating data: " . mysqli_error($con));

    if ($result) 
    {
        echo "<div class='row'><div class='alert alert-success' role='alert'>Update Successful!</div></div>";
        echo "<script>window.location='AdminProfile.php'</script>";
    } 
    else 
    {
        echo "<div class='row'><div class='alert alert-danger'>Update unsuccessful.</div></div>";
    }
}
?>