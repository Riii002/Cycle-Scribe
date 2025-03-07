<?php 
    session_start(); 
    include 'connect.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>View Feedback</title>

    <!-- Meta and Styles -->
    <meta name="description" content="Feedback and Inquiries from users">
    <link rel="stylesheet" id="css-main" href="assets/css/dashmix.min.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  </head>
  <body>
    <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">
     
      <!-- Sidebar -->
      <?php include 'sidebar.php'; ?>
      <!-- Header -->
      <?php include 'header.php'; ?>      

      <!-- Main Container -->
      <main id="main-container">
        <!-- Hero Section -->
        <div class="content">
            <div class="d-md-flex justify-content-md-end align-items-md-center py-3 pt-md-3 pb-md-0 text-center text-md-start">               
            </div>
        </div>

        <!-- Page Content -->
        <div class="content">
            <div class="d-flex align-items-center justify-content-center mb-5">
                <div class="block block-rounded p-5">  
                  <table class="table" id="feedbackTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <!-- <th scope="col">User Name</th> -->
                            <th scope="col">Email</th> 
                            <th scope="col">Contact Number</th> 
                            <th scope="col">Subject</th>
                            <th scope="col">Feedback</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $result = mysqli_query($con, "SELECT * FROM tblFeedback") or die("Error fetching feedback records.".mysqli_error($con));
                            $count = 1;
                            while($row = mysqli_fetch_assoc($result))
                            {
                                $feedbackId = $row['feedbackId'];
                                ?>
                        <tr>
                            <td><?php echo $count; $count++; ?></td>
                            <!-- <td><?php echo $row['userName']; ?></td> -->
                            <td><?php echo $row['email']; ?></td> 
                            <td><?php echo $row['contactNo']; ?></td> 
                            <td><?php echo $row['subject']; ?></td>
                            <td><?php echo $row['feedbackMessage']; ?></td>
                            <td><?php echo $row['dtDateTime']; ?></td>
                            <td>
                                <button class="btn btn-danger btnDelete" data-id="<?php echo $feedbackId; ?>" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                  </table>

                  <!-- DataTables Script -->
                  <script>
                      $(document).ready(function() {
                          $('#feedbackTable').DataTable({
                              "paging": true,
                              "lengthChange": true,
                              "searching": true,
                              "ordering": true,
                              "info": true,
                              "autoWidth": false,
                              "pageLength": 3
                          });
                      });
                  </script>
                </div>
            </div>
        </div>
        
      </main>
      
      <!-- Delete Modal -->
      <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Feedback</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this feedback?
                </div>
                <div class="modal-footer">
                    <form action="" method="post">
                        <input type="hidden" id="txtDelFeedbackId" name="txtDelFeedbackId" />
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-primary" name="yesDelFeedback">Yes</button>
                    </form>
                </div>
            </div>
        </div>
      </div>
      
      <!-- Footer -->
      <?php include 'footer.php'; ?>
      
    </div>

    <!-- Scripts -->
    <script src="assets/js/dashmix.app.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script>
        // Attach delete button click event
        $(document).on('click', '.btnDelete', function() {
            var feedbackId = $(this).data('id');
            $('#txtDelFeedbackId').val(feedbackId);
        });
    </script>

    <?php 
    if(isset($_POST['yesDelFeedback'])) 
    {
        $fid = $_POST['txtDelFeedbackId'];
        $sql = "DELETE FROM tblFeedback WHERE feedbackId = $fid";
        $res = mysqli_query($con, $sql);
        if($res) {
            // echo "<script>alert('Feedback deleted successfully!'); window.location.href='viewFeedback.php';</script>";
        } else {
            echo "<script>alert('Failed to delete feedback.');</script>";
        }
    }
    ?>
  </body>
</html>
