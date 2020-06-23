<?php
include('includes/loginCheck.php');
include('includes/connection.php');
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];
    $customerId = $_GET['customerId'];
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Data Solutions | Inventory</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!--Menu-->
  <?php include('includes/menu.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Service Detailed Information</h1>
          </div>
          <div class="col-sm-6">
            <!--<ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>-->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Customer Details</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form class="">
                    <div class="row">
                        <?php
                            $sql = "SELECT name,email,phone FROM customer WHERE id='$customerId'";
                            $result = mysqli_query($con, $sql);
        					if (mysqli_num_rows($result) > 0) {
        						$row = mysqli_fetch_assoc($result);
                        ?>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="userName">Customer Name</label>
                                <input type="text" class="form-control" value="<?php echo $row['name']; ?>" disabled>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" value="<?php echo $row['email']; ?>" disabled>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="mobileNo">Mobile No</label>
                                <input type="text" class="form-control" value="<?php echo $row['phone']; ?>" disabled>
                            </div>
                        </div>
                        <?php
                            }
                            else {
                                echo "Invalid Customer Id - No data found !";
                            }
                        ?>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Laptop Details</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <?php
                    $sql = "SELECT * FROM laptop WHERE id='$id'";
                    $result = mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                ?>
                <div class="form-group">
                    <label for="company">Company</label>
                    <input type="text" class="form-control" value="<?php echo $row['company']; ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="motherboardName">Model No</label>
                    <input type="text" class="form-control" value="<?php echo $row['model_no']; ?>" disabled>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" <?php echo ($row['with_adapter']==1 ? 'checked' : ''); ?> disabled>
                    <label class="" for="withAdapter">With Adapter</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" <?php echo ($row['with_battery']==1 ? 'checked' : ''); ?> disabled>
                    <label class="" for="withAdapter">With Battery</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" <?php echo ($row['with_harddisk']==1 ? 'checked' : ''); ?> disabled>
                    <label class="" for="withAdapter">With Hard Disk</label>
                </div>
                <div class="form-group">
                    <label>Problem</label>
                    <textarea class="form-control" rows="3" disabled><?php echo $row['problem']; ?></textarea>
                </div>
                <?php
                    }
                    else {
                        echo "Invalid Laptop Id - No data found !";
                    }
                ?>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.1
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="">Data Solutions</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
/*$(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
});*/
</script>
</body>
</html>
