<?php

    // if (!isset($_SESSION['UserName'])) 
    // {
    //     header('Location: registration.php');
    // }
session_start();
    require "bookcon.php";

    if (isset($_POST['send'])) 
    {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $subject = trim($_POST['subject']);
        $feedbackMessage = trim($_POST['message']);
        $contactNo = trim($_POST['phone']);
        $datetime = date("Y-m-d H:i:s");

        // $userName = $_SESSION['UserName']; 
        // $emailId = isset($_SESSION['email']) ? $_SESSION['email'] : null;

        // if ($emailId === null) 
        // {
        //     echo "Email not found in session.";
        //     exit;
        // }

        $userQuery = "SELECT userId FROM tbluser WHERE email = '$email'";
        $userResult = mysqli_query($mysql, $userQuery);

        // if (mysqli_num_rows($userResult) > 0) 
        // {
            $userRow = mysqli_fetch_assoc($userResult);
            // $userId = $userRow['userId'];

            $query = "INSERT INTO tblfeedback ( feedbackMessage, dtDateTime, email, contactNo, subject) 
                    VALUES ('$feedbackMessage', '$datetime', '$email', '$contactNo', '$subject')";

            $res = mysqli_query($mysql, $query);

            if ($res) 
                echo "<script>alert('Feedback sent successfully!')</script>";
            else 
                echo "Error: " . mysqli_error($mysql);
        // } 
        // else 
        //     echo "User not found.";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
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
    .contact-form {
      display: flex;
      justify-content: space-between;
      align-items: stretch;
    }
    .contact-info {
      background-color:var(--color-green) ;
      color: white;
      padding: 20px;
      border-radius: 5px;
      width: 40%;
    }
    p {
      /* text-align: center; */
    }
    .form-container {
      width: 55%;
      margin-left: 15px;
    }
    .form-container h3 {
      margin-bottom: 10px;
    }
    .form-group {
      margin-bottom: 15px;
    }
    .form-label {
      display: block;
      margin-bottom: 5px;
    }
    .form-input {
      background-color: #444;
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      color: white;
    }
    
  .form-input:focus {
      background-color: #555;
      border-color: #888; 
      outline: none;
  }
    .btn {
      background-color: var(--color-green);
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    .btn:hover {
      background-color: var(--color-darkgreen);
    }
    .contact-info p {
      margin-bottom: 10px;
    }
    .contact-info a {
      color: white;
      text-decoration: none;
    }
    .contact-info a:hover {
      text-decoration: underline;
    }
    </style>
</head>
<body>    
    <?php include "header.php"; ?>
    
    <div class="main-content" style="background-color: var(--color-grey);">
        <div class="container mt-5">
          <div class="row">
            <h1>Get in touch with us</h1> <br>
            <p class="text-center">Any question or remarks? Just write us a message!</p>
          </div>
            <div class="contact-form">
              <div class="contact-info">
                  <h2>Contact Information</h2>
                  <p>Fill up the form and our Team will get back to you within 24 hours</p>
                  <p><i class="fas fa-phone-alt"></i> +91-9099739439</p>
                  <p><i class="fas fa-envelope"></i> contactcyclesribe@gmail.com</p>
                  <!-- <p><i class="fab fa-instagram"></i> contactcyclesribe@gmail.com</p> -->
                  <p><i class="fas fa-map-marker-alt"></i> Cycle Sribe, 10, Shiv Samarth, Palanpur Canal Rd, Pal Gam, Surat, Gujarat 395010</p>
              </div>

            <div class="form-container">
                <h3>Send a Message</h3>
                <form action="#" method="post" id="contactForm">
                <div class="form-group">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" id="name" name="name" class="form-input" required>
                </div>

                <div class="form-group">
                    <label for="phone" class="form-label">Phone Number:</label>
                    <input type="tel" id="phone" name="phone" class="form-input">
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email Address:</label>
                    <input type="email" id="email" name="email" class="form-input" required>
                </div>

                <div class="form-group">
                    <label for="subject" class="form-label">Subject:</label>
                    <input type="text" id="subject" name="subject" class="form-input">
                </div>

                <div class="form-group">
                    <label for="message" class="form-label">Message:</label>
                    <textarea id="message" name="message" class="form-input" rows="5" required></textarea>
                </div>
                <div class="d-flex justify-content-center">
                  <button type="submit" class="btn" name="send">Send Message</button>
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
    $("#contactForm").validate({
        rules: {
            name: {
                required: true,
                minlength: 3
            },
            phone: {
                required: true,
                minlength: 10,
                digits: true
            },
            email: {
                required: true,
                email: true
            },
            subject: {  
                required: true, 
                maxlength: 50
            },
            message: {
                required: true,
                maxlength: 1000
            }
        },
        messages: {
            phone: {
                digits: "Please enter a valid phone number with digits only."
            }
        }
    });
});
  </script>
</body>
</html>
