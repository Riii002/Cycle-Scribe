<?php
    ob_start();
    session_start(); // Start the session at the beginning
    require "bookcon.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
    <!-- <script src="script.js"></script> -->
    <!-- Ensure only one version of jQuery is loaded -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

     <!-- <style>
        .animated-img 
        {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .animated-img:hover 
        {
            transform: scale(1.05); 
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.8); 
        }
     </style> -->
</head>
<body>
    <div class="form-section">
        <div class="switch" id="switch">
            <div class="row">
                <a href="index.php">
                    <img class="logo" src="FinalLogo.png" alt="logo" width="50px" height="50px">
                </a>
            </div>
            <h3>What is Cycle Scribe</h3>
            <p>
                CycleScribe is an innovative platform dedicated to promoting sustainability through the reuse and recycling of books and notebooks...
            </p>
        </div>

        <!-- Sign Up Form -->
        <div class="signup-form center">
            <h1 style="padding: 0;margin: 0;">Sign Up</h1>
            <form action="" method="post" name="SignUpForm" id="SignUpForm" enctype="multipart/form-data" style="height:440px; width:300px;">
            <input class="form-input" id="txtUserName" name="txtUserName" type="text" placeholder="Enter User Name" required/>

            <input class="form-input" id="txtSignUpEmail" name="txtSignUpEmail" type="email" placeholder="Enter Email" required/>

            <input class="form-input" id="txtPhoneNumber" name="txtPhoneNumber" type="text" placeholder="Enter Phone Number" required/>

            <textarea class="form-input" id="txtAddress" name="txtAddress"  cols="10" rows="30" placeholder="Enter Address" style="height: 45px;" required></textarea>

            <input class="form-input" id="txtSignUpPassword" name="txtSignUpPassword" type="password" placeholder="Enter Password" required/>

            <input class="form-input" id="txtConfirmPassword" name="txtConfirmPassword" type="password" placeholder="Enter Password Again" required/>

            <select class="form-input-select" id="txtSecurityQuestion" name="txtSecurityQuestion" required>
                <option selected disabled>Select a security question</option>
                <option value="In what city were you born?">In what city were you born?</option>
                <option value="What was your childhood best friend's nickname?">What was your childhood best friend's nickname?</option>
                <option value="What is the name of your favorite pet?">What is the name of your favorite pet?</option>
                <option value="What was your favorite food as a child?">What was your favorite food as a child?</option>
            </select>

            <input class="form-input" id="txtSecurityAnswer" name="txtSecurityAnswer" type="text" placeholder="Enter your security answer" required/>

            <input class="custom-file-upload" type="file" id="profilePic" name="profilePic" style="width: 250px;"/>
            
            <div class="d-flex justify-content-center">
                <input type="submit" name="btnSignUp" id="btnSignUp" value="Sign Up" class="btn-switch green" style="margin-bottom: 10px;">
            </div>
            <div class="d-flex justify-content-center">
                Already have an account? <span class="register-link" name="login" id="login">Login</span>
            </div>
            </form>
        </div>


        <!-- Login Form -->
        <div class="login-form center">
            <h1>Login</h1>
            <form action="" method="post" name="LogInForm" id="LogInForm" style=" width:300px;">
                <input class="form-input" id="txtSignInEmail" name="txtSignInEmail" type="email" placeholder="Enter Email" required/>
                <div id="SIEmailError" class="Invalid-input"></div>

                <input class="form-input" id="txtSignInPassword" name="txtSignInPassword" type="password" placeholder="Enter Password" required/>
                <div id="SIPasswordError" class="Invalid-input"></div>

                <input type="submit" name="btnSignIn" id="btnSignIn" value="Sign In" class="btn-switch" style="margin-bottom: 10px;">
                <div class="d-flex justify-content-center">
                    Don't have an account yet? <span class="register-link" name="signup" id="signup">Register</span> <br>
                </div>
                <div style="text-align: center;" class="mt-2">
                    <a href="forgotPassword.php" class="register-link">Forgot Password</a>
                </div>
                <div id="SIError" class="Invalid-input"></div>
            </form>
        </div>
    </div>

    <script>
        let login = document.getElementById('login');
        let signup = document.getElementById('signup');
        let shade = document.getElementById('switch');
        
        login.addEventListener('click', function() 
        {
            shade.classList.add('toLeft');
            shade.classList.remove('toRight');
        });

        signup.addEventListener('click', function() 
        {
            shade.classList.remove('toLeft');
            shade.classList.add('toRight');
        });
    </script>
    <!-- jQuery Validation Plugin -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#SignUpForm").validate({
                rules: {
                    txtUserName: {
                        required: true,
                        minlength: 3,
                        maxlength: 15,
                        pattern: /^(?=.*[a-zA-Z])[a-zA-Z0-9_-]{3,15}$/
                    },
                    txtSignUpEmail: {
                        required: true,
                        email: true,
                        maxlength: 320
                    },
                    txtPhoneNumber: {
                        required: true,
                        digits: true,
                        minlength: 10,
                        maxlength: 10
                    },
                    txtAddress: {
                        required: true,
                        minlength: 35,
                        maxlength: 300
                    },
                    txtSignUpPassword: {
                        required: true,
                        minlength: 6,
                        pattern: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$\_\-!%*?&]).{6,}$/
                    },
                    txtConfirmPassword: {
                        required: true,
                        minlength: 6,
                        equalTo: "#txtSignUpPassword"
                    },
                    profilePic: {
                        required: true,
                        extension: "jpg,jpeg,png"
                    }
                },
                messages: {
                    txtUserName: {
                        required: "Please enter your username.",
                        minlength: "Your username must be at least 3 characters long.",
                        maxlength: "Your user name must be no more than 15 characters",
                        pattern: "User name can contain alphabets, digits, underscore and hyphen."
                    },
                    txtSignUpEmail: {
                        required: "Please enter your email address.",
                        email: "Please enter a valid email address.",
                        maxlength: "Your email address must be under 320 characters."
                    },
                    txtPhoneNumber: {
                        required: "Please enter your phone number.",
                        digits: "Please enter a valid phone number using digits only.",
                        minlength: "Your phone number must be at least 10 digits.",
                        maxlength: "Your phone number must be no more than 10 digits."
                    },
                    txtAddress: {
                        required: "Please enter your address.",
                        minlength: "Your address must be at least 35 characters long.",
                        maxlength: "Your address must be no more than 300 characters."
                    },
                    txtSignUpPassword: {
                        required: "Please enter your password.",
                        minlength: "Your password must be at least 6 characters long.",
                        pattern: "Password must contain at least 1 uppercase letter, 1 lowercase letter, 1 special character, and 1 number."
                    },
                    txtConfirmPassword: {
                        required: "Please confirm your password.",
                        minlength: "Password does not match.",
                        equalTo: "Passwords do not match!"
                    },
                    profilePic: {
                        required: "Please upload your profile picture.",
                        extension: "Please select valid image file."
                    }
        }
            });

            $("#LogInForm").validate({
                rules: {
                    txtSignInEmail: {
                        required: true,
                        email: true
                    },
                    txtSignInPassword: {
                        required: true,
                        minlength: 6,
                        pattern: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$_\-!%*?&]).{6,}$/
                    }
                },
                messages: {
                    txtSignInEmail: {
                        required: "Please enter your email address.",
                        email: "Please enter a valid email address."
                    },
                    txtSignInPassword: {
                        required: "Please enter your password.",
                        minlength: "Your password must be at least 6 characters long.",
                        pattern: "Password must contain at least 1 uppercase letter, 1 lowercase letter, 1 special character, and 1 number."
                    }
        }
    });
});
     </script>
</body>
</html>
<?php
require "bookcon.php";
if (isset($_POST['btnSignUp']) && isset($_FILES['profilePic'])) 
{
    $username = trim($_POST['txtUserName']);
    $email = trim($_POST['txtSignUpEmail']);
    $password = trim($_POST['txtSignUpPassword']);
    $address = trim($_POST['txtAddress']);
    $confirmPassword = trim($_POST['txtConfirmPassword']);
    $phone = $_POST['txtPhoneNumber'];
    $profilePic = $_FILES['profilePic']['name'];
    $loc = $_FILES['profilePic']['tmp_name'];
    $securityQuestion = $_POST['txtSecurityQuestion'];
    $securityAnswer = $_POST['txtSecurityAnswer'];

    $q = "select * from tbluser where email='$email'";
    $res = mysqli_query($mysql, $q);
    $nor = mysqli_num_rows($res);

    if ($nor > 0) 
    {
        echo "<script>alert('User already exists with this email!');</script>";
    } 
    else 
    {
        if (move_uploaded_file($loc, "../uploads/user/" . $profilePic)) 
        {
            $query = "insert into tbluser (userName, email, phoneNumber, address,profilePic, securityQuestion, securityAnswer, password) values ('$username', '$email', '$phone', '$address','$profilePic','$securityQuestion','$securityAnswer','$password')";
            $res = mysqli_query($mysql, $query);
            
            if ($res) 
            {
                echo "<script>window.location='registration.php';</script>";
            }
            else 
            {
                echo "Error: " . mysqli_error($mysql);
            }
        } 
        else 
        {
            echo "Error: File upload failed";
        }
    }
}

if(isset($_POST['btnSignIn']))
{
    // echo "<script>alert('login');</script>";
    
    $Email = $_POST['txtSignInEmail'];
    $Password = $_POST['txtSignInPassword'];

    $q = "Select * from tbluser where Email='$Email'and Password='$Password'"; 
    $res = mysqli_query($mysql,$q) or die("Couldn't Fetch User Records");
    $nor = mysqli_num_rows($res);

    if($nor > 0)
    {
        $r=mysqli_fetch_assoc($res);
        $userName = $r['userName'];
        $userid = $r['userid'];
        $email =  $r['email'];
        $status = $r['status'];

        if ($status == 'Suspended') 
        {
            echo "<script>alert('Your account has been suspended. Please contact support.');</script>";
            echo "<script>window.location='contactus.php';</script>";
        } 
        else 
        {
            $_SESSION['UserName'] = $userName;
            $_SESSION['UserId'] = $userid;
            $_SESSION['Email'] = $Email;
            // print_r($_SESSION);
            echo "<script>window.location='index.php'</script>";
        }
    }   
    else
    {
        echo "<script>User Doesn't exist!!</script>";
    }        
}
?>
