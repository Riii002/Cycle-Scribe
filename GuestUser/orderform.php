<?php 
  session_start();
  include 'bookcon.php';
  
  $bookId = $_GET['bookid'];
  $userId = $_SESSION['UserId'];
  
  $query = "select * from tblorder";
  $res = mysqli_query($mysql,$query) or die("Query Failed!");
  
  $q = "select * from tbluser where userid='$userId'";
  $result = mysqli_query($mysql,$q) or die("Query Failed!");
  $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Place Your Order</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- <script src="https://kit.fontawesome.com/your-fontawesome-kit-id.js" crossorigin="anonymous"></script> -->
  <style>
  body 
  {
    background-color: #222; 
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    margin: 0;
  }

  .signup-container {
      background-color: #333;
      border-radius: 8px;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
      overflow: hidden; 
      display: flex;
      max-width: 800px;
      width: 100%;
  }

  .form-section {
      padding: 30px 40px;
      width: 50%; 
  }

  .info-section {
      background-color: #008000; 
      color: white;
      padding: 30px 40px;
      width: 50%;
      text-align: center; 
  }

  h2 {
      font-weight: 600;
      margin-bottom: 20px;
  }

  .form-control {
      background-color: #444;
      border: 1px solid #555;
      color: white;
      border-radius: 4px; 
  }

  .form-control:focus {
      background-color: #555;
      border-color: #888; 
      outline: none;
  }

  .btn-primary {
      background-color: #008000;
      border: none;
      padding: 10px 20px;
      border-radius: 4px;
      font-weight: 600;
      cursor: pointer;
      transition: background-color 0.3s; 
  }

  .btn-primary:hover {
      background-color: #006400;
  }

  .logo img { 
      width: 60px; 
      height: auto; 
      display: block;
      margin: 0 auto 20px; 
  }

  @media (max-width: 768px) {
      .signup-container {
          flex-direction: column; 
      }

      .form-section, .info-section {
          width: 100%; 
      }
  }
</style>
</head>
<body>
  <div class="container"> 
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col-md-8">
      <h2 class="mb-3 text-center">Buy Book</h2> 
        <form action="#" method="post" id="orderForm"> 
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" style="color: white;" value="<?php echo $row['userName']; ?>" required>
          </div>
          <div class="row">
            <div class="col-md-6">
          <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="tel" class="form-control" id="phone" name="phone" style="color: white;" value="<?php echo $row['phoneNumber']; ?>" required>
          </div>
          </div>
          <div class="col-md-6" >
          <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" class="form-control" id="email" name="email" style="color: white;" value="<?php echo $row['email']; ?>" required>
          </div>
          </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
              <label for="qty">Quantity</label>
              <select name="qty" class="form-control" id="qty" style="color: white;" onchange="updateOrderAmount()" required>
              <option value="" disabled selected>(select)</option>  
              <?php for($i=1;$i<=10;$i++){ ?>
                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                <?php } ?>
            </select>
            </div>
          </div>
          </div>
        <div class="form-group">
            <label for="address">Shipping Address</label>
            <textarea id="address" name="address" class="form-control" rows="4"  style="color: white;" required><?php echo $row['address']; ?></textarea>
        </div>
  
        <div class="row">
            <div class="col-md-6">
            <?php 
            include 'bookcon.php';
            $paymentMethod = "Select DISTINCT paymentMethod from tblOrder";
            $paymentMethodData = mysqli_query($mysql,$paymentMethod);
            ?>
            <div class="form-group">
            <label for="paymentMethod">Payment Method</label>
            <select name="paymentMethod" id="paymentMethod"  class="form-control" style="color: white;" required>
              <?php
                if (mysqli_num_rows($paymentMethodData) > 0) 
                {         
                  while ($r = mysqli_fetch_assoc($paymentMethodData)) { ?>
                    <option value="<?php echo $r['paymentMethod']; ?>">
                      <?php echo $r['paymentMethod']; ?>
                    </option>
              <?php }
              } 
              else 
              {
                  echo '<option>No Payment Methods Available</option>';
              }
              ?>
          </select>
        </div>
          </div>
          <div class="col-md-6" >
          <div class="form-group">
            <label for="orderAmount">order Amount</label>
            <?php
              $queryBook = "select * from tblbook where bookid = '$bookId'"; 
              $bookData = mysqli_query($mysql,$queryBook);
              if(mysqli_num_rows($bookData) > 0){
                $r=mysqli_fetch_assoc($bookData);
            ?>
            <input type="text" class="form-control" id="orderAmount" name="orderAmount" style="color: white;" readonly required>
            <?php }?>
          </div>
          </div>
          </div>
          <button type="submit" class="btn btn-primary mt-3" name="order">Purchase</button>
        </form>
      </div> 
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- jQuery Validation Plugin -->
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>


  <script>
    var bookPrice = <?php echo $r['price']; ?>;
  
    function updateOrderAmount() 
    {
      var qty = $('#qty').val(); 
      var orderAmount = (bookPrice * qty).toFixed(2); 
      $('#orderAmount').val(orderAmount);
      $('#orderAmount').focus();
    }
    $(document).ready(function(){
      $("#orderForm").validate({
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
              qty: {  
                  required: true,
                  digits: true 
              },
              address: {
                  required: true,
                  minlength: 35,
                  maxlength: 300
              },
              orderAmount: {
                  required: true,
                  number: true 
              }
          },
          messages: {
              phone: {
                  digits: "Please enter a valid phone number with digits only."
              },
              qty: {
                  digits: "Please enter a valid quantity (whole number)."
              },
              orderAmount: {
                  number: "Please enter a valid order amount (can be decimal)."
              },
              address: {
                required: "Please enter your address.",
                minlength: "Your address must be at least 35 characters long.",
                maxlength: "Your address must be no more than 300 characters."
          }
        }
      });
});
</script>

</body>
</html>
<?php
  include 'bookcon.php';
  if(isset($_REQUEST['order']))
  {
      $name = $_POST['name'];
      $phone = $_POST['phone'];
      $email = $_POST['email'];
      $qty = $_POST['qty'];
      $address = $_POST['address'];
      $paymentMethod = $_POST['paymentMethod'];
      $orderAmount = $_POST['orderAmount'];      

      $orderQuery = "INSERT INTO tblOrder (quantity, userId, orderDate, ShippingAdd, cno, orderAmount, paymentMethod, orderStatus) VALUES ('$qty', '$userId', NOW(), '$address', '$phone','$orderAmount', '$paymentMethod', 'Pending')";

      mysqli_query($mysql, $orderQuery);
      $orderId = mysqli_insert_id($mysql);
      $bookQuery = "UPDATE tblbook SET quantity = quantity - '$qty' WHERE bookId = '$bookId'";
      mysqli_query($mysql, $bookQuery);
      echo "<script>alert('Order placed successfully! Your order ID is $orderId.');</script>";
  }
?>