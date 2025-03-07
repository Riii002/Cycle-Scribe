<?php
ob_start();
session_start();
if(!(isset($_SESSION['Email'])))
{
    echo "<script>alert('Please Log In In Order To See User Profile!')</script>";
    echo "<script>window.location='registration.php'</script>";
}
include 'bookcon.php';

if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}

$userId = $_SESSION['UserId']; 

$query = "SELECT * FROM tblUser WHERE userId = '$userId'";
$result = mysqli_query($mysql, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
} 
else {
    die("User not found.");
}

if (isset($_POST['update'])) {
    
    $userName = $_POST['userName'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $address = $_POST['address'];
    $password = $user['password']; 
    
    if (!empty($_FILES['profilePic']['name'])) 
    {
        $profilePic = $_FILES['profilePic']['name'];
        $target_dir = "../uploads/user/"; 
        $target_file = $target_dir . basename($profilePic);

        if (move_uploaded_file($_FILES['profilePic']['tmp_name'], $target_file)) {
            $profilePic = mysqli_real_escape_string($mysql, $profilePic);
        } 
        else {
            echo "<script>alert('Sorry, there was an error uploading your profile picture.')</script>";
        }
    } 
    else {
        $profilePic = $user['profilePic']; 
    }

    $updateQuery = "
    UPDATE tblUser 
    SET userName = '$userName', email = '$email', phoneNumber = '$phoneNumber', 
        address = '$address', password = '$password', profilePic = '$profilePic' 
    WHERE userId = '$userId'
";

    if (mysqli_query($mysql, $updateQuery)) {
        echo "<script>alert('Profile updated successfully!')</script>";

        $user = mysqli_fetch_assoc(mysqli_query($mysql, $query));
    } 
    else {
        echo "Error updating profile: " . mysqli_error($mysql);
    }
}

mysqli_close($mysql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="styles.css"/> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        :root {
    --color-grey: #121212ee;
    --color-green: #1aa84c;
    --color-darkgreen: #0b5525;
    --color-black: #000000;
    --color-white: #FFFFFF;
    }
       body {
        color: var(--color-white);
        font-family: 'Montserrat' !important; /*Lato*/
    }
    .container {
      width: 100%;
    }
    h1 {
      text-align: center;
      margin-bottom: 20px;
    }
    .form-control {
        background-color: #444;
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      color: white;
    }
    .form-control:focus {
            color: white;
            background-color: #444;
      border-color: #888; 
      outline: none;
  }
        .form-control::placeholder {
      color: var(--color-white);
  }
    .profile-pic {
        display: block;
        margin: 0 auto 15px;
        border-radius: 50%;
        width: 300px;
        height: 300px;
        object-fit: cover;
    }
    .form-label {
      display: block;
      margin-bottom: 5px;
    }
    .btn {
      background-color: var(--color-green);
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      margin-left: 10px;
    }
    .btn:hover {
      background-color: var(--color-darkgreen);
    }

    </style>
</head>
<body>    
    <?php include "header.php"; ?>
    
    <div class="main-content" style="background-color: var(--color-grey);">
        <div class="container mt-5">
          <div class="row">
            <h1>User Profile</h1> <br>
            <!-- <p class="text-center">Any question or remarks? Just write us a message!</p> -->
            <div class="p-3 mb-5">
                <form action="" method="POST" id="userProfileForm" enctype="multipart/form-data">
                    <div class="mb-3 text-center">
                        <img src="../uploads/user/<?php echo $user['profilePic']; ?>" alt="Profile Picture" class="profile-pic">
                    </div>

                    <div class="mb-3">
                        <label for="userName" class="form-label">Username</label>
                        <input type="text" class="form-control" id="userName" name="userName" value="<?php echo $user['userName']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="phoneNumber" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" value="<?php echo $user['phoneNumber']; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" id="address" name="address" rows="3"><?php echo $user['address']; ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" class="form-control" id="password" name="password" value="<?php echo $user['password']; ?>" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="profilePic" class="form-label">Profile Picture</label>
                        <input type="file" class="form-control" id="profilePic" name="profilePic">
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" name="update" class="btn">Update Profile</button> 
                        <a class="btn" href="changePassword.php?email=<?php echo $user['email'] ?>">Change Password</a>                        
                    </div>
                </form>
            </div>
          </div>
        </div>  
    </div>
    
    <?php include "footer.php"; ?>  
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- jQuery Validation Plugin -->
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>
  
  <script>
$(document).ready(function() {
    $("#userProfileForm").validate({
        rules: {
            userName: {
                required: true,
                minlength: 3
            },
            email: {
                required: true,
                email: true
            },
            phoneNumber: {
                required: true,
                maxlength: 10,
                digits: true
            },
            address: {
                required: true,
                minlength: 5
            },
            profilePic: {
                extension: "jpg|jpeg|png|gif" // Optional but checks file types
            }
        },
        messages: {
            userName: {
                required: "Please enter your username",
                minlength: "Your username must be at least 3 characters long"
            },
            email: {
                required: "Please provide a valid email",
                email: "Please enter a valid email address"
            },
            phoneNumber: {
                required: "Please enter your phone number",
                maxlength: "Your phone number cannot exceed 10 digits",
                digits: "Please enter a valid phone number with digits only"
            },
            address: {
                required: "Please enter your address",
                minlength: "Your address must be at least 5 characters long"
            },
            profilePic: {
                extension: "Please upload a valid image file (jpg, jpeg, png, gif)"
            }
        }
    });
});
  </script>
</body>
</html>
