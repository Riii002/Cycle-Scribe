<?php
session_start(); 
include 'connect.php';

$recycleId = 0;
$userId = 0;

?>

<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>View Recycle Request</title>

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
        <!-- Hero -->
        <div class="content">
            <div class="d-md-flex justify-content-md-end align-items-md-center py-3 pt-md-3 pb-md-0 text-center text-md-start">
            </div>
        </div>

        <!-- Page Content -->
        <div class="content">
            <div class="d-flex align-items-center justify-content-center mb-5">
                <div class="block block-rounded p-5"> 
                <form method='POST' action='request.php'> 
                <table class="table" id="userTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Number of Books/<br>Notebooks</th>
                            <th scope="col">Condition</th>
                            <th scope="col">Weight <br> (in gm)</th>
                            <th scope="col">Pages</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            // Updated query to join tbluser and tblrecyclerequest
                            $result = mysqli_query($con, "
                                SELECT r.*, u.userName,u.userId 
                                FROM tblrecyclerequest r 
                                INNER JOIN tbluser u ON r.userId = u.userId 
                                WHERE r.status = 'Pending'
                            ") or die("Error Occurred while fetching user records.".mysqli_error($con));

                            $count = 1;
                            while($row = mysqli_fetch_assoc($result)) {
                                $recycleId = $row['recycleId'];
                                $userId = $row['userId'];
                                $img = $row['recycleBookImg'];
                        ?>
                        <tr>
                            <td><?php echo $count++; ?></td>
                            <td><?php echo !empty($row['numOfBooks']) ? $row['numOfBooks'] : '-';?>
                            <br><?php echo !empty($row['numOfNotebook']) ? $row['numOfNotebook'] : '-'; ?></td>
                            <td><?php echo $row['cond']; ?></td>
                            <td><?php echo $row['weight']; ?></td>
                            <td><?php echo $row['pages']; ?></td>
                            <td><?php echo $row['userName'];?></td>                                
                            <td>
                                <a href="../uploads/recycle/<?php echo $img; ?>" target="_blank">
                                    <img src="../uploads/recycle/<?php echo $img; ?>" alt="image" width="100" height="150">
                                </a>
                            </td>
                            <td>
                                <form method='POST' action='request.php'>
                                    <input type='hidden' name='recycleId' value='<?php echo $recycleId; ?>'>
                                    <input type='hidden' name='userId' value='<?php echo $userId; ?>'>
                                    <button type='submit' class="btn btn-success mb-1" name='approve'>Approve</button>
                                    <button type="button" name="btnReject" class="btn btn-danger reject-btn" data-bs-toggle="modal" data-bs-target="#rejectModal" data-id="<?php echo $row['recycleId'] ?>">Reject</button>
                                </form>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                </form>
                
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Modal for Inputting Reject Reason -->
<div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rejectModalLabel">Reason for Rejection</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="rejectForm">
                    <input type="hidden" id="requestId" name="requestId">
                    <div class="form-group mb-3">
                        <label for="rejectReason" class="form-label">Reject Reason:</label>
                        <textarea class="form-control" id="rejectReason" name="rejectReason" rows="3" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
$(document).ready(function() {
    $('.table').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "pageLength": 3
    });
    
   // Show modal and set requestId in hidden input when Reject button is clicked
   $('.reject-btn').on('click', function () {
        var requestId = $(this).data('id');
        console.log(requestId);
        $('#requestId').val(requestId);  
        $('#rejectModal').modal('show'); 
    });

    $('#rejectForm').on('submit', function (e) 
    {
        e.preventDefault();
        var requestId = $('#requestId').val();  
        var rejectReason = $('#rejectReason').val();  
        console.log("Request ID: " + requestId);
        console.log("Reject Reason: " + rejectReason);
        $.ajax({
            url: 'update_reject_reason.php',  
            type: 'POST',
            data: { requestId: requestId, rejectReason: rejectReason },
            success: function (response) {
                console.log("Response: " + response);
                if (response == 'success') {
                    alert('Rejection reason updated successfully');
                    setTimeout(function() {
                        $('#rejectModal').modal('hide');  
                        location.reload(); // Reload the page to see the updated status
                }, 500); // 500 milliseconds delay
                } 
                else {
                    alert('Error updating reject reason');
                }
            },
            error: function (xhr, status, error) {
            console.log("AJAX error: " + error);
        }
        });
    });
});
</script>
            </div>
        </div>
    </div>
    
    <?php include 'footer.php'; ?>
    <!-- Scripts -->
    <script src="assets/js/dashmix.app.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

  </body>
</html>
