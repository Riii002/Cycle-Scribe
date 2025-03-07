<?php 
    session_start(); 
    include 'connect.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Order History</title>
    
    <link rel="stylesheet" id="css-main" href="assets/css/dashmix.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  </head>

  <body>
    <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">
      <!-- Sidebar and Header -->
      <?php include 'sidebar.php'; ?>
      <?php include 'header.php'; ?>

      <!-- Main Container -->
      <main id="main-container">
        <div class="content">
          <div class="d-md-flex justify-content-md-end align-items-md-center py-3 pt-md-3 pb-md-0 text-center text-md-start">
            <div>
              <select name="status" id="status" class="form-select">
                <option value="">Select Status</option>
                <?php 
                $q1="SELECT DISTINCT orderStatus FROM tblOrder";
                $res = mysqli_query($con, $q1);
                if(mysqli_num_rows($res) > 0) {
                    while($r = mysqli_fetch_assoc($res)) { ?>
                      <option value='<?php echo $r['orderStatus'] ?>'><?php echo $r['orderStatus'] ?></option>
                <?php }} ?>
              </select>
            </div>               
          </div>
        </div>

        <!-- Page Content -->
        <div class="content">
          <div class="d-flex align-items-center justify-content-center mb-5">
            <div class="block block-rounded p-5">  
              <table class="table" id="userTable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">Order Amount</th>
                    <th scope="col">Payment Method</th>
                    <th scope="col">Tracking Number</th>
                    <th scope="col">Order Status</th>
                  </tr>
                </thead>
                <tbody id="orderTableBody">
                  <!-- Order records will be loaded here -->
                </tbody>
              </table>

              <!-- DataTables Script -->
              <script>
                $(document).ready(function() 
                {
                    // Initialize DataTable
                    var table = $('#userTable').DataTable({
                        "paging": true,
                        "lengthChange": true,
                        "searching": true,
                        "ordering": true,
                        "info": true,
                        "autoWidth": false,
                        "pageLength": 3
                    });

                    // On change of status dropdown
                    $('#status').change(function() {
                        var status = $(this).val();

                        // Send AJAX request to filter orders
                        $.ajax({
                            url: 'filterOrders.php', // PHP file to handle filtering
                            type: 'POST',
                            data: {status: status},
                            success: function(response) {
                                // Destroy the existing DataTable instance
                                table.destroy();

                                // Update the table body with the filtered data
                                $('#orderTableBody').html(response);

                                // Reinitialize DataTable after updating the content
                                table = $('#userTable').DataTable({
                                    "paging": true,
                                    "lengthChange": true,
                                    "searching": true,
                                    "ordering": true,
                                    "info": true,
                                    "autoWidth": false,
                                    "pageLength": 3
                                });
                            }
                        });
                    });
                });
                </script>
            </div>
          </div>
        </div>
      </main>

      <!-- Footer -->
      <?php include 'footer.php'; ?>
    </div>

    <script src="assets/js/dashmix.app.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  </body>
</html>
