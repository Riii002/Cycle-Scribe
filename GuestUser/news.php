<?php
    ob_start();
    session_start(); ?>
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
            background-color: var(--color-grey);
            margin: 0;
            min-height: 100vh;
            color: var(--color-white);
            font-family: 'Montserrat' !important;
        }
        h2 {
            font-weight: 700;
            margin-bottom: 30px;
            color: var(--color-white);
        }

        h1:hover {
            color: var(--primary-color);
        }

        .container {
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .card {
            background-color: var(--color-black);
            color: var(--color-white);
            border: none;
            height: 650px;
            border-radius: 15px;
            margin-bottom: 30px;
            transition: transform var(--transition-time), box-shadow var(--transition-time);
            font-family: 'Montserrat' !important;
        }

        .card:hover 
        {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5);
        }

        .card-img-top {
            border-radius: 15px 15px 0 0;
            height: 250px;
            object-fit: cover;
        }

        .card-body 
        {
            background-color: var(--color-black);
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .card-text 
        {
            color: #cfcfcf;
        }
        .card-title 
        {
            width: fit-content;
            margin-top: -30px;
            color: #ffffff; 
            background-color: #1aa84c;
            font-weight: 700; 
            font-size: 1.0rem; 
            text-align: center; 
            padding: 8px; 
            border-radius: 5px; 
            transition: transform 0.3s ease, box-shadow 0.3s ease; 
            margin-left: 5px;
        }

        .card-title:hover 
        {
            color: #ffffff; 
            background-color: #1aa84c; 
            transform: scale(1.05); 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); 
        }

        footer {
            background-color: var(--dark-bg);
            padding: 20px;
            text-align: center;
            color: var(--secondary-color);
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }

            .card-body {
                padding: 20px;
            }
        }
    </style>

    <?php
    $conn = mysqli_connect("localhost", "root", "", "cyclescribedb");
    if (!$conn) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }

    $Data = "SELECT * FROM tblnews";
    $result = mysqli_query($conn, $Data);
    ?>
</head>

<body>
    <?php include "header.php"; ?>

    <div class="container">
        <h2>Impact of Paper Production on Trees</h2>
        <div class="row">
            <?php while($r=mysqli_fetch_assoc($result)){ ?>
            <div class="col-md-4">
                <div class="card">
                    <img src="../uploads/news/<?php echo $r['image'] ?>" class="card-img-top" alt="">
                    <div class="card-title">
                            <?php echo $r['title'] ?>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><?php echo $r['description'] ?></p>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

    <?php include "footer.php"; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
