<?php
include 'connect.php';

if(isset($_GET['id']))
{
    $id = $_GET['id'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Forgot Password</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

     <!-- Open Graph Meta -->
     <meta property="og:title" content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="Dashmix">
    <meta property="og:description" content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">

    <!-- Stylesheets -->
    <!-- Dashmix framework -->
    <link rel="stylesheet" id="css-main" href="assets/css/dashmix.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-center mb-3">
                            <h3>Change Password</h3>
                        </div>
                        <form action="" id="userForm" method="post">
                            <div class="form-group mb-3">
                                <label>Old Password</label>
                                <input type="password" name="OldPassword" class="form-control" placeholder="Enter your old password">
                            </div>
                            <div class="form-group mb-3">
                                <label>New Password</label>
                                <input type="password" name="NewPassword" id="newPassword" class="form-control" placeholder="Enter your new password">
                            </div>
                            <div class="form-group mb-3">
                                <label>Confirm New Password</label>
                                <input type="password" name="CPassword" class="form-control" placeholder="Confirm your new password">
                            </div>
                            <input type="submit" name="btnResetPassword" class="btn btn-primary w-100" value="Reset Password">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
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
                    oldPassword:{
                        required:true
                    },
                    newPassword:{
                        required: true,
                        minlength: 6,
                        pattern: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$\_\-!%*?&]).{6,}$/
                    },
                    confirmPassword:
                    {
                        required: true,
                        equalTo: "#newPassword"
                    }
                },
                messages: {
                    oldPassword:{
                        required:"Please enter your old password."
                    },
                    newPassword: {
                        required: "Please enter your password.",
                        minlength: "Your password must be at least 6 characters long.",
                        pattern: "Password must contain at least 1 uppercase letter, 1 lowercase letter, 1 special character, and 1 number."
                    },
                    confirmPassword: {
                        required: "Please confirm your password.",
                        equalTo: "Passwords doesn't match.",
                    }
                }
            });
        });
    </script>

    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php

include 'connect.php';

if (isset($_POST['btnResetPassword'])) 
{
    $old_password = $_POST['OldPassword'];
    $new_password = $_POST['NewPassword'];
    $confirm_new_password = $_POST['CPassword'];


    $q = "SELECT * FROM tbladmin WHERE id='$id'";
    $res = mysqli_query($con, $q);
    echo "<script>alert('$q');</script>";
    if (mysqli_num_rows($res) > 0) 
    {
        $row = mysqli_fetch_assoc($res);
        // $userid = $row['userid'];
        // $username = $row['userName'];
        $password = $row['password'];

        if($old_password == $password)
        {
            if ($new_password == $confirm_new_password) 
            {
                $query = "UPDATE tbladmin SET password = '$new_password' WHERE id = '$id'";
                mysqli_query($con, $query);

                echo "<script>alert('Password changed successfully.');</script>";
                echo "<script>window.location='AdminProfile.php';</script>";
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
?>