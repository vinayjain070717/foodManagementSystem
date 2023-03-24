<?php
include "..\db.php";

session_start();
if(!isset($_SESSION["eLogin"]))
{
    $_SESSION["errorEmployee"]="Sesssion Expired! Please Login again";
    header("Location: /foodManagementSystem/employee/loginEmployee.php");
    return;
}


$k="select * from employee where email_id='".$_SESSION["eLogin"]."'";
$res=mysqli_query($mysqli,$k);
$row=mysqli_fetch_assoc($res);

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>employee Home</title>

    <!-- Custom fonts for this template-->
    <link href="/foodManagementSystem/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/foodManagementSystem/css/sb-admin-2.min.css" rel="stylesheet">
    <script>
        function validate2()
        {
            $("#lblError").text("");
            var id=$("#txtId").val();
            var name=$("#txtFirstName").val();
            var lastName=$("#txtLastName").val();
            var email=$("#txtEmail").val();
            var mNo=$("#txtMobileNumber").val();
            var password=$("#txtPassword").val();
            if(id.length==0 || name.length==0 || lastName.length==0 || email.length==0 || mNo.length==0 || password.length==0)
            {
                $("#lblError").text("Pleae fill all text fields");
                return false;
            }
            return true;
        }

        function updateEmployee()
        {
            if(!validate2()) return;
            form=document.getElementById('myForm');
            form.action='/foodManagementSystem/employee/updateEmployeeDB.php';
            form.method='post';
            form.submit();
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
                    <h1> Manage Account </h1>
                    <br>
                <form id="myForm">
                    <div class="form-group row">
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <input type="text" class="form-control form-control-user" id="txtId" name="txtId"
                                placeholder="Id" readonly="true" value="<?php echo $row["id"] ?>">
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control form-control-user" id="txtFirstName" name="txtFirstName" placeholder="First Name" value="<?php echo $row["first_name"] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <input type="text" class="form-control form-control-user" id="txtLastName" name="txtLastName" placeholder="Last Name"  value="<?php echo $row["last_name"] ?>">
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control form-control-user" id="txtMobileNumber" name="txtMobileNumber" placeholder="Mobile Number" value="<?php echo $row["mobile_number"] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <input type="email" class="form-control form-control-user" id="txtEmail" name="txtEmailId" placeholder="Email Id"  value="<?php echo $row["email_id"] ?>">
                        </div>
                        <div class="col-sm-4">
                            <input type="password" class="form-control form-control-user" id="txtPassword" name="txtPassword" placeholder="Password"  value="<?php echo $row["password"] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-primary" onclick="updateEmployee()">Update</button>
                        </div>
 
                    </div>
                    <div class="form-group row">
                        <div claass="col-sm-12">
                            <label style="color:red" id="lblError"></label>
                        </div>
                    </div>                    
                    </form>

                
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
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

</body>

</html>