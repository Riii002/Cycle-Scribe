<?php
include 'connect.php';

// Get email, security question, and security answer from query string
$email = $_GET['email'];
$securityQuestion = urldecode($_GET['secQuestion']);
$correctAnswer = urldecode($_GET['secAnswer']);

if (isset($_POST['btnCheckAnswer'])) 
{
    $enteredAnswer = $_POST['secAnswer'];

    if ($enteredAnswer === $correctAnswer) 
    {
        $showResetForm = true;
    } else {
        echo "<script>alert('Security answer is incorrect');</script>";
    }
}

if (isset($_POST['btnResetPassword'])) 
{
    // $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    $q = "SELECT * FROM tblAdmin WHERE email='$email'";
    $res = mysqli_query($con, $q);

    if (mysqli_num_rows($res) > 0) 
    {
        $row = mysqli_fetch_assoc($res);
        $password = $row['password'];

            if ($newPassword === $confirmPassword) 
            {            
                $query = "UPDATE tblAdmin SET password='$newPassword' WHERE email='$email'";
                if (mysqli_query($con, $query)) 
                {
                    echo "<script>alert('Password updated successfully');</script>";
                    echo "<script>window.location='login.php';</script>";
                } 
                else 
                {
                    echo "<script>alert('Failed to update password');</script>";
                }
            } 
            else 
            {
                echo "<script>alert('New password and confirm password do not match');</script>";
            }
        } 
        else 
        {
            echo "<script>alert('Old password is incorrect.');</script>";
            echo "<script>window.location='forgotPassword.php';</script>";
        }
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
    <title>Reset Password</title>
</head>
<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <h3 class="text-center">Reset Password</h3>
                        
                        <?php if (!isset($showResetForm)): ?>
                            <!-- Security question and answer form -->
                            <form method="post">
                                <div class="form-group mb-3">
                                    <label>Security Question</label>
                                    <input type="text" class="form-control" value="<?php echo $securityQuestion; ?>" readonly>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Security Answer</label>
                                    <input type="text" name="secAnswer" class="form-control" placeholder="Enter your security answer">
                                </div>
                                <button type="submit" name="btnCheckAnswer" class="btn btn-primary w-100">Next</button>
                            </form>
                        <?php else: ?>
                            <!-- Password reset form -->
                            <form method="post" id="userForm">
                                <!-- <div class="form-group mb-3">
                                    <label>Old Password</label>
                                    <input type="password" name="oldPassword" class="form-control" placeholder="Enter your old password">
                                </div> -->
                                <div class="form-group mb-3">
                                    <label>New Password</label>
                                    <input type="password" name="newPassword" class="form-control" placeholder="Enter your new password">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Confirm New Password</label>
                                    <input type="password" name="confirmPassword" class="form-control" placeholder="Confirm your new password">
                                </div>
                                <button type="submit" name="btnResetPassword" class="btn btn-primary w-100">Reset Password</button>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS Libraries as before -->
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
                newPassword:{
                    required: true,
                    minlength: 6,
                    pattern: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@_-$!%*?&]{6,}$/
                },
                confirmPassword:
                {
                    required: true,
                    equalTo: "#newPassword"
                }
            },
            messages: {
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
</body>
</html>
