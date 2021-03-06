<?php
include('includes/loginCheck.php');
include('includes/connection.php');
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];
    $customerId = $_GET['customerId'];
    $type = $_GET['type'];
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
                                        <div class="col-12 col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label for="userName">Name</label>
                                                <input type="text" class="form-control" value="<?php echo $row['name']; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" value="<?php echo $row['email']; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-4">
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
                            <h3 class="card-title">Storage Device Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php
                            $sql = "";
                            //echo $type;
                            if ($type=="harddisk") {
                                $sql = "SELECT * FROM harddisk WHERE id='$id'";
                            }
                            else if ($type=="pendrive") {
                                $sql = "SELECT * FROM pendrive WHERE id='$id'";
                            }
                            else if ($type=="memorycard") {
                                $sql = "SELECT * FROM memorycard WHERE id='$id'";
                            }
                            else if ($type=="dvr") {
                                $sql = "SELECT * FROM dvr WHERE id='$id'";
                            }
                            //echo $sql;
                            $result = mysqli_query($con, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                $row = mysqli_fetch_assoc($result);
                                ?>
                                <div class="row">
                                    <div class="form-group col-12 col-sm-12 col-md-6">
                                        <label>Select Storage Device *</label>
                                        <select class="form-control" disabled>
                                            <option <?php if ($type=="hardisk") echo "selected"; else echo ""; ?>>Hard Disk</option>
                                            <option <?php if ($type=="dvr") echo "selected"; else echo ""; ?>>DVR</option>
                                            <option <?php if ($type=="pendrive") echo "selected"; else echo ""; ?>>Pen Drive</option>
                                            <option <?php if ($type=="memorycard") echo "selected"; else echo ""; ?>>Memory Card</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-12 col-sm-12 col-md-6">
                                        <label for="company">Company</label>
                                        <input type="text" class="form-control" value="<?php echo $row['company']; ?>" disabled>
                                    </div>
                                </div>
                                <?php
                                if ($type=="harddisk") {
                                    ?>
                                    <div class="row">
                                        <div class="form-group col-12 col-sm-12 col-md-4">
                                            <label for="company">Serial No. *</label>
                                            <input type="text" class="form-control" value="<?php echo $row['serial_no']; ?>" disabled>
                                        </div>
                                        <div class="form-group col-12 col-sm-12 col-md-4">
                                            <label for="company">Firmware No.</label>
                                            <input type="text" class="form-control" value="<?php echo $row['firmware_no']; ?>" disabled>
                                        </div>
                                        <div class="form-group col-12 col-sm-12 col-md-4">
                                            <label for="company">WWN No.</label>
                                            <input type="text" class="form-control" value="<?php echo $row['wwn_no']; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12 col-sm-12 col-md-6">
                                            <label>Hard Disk Type *</label>
                                            <select class="form-control" disabled>
                                                <option>Desktop</option>
                                                <option>Portable</option>
                                                <option>SSD</option>
                                                <option>Other</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-12 col-sm-12 col-md-6">
                                            <label>SSD Type</label>
                                            <select class="form-control" disabled>
                                                <option value="">Select Type Of SSD</option>
                                                <option>NVME</option>
                                                <option>SATA</option>
                                            </select>
                                        </div>
                                        <input type="hidden" name="type" value="<?php echo $type;?>">
                                        <input type="hidden" name="id" value="<?php echo $id;?>">
                                    </div>
                                    <?php
                                }
                                ?>
                                <div class="row">
                                    <div class="form-group col-12 col-sm-12 col-md-6">
                                        <label for="storageCapacity">Storage Capacity *</label>
                                        <input type="text" class="form-control" value="<?php echo $row['storage_capacity']; ?>" disabled>
                                    </div>
                                    <div class="form-group col-12 col-sm-12 col-md-6">
                                        <label>Unit *</label>
                                        <select class="form-control" name="storageUnit" disabled>
                                            <option <?php if ($row['storage_unit']=="MB") echo "selected"; else echo ""; ?>>MB</option>
                                            <option <?php if ($row['storage_unit']=="GB") echo "selected"; else echo ""; ?>>GB</option>
                                            <option <?php if ($row['storage_unit']=="TB") echo "selected"; else echo ""; ?>>TB</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="priority">Priority</label>
                                    <input type="text" class="form-control" value="<?php echo $row['priority'] ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Problem *</label>
                                    <textarea class="form-control" rows="3" disabled><?php echo $row['problem'] ?></textarea>
                                </div>
                                <form action="updateStorageDeviceStatus.php" method="POST">
                                    <div class="row">
                                        <div class="form-group col-12 col-sm-12 col-md-4">
                                            <label for="company">Esimate</label>
                                            <input type="text" class="form-control" name="estimate" value="<?php echo $row['estimate'] ?>">
                                        </div>
                                        <div class="form-group col-12 col-sm-12 col-md-8">
                                            <label>Status</label>
                                            <select class="form-control" name="status" value="<?php echo $row['status']?>" required>
                                                <?php
                                                $sqlStatus = "SELECT title FROM status";
                                                $result = mysqli_query($con,$sqlStatus);
                                                if(mysqli_num_rows($result)>0){
                                                    while ($row2 = mysqli_fetch_assoc($result)) {
                                                        ?>
                                                        <option value="<?php echo $row2['title']; ?>" <?php if ($row2['title']==$row['status']) echo "selected"; else echo ""; ?> ><?php echo $row2['title']; ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <input type="hidden" name="type" value="<?php echo $type; ?>">
                                    <input type="hidden" name="customerId" value="<?php echo $customerId; ?>">
                                    <button type="submit" class="btn btn-primary btn-block" name="submit" <?php if ($row['status']=="Rejected"||$row['status']=="Closed"){ echo "disabled";} ?>>Update</button>
                                </form>
                                <?php
                            }
                            else {
                                echo "No data found !";
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
    <?php include 'includes/footer.php'; ?>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
</body>
</html>
