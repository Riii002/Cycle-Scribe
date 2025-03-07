<?php
include 'bookcon.php';

if (isset($_POST['title'])) {
    $title = mysqli_real_escape_string($mysql, $_POST['title']);
    $q = "SELECT * FROM tblbook WHERE `title` LIKE '%$title%'";
    $bookres = mysqli_query($mysql, $q);

    if (mysqli_num_rows($bookres) > 0) 
    {
        while ($r = mysqli_fetch_assoc($bookres)) 
        { 
            $bookId = $r['bookId']; ?> 
                        <div class='col-md-6 col-lg-4 mb-4' style="background-color: var(--color-grey); !important"> 
                            <div class='product-card card h-100'>
                                <img src='../uploads/book/<?php echo $r['bookImg']?>' class='card-img-top' alt='Book Image'>
                                <div class='card-body'>
                                    <h4 class='card-title text-white'>
                                        <?php echo $r['title']; ?>
                                    </h4>
                                    <form action="orderform.php" method="GET">
                                        <input type="hidden" name="bookid" value="<?php echo $bookId; ?>">
                                        <p class='card-text text-white'  style='max-height: 100px; overflow-y: auto; display: block'>
                                            <strong>Author:</strong> 
                                            <?php echo $r['author']; ?> <br>
                                            <strong>Category:</strong>
                                            <?php echo $r['category']; ?> <br>
                                            <strong>Description:</strong>
                                            <?php echo $r['description']; ?> <br>
                                            <strong>Price:</strong> ₹
                                            <?php echo $r['price']; ?> <br>
                                            <strong>Payment Method:</strong> 
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
                                    </form>
                                </div>
                            </div>
                        </div>
    <?php    }
    } 
    else {
        echo "<p class='text-white text-center'>No products found.</p>";
    }
} 
else {
    echo "<p class='text-white'>Invalid search query.</p>";
}
?>
