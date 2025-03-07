<?php
ob_start();
session_start();
include 'bookcon.php';
if(isset($_GET['email']))
{
    $email = $_GET['email'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Change Password</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <style>
        :root 
{
    --color-grey: #121212ee; /* Dark background similar to Spotify */
    --color-green: #1aa84c; /* Spotify green 1DB954 */
    --color-darkgreen: #0b5525; /* dark green */
    --color-black: #000000;
    --color-white: #FFFFFF;
}
        body {
    background-color: #222;
    font-family: 'Montserrat', sans-serif;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    margin: 0;
}

.container {
    background-color: #333;
    border-radius: 8px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
    padding: 30px 40px;
}

h2 {
    font-weight: 600;
    margin-bottom: 20px;
    text-align: center;
    color: white;
}

.form-group {
    margin-bottom: 20px;
}

.form-control {
    background-color: #444;
    border: 1px solid #555;
    color: var(--color-white);
    border-radius: 4px;
    padding: 10px;
    height: 40px;
}
.form-control::placeholder
{
    color: #b3b3b3; 
    font-size: 1.0rem; 
}
.form-control::-ms-value
{
    color: var(--color-white); 
    font-size: 1.0rem; 
}

.form-control:focus {
    background-color: #555;
    border-color: #888;
    color: var(--color-white);
    outline: none;
}

.btn-primary {
    background-color: var(--color-green);
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.3s;
    /* width: 100%; */
}

.btn-primary:hover {
    background-color: var(--color-darkgreen);
}

    </style>
</head>
<body>

    <div class="container" style="width:600px;">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center">Change Password</h2>
                    <form action="" method="post" id="resetForm">
                            <div class="form-group">
                                <label for="OldPassword">Old Password:</label>
                                <input type="password" class="form-control" id="OldPassword" name="OldPassword" required>
                            </div>
                        <div class="form-group">
                            <label for="NewPassword">New Password:</label>
                            <input type="password" class="form-control" id="NewPassword" name="NewPassword" required>
                        </div>
                        <div class="form-group">
                            <label for="CPassword">Confirm New Password:</label>
                            <input type="password" class="form-control" id="CPassword" name="CPassword" required>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary" name="submit">Change Password</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>

    <!-- jQuery Validation Plugin -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js "></script>
    <!-- jQuery Validation Plugin -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>
    <script>
    $(document).ready(function()
    {
        $("#resetForm").validate(
        {
            rules: {
                OldPassword: {
                    required: true
                },
                NewPassword: {
                    required: true,
                    minlength: 6,
                    pattern: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$\_\-!%*?&]).{6,}$/
                },
                CPassword: {
                    required: true,
                    equalTo: "#NewPassword"
                }
            },
            messages: 
            {
                OldPassword: {
                    required: "Please enter your old password."
                },
                NewPassword: {
                    required: "Please enter your new password.",
                    minlength: "Your password must be at least 6 characters long.",
                    pattern: "Password must contain at least 1 uppercase letter, 1 lowercase letter, 1 special character, and 1 number."
                },
                CPassword: {
                    required: "Please confirm your password",
                    equalTo: "Passwords do not match"
                }
            }
        });
    });
    </script>
</body>
</html>
<?php

include 'bookcon.php';

if (isset($_POST['submit'])) 
{
    $old_password = $_POST['OldPassword'];
    $new_password = $_POST['NewPassword'];
    $confirm_new_password = $_POST['CPassword'];


    $q = "SELECT * FROM tblUser WHERE email='$email'";
    $res = mysqli_query($mysql, $q);

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
                mysqli_query($mysql, $query);

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
?>