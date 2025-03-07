<?php
    session_start();
    include 'connect.php';    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Log In</title>
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
                            <h3>Sign In</h3>
                        </div>
                        <form action="" id="userForm" method="post">
                        <div class="form-group mb-3">
                            <label for="floatingInput">Admin Name</label>
                            <input type="text" class="form-control" id="floatingInput"
                            name="userName" placeholder="Name">
                            <span id="UserImg" class="form-text"></span>
                        </div>
                        <div class="form-group mb-4">
                            <label for="floatingPassword">Password</label>
                            <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                            <span id="UserImg" class="form-text"></span>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-4">
                        </div>
                        <button type="submit" name="btnSubmit" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
                        <div class="text-center">
                            <a href="forgotPassword.php">Forgot Password?</a>
                        </div>

                        </form>
                        <?php 
                            if(isset($_POST['btnSubmit']))
                            {
                                $userName = $_POST['userName'];
                                $password = $_POST['password'];
                                
                                $query = "SELECT * FROM tbladmin WHERE name='$userName' AND password='$password'";
                                $result = mysqli_query($con, $query) or die("Query Failed" . mysqli_error($con));
                                if(mysqli_num_rows($result) > 0) 
                                {
                                    $_SESSION['AdminName'] = $userName;
                                    echo "<script>window.location='./index.php'</script>";
                                }
                                else
                                {
                                    echo "<div class='alert alert-danger'>Invalid Username or Password</div>";
                                }
                            }
                        ?>
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
                        userName:{
                            required: true,
                            minlength: 3
                        },
                        password:
                        {
                            required: true,
                            minlength: 6,
                            pattern: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$\_\-!%*?&]).{6,}$/
                        }
                    },
                    messages: {
                        userName: {
                            required: "Please enter your user name.",
                            minlength: "Your username must be at least 3 characters long."
                        },
                        password: {
                            required: "Please enter your password.",
                            minlength: "Your password must be at least 6 characters long.",
                            pattern: "Password must contain at least 1 uppercase letter, 1 lowercase letter, 1 special character, and 1 number."
                        }
                    }
                });
            });
        </script>

    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
   

    <!-- Template Javascript -->
    <!-- <script src="js/main.js"></script> -->
</body>
</html>
