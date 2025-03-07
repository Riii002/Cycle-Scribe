<?php
ob_start();
session_start();
include 'bookcon.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Books</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="styles.css"/>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
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

        .container {
            margin-bottom: 30px;
        }

        .product-card {
            height: 100%;
            background-color: var(--color-black);
        }

        .product-card img {
            height: 400px;
            object-fit: fill;
            width: 100%;
        }

        .product-card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5);
        }

        .product-card .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            background-color: var(--color-black);
        }

        .card-title {
            font-weight: 600;
            padding: 0;
            margin: 0;
        }

        #search-results {
            margin-top: 20px;
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
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

        input[type="text"] {
            width: 100%;
        }

        .input-group {
            width: 100%;
        }

        .input-group + #search-results {
            clear: both;
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
        }

        #result {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
        }
    </style>
</head>
<body>

<script>
$(document).ready(function() {
    $('#btnSearch').on('input', function() {
        var search = $(this).val(); 

        if (search.length > 0) {
            $.ajax({
                url: 'ajax_search.php',
                type: 'POST',
                data: { title: search },
                success: function(response) {
                    $('#search-results').html('<div class="row">' + response + '</div>');
                },
                error: function() {
                    $('#search-results').html('<p class="text-white">Error searching for books. Please try again.</p>');
                }
            });
        } else {
            $.ajax({
                url: 'ajax_search.php',
                type: 'POST',
                data: { title: '' },
                success: function(response) {
                    $('#search-results').html('<div class="row">' + response + '</div>');
                },
                error: function() {
                    $('#search-results').html('<p class="text-white">Error searching for books. Please try again.</p>');
                }
            });
        }
    });
});
</script>

<?php
include "header.php"; 
require "bookcon.php";

$q = "SELECT * FROM tblbook";
$bookres = mysqli_query($mysql, $q); 
?>

<div class="container mt-4">
    <div class="row mt-3 mb-5">
        <div class="col-sm-12">
            <label class="visually-hidden" for="btnSearch">Search</label>
            <div class="input-group">
                <div class="input-group-text"><i class="bi bi-search"></i></div>
                <input type="text" class="form-control" name="btnSearch" id="btnSearch" placeholder="Search Book">
            </div>
        </div>
    </div>

    <div id="search-results" class="row"></div>

    <div id='result' class='row'>
    <?php 
    if ($bookres && mysqli_num_rows($bookres) > 0) {
        while ($r = mysqli_fetch_assoc($bookres)) { 
            $bookId = $r['bookId']; ?>
            <div class='col-md-6 col-lg-4 mb-4'>
                <div class='product-card card h-100'>
                    <img src='../uploads/book/<?php echo $r['bookImg']?>' class='card-img-top' alt='Book Image'>
                    <div class='card-body'>
                        <h5 class='card-title text-white'><?php echo $r['title']; ?></h5>
                        <p class='card-text text-white'>
                            <strong>Author:</strong> <?php echo $r['author']; ?><br>
                            <strong>Category:</strong> <?php echo $r['category']; ?><br>
                            <strong>Description:</strong> <?php echo $r['description']; ?><br>
                            <strong>Price:</strong> ₹<?php echo $r['price']; ?><br>
                        </p>

                        <?php if ($r['quantity'] <= 0) { ?>
                            <input type="submit" value="Out Of Stock" name="btnBuy" class='btn btn-dark mt-1' disabled>
                        <?php } 
                        else { ?>
                            <?php if (isset($_SESSION['Email'])) { ?>
                                <!-- User logged in, form submits to orderform.php -->
                                <form action="orderform.php" method="GET">
                                    <input type="hidden" name="bookid" value="<?php echo $bookId; ?>">
                                    <input type="submit" value="Buy Now" name="btnBuy" class='btn btn-success mt-1'>
                                </form>
                            <?php } 
                            else { ?>
                                <!-- User not logged in, show alert and redirect -->
                                <input type="button" value="Buy Now" class='btn btn-success mt-1' onclick="redirectToLogin()">
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } 
    } else {
        echo "<p>No books available.</p>";
    }
    ?>
    </div>
</div>

<?php include "footer.php"; ?>

<script>
function redirectToLogin() {
    alert("Please log in to buy this book.");
    window.location.href = 'registration.php';
}
</script>

</body>
</html>
