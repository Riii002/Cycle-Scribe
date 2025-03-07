<?php
ob_start();
session_start();
if(!(isset($_SESSION['Email'])))
{
    echo "<script>alert('Please Log In In Order To recycle Books!')</script>";
    echo "<script>window.location='registration.php'</script>";
}
$uid = $_SESSION['UserId'];
// $rid = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recycle Your Books or Notebooks</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <style>
  body {
    background-color: #222; 
    font-family: 'Montserrat' !important; /*Lato*/
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
.container{
    margin-bottom: 30px;
}

.form-section {
    padding: 30px 40px;
    width: 100%; 
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

/* Small screen adjustments */
@media (max-width: 768px) {
    .signup-container {
        flex-direction: column; 
    }

    .form-section {
        width: 100%; 
    }
}
</style>
</head>
<body>
  <div class="container"> 
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col-md-8"> 
        <h2 class="mb-3 text-center">Recycle Your Books or Notebooks</h2>
        <div class="d-flex justify-content-center align-items-center">
            <div class="form-group">
              <label><input type="radio" name="itemType" id="booksRadio" value="books" class="mx-2" checked>Books</label> 
              <label><input type="radio" name="itemType" id="notebooksRadio" value="notebooks" class="mx-2"> Notebooks</label>
            </div>
        </div>

        <div id="bookForm">
        <form action="" method="post" id="recycleBookForm" enctype="multipart/form-data">
            <h3>Book Details</h3>
            <div class="form-group">
                <label for="numOfBooks">Number of Books</label>
                <input type="text" class="form-control" id="numOfBooks" name="numOfBooks" placeholder="Enter number of books" style="color: white;" required>
            </div>
            <div class="form-group">
                <label for="pages">Number of Pages</label>
                <input type="number" class="form-control" id="pages" name="pages" min="50" placeholder="Enter number of pages" style="color: white;" required>
            </div>
            <div class="form-group">
                <label for="bweight">Weight (in grams)</label>
                <input type="number" class="form-control" id="bweight" name="bweight" placeholder="Enter weight of notebooks" style="color: white;" required>
            </div>
            <div class="form-group">
                <label for="condition">Condition</label>
                <select class="form-control" id="condition" name="condition" style="color: white;" required>
                    <option value="" disabled selected>(Select)</option>
                    <option value="new">New</option>
                    <option value="used">Used</option>
                    <option value="worn_out">Worn Out</option>
                </select>
            </div>
            <div class="form-group">
                <label for="bookImage">Upload Book Image</label>
                <input type="file" class="form-control-file" id="bookImage" name="bookImage" accept="image/*" required>
            </div>
            <input type="submit" class="btn btn-primary mt-3" name="recycleBook" value="Recycle Book">
          </form>
        </div>

        <div id="notebookForm" style="display: none;">
        <form action="" method="post" id="recycleNotebookForm" enctype="multipart/form-data">
            <h3>Notebook Details</h3>
            <div class="form-group">
                <label for="numOfNotebooks">Number of Notebooks</label>
                <input type="number" class="form-control" id="numOfNotebooks" name="numOfNotebooks" placeholder="Enter number of notebooks" style="color: white;" required>
            </div>
            <div class="form-group">
                <label for="pages">Number of Pages</label>
                <input type="number" class="form-control" id="pages" name="pages" min="50" placeholder="Enter number of pages" style="color: white;" required>
            </div>
            <div class="form-group">
                <label for="weight">Weight (in grams)</label>
                <input type="number" class="form-control" id="weight" name="weight" placeholder="Enter weight of notebooks" style="color: white;" required>
            </div>
            <div class="form-group">
                <label for="notebookImage">Upload Notebook Image</label>
                <input type="file" class="form-control-file" id="notebookImage" name="notebookImage" accept="image/*" required>
            </div>
            <input type="submit" class="btn btn-primary mt-3" name="recycleNotebook" value="Recycle Notebook">
          </form>
        </div>
      </div> 
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- jQuery Validation Plugin -->
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>
  
  <!-- Validation  -->
  <script>
$(document).ready(function() {

    $("#recycleBookForm").validate({
        rules: {
            numOfBooks: {
                required: true,
                digits: true
            },
            pages: {
                required: true,
                minlength: 2
            },
            bweight: {
                required: true
            },
            condition: {  
                required: true
            },
            bookImage: {
                required: true,
                extension: "jpg,jpeg,png"
            }
        },
        messages: {
            numOfBooks: {
                digits: "Please enter digits only."
            },
            bookImage: {
                extension: "Please select a valid image file (jpg, jpeg, png)."
            }
        }
    });

    $("#recycleNotebookForm").validate({
        rules: {
            numOfNotebooks: {
                required: true,
                digits: true
            },
            pages: {
                required: true,
                digits: true
            },
            notebookPrice: {
                required: true,
                number: true
            },
            notebookImage: {
                required: true,
                extension: "jpg,jpeg,png"
            }
        },
        messages: {
            notebookImage: {
                extension: "Please select a valid image file (jpg, jpeg, png)."
            },
            notebookPrice: {
                number: "Please enter a valid price (can be decimal)."
            }
        }
    });
});
  </script>

  <script>
    document.getElementById('booksRadio').addEventListener('change', function() {
      document.getElementById('bookForm').style.display = 'block';
      document.getElementById('notebookForm').style.display = 'none';
    });

    document.getElementById('notebooksRadio').addEventListener('change', function() {
      document.getElementById('bookForm').style.display = 'none';
      document.getElementById('notebookForm').style.display = 'block';
    });
  </script>
</body>
</html>

<?php
    include 'bookcon.php';

    if(isset($_REQUEST['recycleBook']))
    {
        $numOfBooks = $_POST['numOfBooks'];
        $pages = $_POST['pages'];
        $weight = $_POST['bweight'];
        $condition = $_POST['condition'];
        $bookImage = $_FILES['bookImage']['name'];
        $loc = $_FILES["bookImage"]["tmp_name"];
        $userId = $_SESSION['UserId'];

        $query = "INSERT INTO tblrecyclerequest (numOfBooks, pages, weight, cond, recycleBookImg, isNotebook,status,userid) VALUES ('$numOfBooks', '$pages', '$weight', '$condition', '$bookImage', '0','Pending','$userId')";
        
        if (mysqli_query($mysql, $query)) 
        {
            $rid = mysqli_insert_id($mysql);
            move_uploaded_file($loc, "../uploads/recycle/" . $bookImage);
            $_SESSION['RecycledRequest'] = "Pending";
            echo "<script>window.location='recycledNotebooks.php?rid=$rid&uid=$userId'</script>";
        } 
        else {
            die("Error: " . mysqli_error($mysql));
        }

    }

    if(isset($_REQUEST['recycleNotebook']))
    {
        $notebooks = $_POST['numOfNotebooks'];
        $pages = $_POST['pages'];
        $weight = $_POST['weight'];
        $notebookImage = $_FILES['notebookImage']['name'];
        $loc = $_FILES["notebookImage"]["tmp_name"];
        $userId = $_SESSION['UserId'];
        $query = "INSERT INTO tblrecyclerequest (numOfNotebook, pages, weight, recycleBookImg, isNotebook,status,userid) VALUES ('$notebooks', '$pages', '$weight', '$notebookImage', '1','Pending','$userId')";
        
        if (mysqli_query($mysql, $query)) 
        {
            $rid = mysqli_insert_id($mysql);
            move_uploaded_file($loc, "../uploads/recycle/" . $notebookImage);
            $_SESSION['RecycledRequest'] = "Pending";
            echo "<script>window.location='recycledNotebooks.php?rid=$rid&uid=$userId'</script>";
        } 
        else {
            die("Error: " . mysqli_error($mysql));
        }
    }

?>