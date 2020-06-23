<?php
include('includes/loginCheck.php');
include('includes/connection.php');
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
                <form class="" action="index.html" method="post">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="userName">Customer Name</label>
                                <input type="text" class="form-control" name="userName" placeholder="Customer name" readonly>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Email" readonly>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="mobileNo">Mobile No</label>
                                <input type="text" class="form-control" name="mobileNo" placeholder="Mobile No" readonly>
                            </div>
                        </div>
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
              <h3 class="card-title">Storage Device Details</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="form-group">
                    <label>Select Storage Device *</label>
                    <select class="form-control" name="storageDevice" requierd>
                        <option value="">Select Storage Device</option>
                        <option>Hard Disk</option>
                        <option>DVR</option>
                        <option>Pen Drive</option>
                        <option>Memory Card</option>
                    </select>
                </div>
                <div id="hardDiskDetail">
                    <div class="form-group">
                        <label for="company">Serial No. *</label>
                        <input type="text" class="form-control" name="serialNo" placeholder="Enter Serial No">
                    </div>
                    <div class="form-group">
                        <label for="company">Firmware No.</label>
                        <input type="text" class="form-control" name="firmwareNo" placeholder="Enter Firmware No">
                    </div>
                    <div class="form-group">
                        <label for="company">WWN No.</label>
                        <input type="text" class="form-control" name="wwnNo" placeholder="Enter WWN No">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Hard Disk Type *</label>
                                <select class="form-control" name="hardDiskType">
                                    <option value="">Type Of Hard Disk</option>
                                    <option>Desktop</option>
                                    <option>Portable</option>
                                    <option>SSD</option>
                                    <option>Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>SSD Type</label>
                                <select class="form-control" name="ssdType">
                                    <option value="">Select Type Of SSD</option>
                                    <option>NVME</option>
                                    <option>SATA</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                  <label for="company">Company *</label>
                  <input type="text" class="form-control" name="company" placeholder="Enter Company" required>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label for="storageCapacity">Storage Capacity *</label>
                            <input type="text" class="form-control" name="storageCapacity" placeholder="Enter Storage Capacity" required>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>Unit *</label>
                            <select class="form-control" name="storageUnit" required>
                                <option>MB</option>
                                <option>GB</option>
                                <option>TB</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="company">Priority</label>
                    <input type="text" class="form-control" name="priority" placeholder="Enter Priority Folder Name">
                </div>
                <div class="form-group">
                    <label>Problem *</label>
                    <textarea class="form-control" rows="3" placeholder="Enter Problem" name="problem" required></textarea>
                </div>
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
