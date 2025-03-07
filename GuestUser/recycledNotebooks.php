<?php 
ob_start();
session_start();
include 'bookcon.php';

if(!(isset($_SESSION['Email'])))
{
    echo "<script>alert('Please Log In In Order To View This Page!')</script>";
    echo "<script>window.location='registration.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recycled Notebooks</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    <style>
      :root 
        {
            --color-grey: #121212ee; 
            --color-green: #1aa84c; 
            --color-darkgreen: #0b5525; 
            --color-black: #000000;
            --color-white: #FFFFFF;
        }
        body 
        {
            background-color: #121212;
            color: #ffffff;
            font-family: 'Montserrat' !important; /*Lato*/
            background-color: var(--color-grey);
            margin: 0;
            min-height: 100vh;
            color: var(--color-white);
            font-family: 'Montserrat' !important;
        }

        h1 
        {
            font-weight: 700;
            margin-bottom: 30px;
        }

        .card-title 
        {
            color: #1aa84c;
            font-weight: 600;
        }

        .text-muted 
        {
            color: #bbbbbb !important;
        }

        .card 
        {
            background-color: var(--color-black);
            border: none;
            border-radius: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            margin-top: 20px;
            margin-left: 8px;
        }

        .card:hover 
        {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5);
        }

        .card-body 
        {
            background-color: var(--color-black);
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .card-img-top 
        {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            height: 250px;
            object-fit: fill;
        }

        .container 
        {
            margin-top: 20px;
        }

        .card-text 
        {
            color: #cfcfcf;
        }

        .card-body .social-icons 
        {
            margin-top: 10px;
        }

        .social-icons i 
        {
            margin-right: 10px;
            color: #1aa84c;
            transition: color 0.3s ease;
        }
        .social-icons a 
        {
            text-decoration: none;
        }

        .social-icons i:hover 
        {
            color: #ffffff;
        }
        .container{
            margin-bottom: 30px;
        }
        .no-notebooks-message {
            margin-top: 20px;
            text-align: center;
        }
    </style>

    <?php
    
    $conn = mysqli_connect("localhost", "root", "", "cyclescribedb");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $userid = $_SESSION['UserId'];
    if(isset($_GET['rid']))
    {
        $rid = $_GET['rid'];
        $recycleData = "SELECT * FROM tblrecycledbook WHERE userid = '$userid' and reqId='$rid'";
        $result = mysqli_query($conn, $recycleData);
    }
    if(!isset($_GET['rid']))
    {
        $recycleData = "SELECT * FROM tblrecycledbook WHERE userid = '$userid'";
        $result = mysqli_query($conn, $recycleData);
    }
    ?>
</head>

<body>
    <?php include "header.php"; ?>

    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center w-100" style="color:white">Available Recycled Notebooks</h1>
        </div>
    </div>

    <div class="row mt-4">
        <?php          
        $recycleQ = "select * from tblrecyclerequest where userid = '".$_SESSION['UserId']."'";
        $res = mysqli_query($mysql,$recycleQ);
        $r=mysqli_fetch_assoc($res);        
        if($r["status"] == "Pending")
        {
            echo "<h3 class='text-white text-center'>Your request is still being proccessed. Please wait for some time.</h3>";
        }
        
        if (isset($_SESSION["RecycledRequest"])) 
        {
         if($_SESSION["RecycledRequest"] == "Rejected")
         {

             $userid = $_SESSION['UserId']; 
             $conn = mysqli_connect("localhost", "root", "", "cyclescribedb");
     
             
             if (!$conn) {
                 die("Connection failed: " . mysqli_connect_error());
             }
     
             $sql = "SELECT rejectReason FROM tblrecyclerequest WHERE userId = '$userid' AND status = 'Rejected' ORDER BY recycleId DESC LIMIT 1";
             $result = mysqli_query($conn, $sql);
             
             if(mysqli_num_rows($result) > 0) 
             {
                 $row = mysqli_fetch_assoc($result);
                 $rejectReason = $row['rejectReason']; // Fetch the rejection reason
                 echo "<h3 class='text-white'>Oops! Looks like your request was rejected.</h3>";
                 echo "<p class='text-white'>Reason: <strong>" . $rejectReason . "</strong></p>";
             } 
             else 
             {
                 echo "<h1>Your request has been rejected, but no reason was provided.</h1>";
             }
         }
        //  if($_SESSION["RecycledRequest"] == "Pending")
        //  {
        //     echo "<h3 class='text-white text-center'>Your request is still being proccessed. Please wait for some time.</h3>";
        //  }
        }
        if (mysqli_num_rows($result) > 0) 
        {
            while ($row = mysqli_fetch_assoc($result)) 
            {
                echo "<span class='text-center text-white fw-bold'>You get ". $row['exchangeValue']." recycled books.</span>";
                $exchangeValue = (int)$row['exchangeValue'];
                for ($i = 0; $i < $exchangeValue; $i++) 
                {
                ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="../uploads/recycled/<?php echo $row['img']; ?>" class="card-img-top" alt="Image" >
                        <div class="card-body">
                            <div class="card-text">
                            <b>Weight : </b> 
                                <?php echo round($row['weight']/$row['exchangeValue'],2); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }
            }
        } 
        ?>
    </div>
    </div>

    <?php include "footer.php"; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
