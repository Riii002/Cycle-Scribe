<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css"/>
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
            background-color: var(--color-grey) ;
            color: #ffffff;
            font-family: 'Montserrat', sans-serif;
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
            height: 350px;
            object-fit: fill;
        }

        .container 
        {
            margin-top: 50px;
            margin-bottom: 30px;
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
    </style>

    <?php
    $conn = mysqli_connect("localhost", "root", "", "cyclescribedb");
    if (!$conn) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }

    $memberData = "SELECT * FROM tblMembers";
    $result = mysqli_query($conn, $memberData);
    ?>
</head>

<body style="background-color: var(--color-grey) !important;">
    <?php include "header.php"; ?>

    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 style="color:white">Meet Our Members</h1>
            </div>
        </div>
        <div class="row p-2">
            <?php
            if (mysqli_num_rows($result) > 0) 
            {
                while ($row = mysqli_fetch_assoc($result)) 
                {
                    ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="../uploads/members/<?php echo $row['img']; ?>" class="card-img-top" alt="Image of <?php echo $row['name']; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['name']; ?></h5>
                                <div class="card-text"><?php echo $row['role']; ?></div>
                                <div class="card-text"><small class="text-muted">
                                    <?php echo $row['email']; ?></small>
                                    <div class="social-icons">
                                        <a href="<?php echo $row['insta'] ?>">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                        <a href="<?php echo $row['mail'] ?>">
                                            <i class="fas fa-envelope"></i>
                                        </a>
                                        <a href="<?php echo $row['linkedin'] ?>">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } 
            else 
            {
                echo "<p class='text-white'>No members found</p>";
            }
            ?>
        </div>
    </div>

    <?php include "footer.php"; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
