<?php
include "..\db.php";

session_start();
if(!isset($_SESSION["eLogin"]))
{
    $_SESSION["errorEmployee"]="Sesssion Expired! Please Login again";
    header("Location: /foodManagementSystem/employee/loginEmployee.php");
    return;
}


$k="select u.*,f.name, f.category from foods f inner join user_request u where f.id=u.food_id;";
$res=mysqli_query($mysqli,$k);





?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Employee Home</title>

    <!-- Custom fonts for this template-->
    <link href="/foodManagementSystem/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/foodManagementSystem/css/sb-admin-2.min.css" rel="stylesheet">
    <script>

        function approveRequest(request_id,quantity,food_id,food_name, email_id)
        {
            $("#btnApprove").attr("disabled", true);
            $("#btnDecline").attr("disabled", true);

            $.ajax({
                type: "POST",
                url: "/foodManagementSystem/employee/userRequestDB.php",
                data: { "id": request_id, "action":1,"quantity": quantity,"food_id":food_id }
            }).done(function( msg ) {
                console.log( "Data Saved: " + msg );
                // window.location.href="/foodManagementSystem/phpMailer/sendEmail-quantity.php";
            });
            // console.log(quantity);
            $.ajax({
                type: "POST",
                url: "/foodManagementSystem/phpMailer/sendEmail-package.php",
                data: { "food_name":food_name, "quantity":quantity,"email_id":email_id }
            }).done(function( msg ) {
                console.log( "Data Saved: " + msg );
                location.reload();
            });


        }
        function declineRequest(request_id,quantity)
        {

            $.ajax({
                type: "POST",
                url: "/foodManagementSystem/employee/userRequestDB.php",
                data: { "id": request_id, "action":-1, "quantity":quantity }
            }).done(function( msg ) {
                console.log( "Data Saved: " + msg );
                location.reload();
            });
        }

    </script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Employee</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="/foodManagementSystem/employee/homeEmployee.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Manage Donations</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/foodManagementSystem/employee/homeEmployee-account.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Manage Account</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/foodManagementSystem/employee/homeEmployee-userRequest.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>User Request</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/foodManagementSystem/employee/homeEmployee-logout.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" id="userDropdown" >
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION["eLogin"]; ?></span>
                            </a>
                        </li>
                        
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1> User Requests </h1>
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-12 col-md-12 mb-12">
                        <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Request Table</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"></div><div class="row"><div class="col-sm-12">
                                    <table class="table table-bordered dataTable" id="tblDataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 64.6094px;">id</th>
                                        
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 90px;">User Email</th>
                                            
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column descending" aria-sort="ascending" style="width: 57.1094px;">Food Name</th>
                                                                                        
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" 
                                            rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 64.5px;">Food Category</th>

                                            <th class="sorting" tabindex="0" aria-controls="dataTable" 
                                            rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 64.5px;">Quantity</th>

                                            <th class="sorting" tabindex="0" aria-controls="dataTable" 
                                            rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 64.5px;">Action</th>

                                    </thead>
                                    <tbody>
                                        <?php
                                        if(mysqli_num_rows($res)>0)
                                        {
                                            while($row=mysqli_fetch_assoc($res))
                                            {
                                                ?>
                                               <tr>
                                                    <td><?php echo $row["id"] ?></td>
                                                    <td><?php echo $row["user_email"] ?></td>
                                                    <td><?php echo $row["name"] ?></td>
                                                    <td><?php echo $row["category"] ?></td>
                                                    <td><?php echo $row["quantity"] ?></td>
                                                    <td>
                                                    <?php
                                                    if($row["is_fulfilled"]==0)
                                                    {
                                                    ?>                                                       <div class="form-group row">
                                                        <div class="col-sm-6">
                                                            <button id="btnAppprove" type="button" class="btn btn-success" onclick="approveRequest(<?php echo $row['id']; ?>,<?php echo $row['quantity']; ?>, <?php echo $row['food_id']; ?>,'<?php echo $row['name']; ?>','<?php echo $row['user_email']; ?>')"> Approve </button>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <button id="btnDecline" type="button" class="btn btn-danger" onclick="declineRequest(<?php echo $row['id']; ?>,<?php echo $row['quantity']; ?>)"> Decline </button>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    }
                                                    else if($row["is_fulfilled"]==-1) echo "Declined";
                                                    else echo "Approved";
                                                    ?>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                        </div>
                                    </div>
                </div>

                <div class="form-group row">
                        <div claass="col-sm-12">
                            <label style="color:red" id="lblError2"><?php if(isset($_SESSION["errRequest"])) echo $_SESSION["errRequest"]; ?></label>
                        </div>
                    </div>                


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    
    <!-- Bootstrap core JavaScript-->
    <script src="/foodManagementSystem/vendor/jquery/jquery.min.js"></script>
    <script src="/foodManagementSystem/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/foodManagementSystem/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/foodManagementSystem/js/sb-admin-2.min.js"></script>
<?php

?>
</body>

</html>