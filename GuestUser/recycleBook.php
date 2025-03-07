<?php
ob_start();
session_start();
// if(!(isset($_SESSION['Email'])))
// {
//     echo "<script>alert('Please Log In In Order To recycle Books!')</script>";
//     echo "<script>window.location='registration.php'</script>";
// }
include 'bookcon.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recycle Book</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="styles.css"/>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <style>
        :root {
    --color-grey: #121212ee;
    --color-green: #1aa84c;
    --color-darkgreen: #0b5525;
    --color-black: #000000;
    --color-white: #FFFFFF;
}

body {
    background-color: var(--color-grey);
}
.container
{
    margin-top: 30px;
    margin-bottom: 30px;
}
.row {
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-start;
}

.col-sm-8 {
    flex: 1 1 100%;
    margin-bottom: 20px;
}

.col-md-6, .col-lg-4 {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}
.image-container 
{
    position: relative;
    text-align: center;
    margin-bottom: 20px;
    background-color: var(--color-grey);
    /* margin-top: 30px; */
    /* z-index: 0; */
}
img 
{
    width: 100%;
    height: auto;
    display: block;
    margin: 0 auto;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
}
a
{
    text-decoration: none;
    color: var(--color-white);
}
a:hover
{
    text-decoration: none;
    color: var(--color-white);
}
.recycle-button 
{
    position: absolute;
    bottom: 20px;
    left: 35%;
    transform: translateX(-50%);
    background-color: var(--color-green);
    color: var(--color-white) !important;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}
.recycle-button:hover 
{
    background-color: #169141;
    text-decoration: none;
    color: var(--color-white) !important;
}
video 
{
    display: block;
    margin: 0 auto;
    max-width: 100%;
    height: 300px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);

}
#small-img {
    width: 100%;
    height: auto;
    max-width: 100%;
    display: block;
    margin: 20px auto;
    border-radius: 10px;
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2); /* Subtle shadow */
    border: 2px solid var(--color-green); /* Border for emphasis */
}

.container .row {
    margin-top: 80px; /* Adding space between rows */
    align-items: center; /* Vertically center the image and text */
}

.col-4 {
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center; /* Centering content in the column */
}

.col-6 {
    padding-left: 20px; 

}

.col-6 h1 {
    font-size: 32px; /* Larger font size for the title */
    margin-bottom: 20px;
    font-weight: 700;
}

.col-6 p {
    font-size: 18px; /* Bigger font for the paragraph */
    line-height: 1.6;
    color: var(--color-white);
}

.col-6 img {
    width: 80%; /* Scale down the additional image */
    margin-top: 30px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
}

.content 
{
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    padding: 20px;
    /* background-color:transparent; */
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
}
h1 
{
    font-size: 3em;
    margin-bottom: 10px;
    color: var(--color-white);
}
p 
{
    font-size: 1.2em;
    line-height: 1.5;
    margin-bottom: 20px;
    color: var(--color-white);
}     
.boxes 
{
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 80%;
    margin: 20px auto;
    padding: 20px;
    /* background-color: var(--color-black); */
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
}
.box p 
{
    font-size: 1em;
    line-height: 1.5;
    color: var(--color-black);
}

.box-number 
{
    display: flex;
    justify-content: center;
    align-items: center;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background-color: var(--color-green);
    color: var(--color-white);
    font-size: 2em;
    margin-bottom: 10px;
}
.box 
{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width: 28%;
    padding: 20px;
    height: 330px;
    background-color: var(--color-white);
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
}

.box h2 
{
    font-size: 2em;
    margin-bottom: 10px;
    color: var(--color-green);
}
    </style>
</head>
<body>
<script>

</script>
    <?php
    include "header.php";
 
    require "bookcon.php"; 

    $q = "SELECT * FROM tblbook";
    $res = mysqli_query($mysql, $q); ?>
    
    <div class="container mt-4" style="background-color: var(--color-grey); !important">
    <div class="container">
        <div class="image-container">
            <img src="image/sellImage.png" alt="recycle Image">
            
                <button class="recycle-button">
                    <a href="recycleBookform.php">Recycle Now</a>
                </button> 
                <!-- <?php #if (isset($_SESSION['Email'])) { ?> -->
                <!-- Button for viewing available notebooks -->
                <button class="recycle-button" style="left: 55%; background-color: var(--color-green);">
                    <a href="recycledNotebooks.php">View Available Notebooks</a>
                </button>

                <!-- <?php# }else{ ?> -->
                    <!-- <button class="recycle-button" onclick="redirectToLogin()">
                        <a href="recycleBookform.php">Recycle Now</a>
                    </button>  -->
                    <!-- Button for viewing available notebooks -->
                    <!-- <button class="recycle-button" style="left: 55%; background-color: var(--color-green);" onclick="redirectToLogin()">
                        <a href="recycledNotebooks.php">View Available Notebooks</a>
                    </button>
               <?php #} ?> -->
        </div>
        <div class="row d-flex justify-content-center w-100">
            <div class="col-3">
                <h2 class="text-white">Step 1</h2>
                <video width="320" height="240" loop autoplay muted>
                    <source src="image/ChooseMaterial.mp4" type="video/mp4"> 
                    <source src="image/ChooseMaterial.ogg" type="video/ogg"> 
                </video>
                <div>
                <h4 class="text-white">Choose material</h4>
                <p>Provide Books or Notebooks you want to recycle.</p>
                </div>
            </div>
            <div class="col-3">
                <h2 class="text-white">Step 2</h2>
                <video width="320" height="240" loop autoplay muted>
                    <source src="image/SchedulePickup.mp4" type="video/mp4"> 
                    <source src="image/SchedulePickup.ogg" type="video/ogg"> 
                </video>
                <div>
                <h4 class="text-white">Schedule Pickup</h4>
                <p>Select your preferred date and add the scrap pick-up location.</p>
                </div>
            </div>
            <div class="col-3">
                <h2 class="text-white">Step 3</h2>
                <video width="320" height="240" loop autoplay muted>
                    <source src="image/RecievePayment.mp4" type="video/mp4"> 
                    <source src="image/RecievePayment.ogg" type="video/ogg"> 
                </video>
                <div>
                <p class="text-white">Recieve Recycled Books</p>
                <p>Recieve Recycled Books in exchange of your books or notebooks</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
    <div class="row" style="display:flex; justify-content:between;">
        <div class="col-4">
            <img id="small-img" src="image/Screenshot 2024-09-20 205926.png" alt="Small Screenshot">
        </div>
        <div class="col-2"></div>
        <div class="col-6" style="color: var(--color-white);">
            <h1>Know Your Contribution to the Environment</h1>
            <p>The Cycle app allows you to check your environmental impact for the amount of scrap you sold to us. The impact is shown in terms of the natural resources you saved from 
            over-exploitation or the units of energy you preserved for a sustainable future.</p>
            <img src="image/Screenshot 2024-09-20 213302.png" alt="Additional Screenshot">
        </div>
    </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="content" style="color: var(--color-white);">
                <h1>Zero Waste Societies</h1>
                <p>With our zero waste management services we help your society to turn zero waste by incorporating zero waste practices within its residents & stakeholders.</p>

                <div class="boxes">
                    <div class="box">
                        <div class="box-number">1</div>
                        <h2>Why</h2>
                        <p>To promote the circular flow of materials to reduce the need for landfill space.</p>
                    </div>

                    <div class="box">
                        <div class="box-number">2</div>
                        <h2>Benefits</h2>
                        <p>Establishing circular economy benefits in reducing climate impact, conserving resources and minimizing pollution.</p>
                    </div>

                    <div class="box">
                        <div class="box-number">3</div>
                        <h2>Our Solution</h2>
                        <p>Our services help you prevent wasteful practices by reducing, reusing, and recycling waste to become a zero waste society.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <?php include "footer.php"; ?>
    <script>
// function redirectToLogin() {
//     alert("Please log in to  view recycled notebooks.");
//     window.location.href = 'registration.php';
// }
</script>
</body>
</html>
