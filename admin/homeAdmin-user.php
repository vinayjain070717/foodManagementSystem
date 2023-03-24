<?php
include "..\db.php";
session_start();
if(!isset($_SESSION["login"]))
{
    $_SESSION["error"]="Sesssion Expired! Please Login again";
    header("Location: /foodManagementSystem/admin/loginAdmin.php");
    return;
}


$k="select * from regular_user";
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

    <title>Admin Home</title>

    <!-- Custom fonts for this template-->
    <link href="/foodManagementSystem/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/foodManagementSystem/css/sb-admin-2.min.css" rel="stylesheet">
    <script>
        function makeEligible(id)
        {
            $.ajax({
                type: "POST",
                url: "homeFunction-makeEligibleDB.php",
                data: { "id": id }
            }).done(function( msg ) {
                console.log( "Data Saved: " + msg );
            });
        }
        window.onload=function(){
            document.getElementById('tblDataTable').onclick = function(event){
                event = event || window.event; //for IE8 backward compatibility
                var target = event.target || event.srcElement; //for IE8 backward compatibility
                while (target && target.nodeName != 'TR') {
                    target = target.parentElement;
                }
                var cells = target.cells; //cells collection
                //var cells = target.getElementsByTagName('td'); //alternative
                if (!cells.length || target.parentNode.nodeName == 'THEAD') { // if clicked row is within thead
                    return;
                }
                console.log(cells[0].innerHTML)
                $("#txtId").val(cells[0].innerHTML);
                $("#txtFirstName").val(cells[1].innerHTML);
                $("#txtLastName").val(cells[2].innerHTML);
                $("#txtSocialInsuranceNumber").val(cells[3].innerHTML);
                $("#txtEmailId").val(cells[4].innerHTML);
                $("#txtMobileNumber").val(cells[5].innerHTML);
                $("#txtAddress").val(cells[6].innerHTML);
            }
        }
        function validate()
        {
            $("#lblError").text("");
            var id=$("#txtId").val();
            var firstName=$("#txtFirstName").val();
            var lastName=$("#txtLastName").val();
            var sNo=$("#txtSocialInsuranceNumber").val();
            var mNo=$("#txtMobileNumber").val();
            var email=$("#txtEmailId").val();
            var address=$("#txtAddress").val();
            if(firstName.length==0 || lastName.length==0 || sNo.length==0 || mNo.length==0 || email.length==0 || address.length==0)
            {
                $("#lblError").text("Pleae fill all text fields");
                return false;
            }
            return true;
        }
        function addUser()
        {
            if(!validate()) return;
            form=document.getElementById('myForm');
            form.action='/foodManagementSystem/user/registerUserDB.php';
            form.method='post';
            form.submit();
        }
        function updateUser()
        {
            if(!validate()) return;
            form=document.getElementById('myForm');
            form.action='/foodManagementSystem/user/updateUserDetailsDB.php';
            form.method='post';
            form.submit();
        }

        function deleteUser()
        {
            if(!validate()) return;
            form=document.getElementById('myForm');
            form.action='/foodManagementSystem/user/deleteUserDetailsDB.php';
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
                <div class="sidebar-brand-text mx-3">Admin </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="/foodManagementSystem/admin/homeAdmin-report.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Report</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/foodManagementSystem/admin/homeAdmin-user.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Manage User Account</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/foodManagementSystem/admin/homeAdmin-employee.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Create Employee Account</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/foodManagementSystem/admin/homeAdmin-donation.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Manage Donations</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/foodManagementSystem/admin/homeAdmin-modifyAdmin.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Modify Admin Details</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/foodManagementSystem/admin/homeAdmin-logout.php">
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                            </a>
                        </li>
                        
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1> Manage User Accounts </h1>
                    <h6> * If you add user, password will be set to "1234" by default</h6>
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-12 col-md-12 mb-12">
                        <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Table</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"></div><div class="row"><div class="col-sm-12">
                                    <table class="table table-bordered dataTable" id="tblDataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 64.6094px;">id</th>
                                        
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 90px;">First Name</th>
                                            
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column descending" aria-sort="ascending" style="width: 57.1094px;">Last Name</th>
                                            
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 29.8125px;">Social Insurance Number</th>
                                            
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" 
                                            rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 64.5px;">Email Id</th>

                                            <th class="sorting" tabindex="0" aria-controls="dataTable" 
                                            rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 64.5px;">Mobile No.</th>

                                            <th class="sorting" tabindex="0" aria-controls="dataTable" 
                                            rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 64.5px;">Address</th>
                                            
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 57.9688px;">Is Eligible</th></tr>
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
                                                <td><?php echo $row["first_name"] ?></td>
                                                <td><?php echo $row["last_name"] ?></td>
                                                <td><?php echo $row["social_insurance_number"] ?></td>
                                                <td><?php echo $row["email_id"] ?></td>
                                                <td><?php echo $row["mobile_number"] ?></td>
                                                <td><?php echo $row["address"] ?></td>
                                                <td>
                                                    <?php
                                                    if($row["is_eligible"]==1)
                                                    {
                                                    ?>
                                                    <label style="color:green"> Approved </label>
                                                    <?php
                                                    }
                                                    else 
                                                    {
                                                    ?>
                                                    <form action="homeFunction-makeEligibleDB.php" method="post">
                                                        <input name="id" id="id" value=<?php echo $row["id"]; ?> style="display:none"></input>
                                                        <button class="btn btn-primary" type="submit">Approve</button>
                                                    </form>
                                                    <?php } ?>
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
                <!-- /.container-fluid -->
                <form id="myForm">
                    <div class="form-group row">
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <input type="text" class="form-control form-control-user" id="txtId" name="txtId"
                                placeholder="Id" readonly="true">
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control form-control-user" id="txtFirstName" name="txtFirstName"
                                placeholder="First Name">
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control form-control-user" id="txtLastName" name="txtLastName"
                                placeholder="Last Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <input type="text" class="form-control form-control-user" id="txtSocialInsuranceNumber" name="txtSocialInsuranceNumber"
                                placeholder="Social Insurance Number">
                        </div>
                        <div class="col-sm-4">
                            <input type="email" class="form-control form-control-user" id="txtEmailId" name="txtEmailId"
                                placeholder="Email Id">
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control form-control-user" id="txtMobileNumber" name="txtMobileNumber"
                                placeholder="Mobile Number">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <input type="text" class="form-control form-control-user" id="txtAddress" name="txtAddress"
                                placeholder="Address">
                        </div>
                        <div class="col-sm-2">
                            <button type="button" class="btn btn-primary" onclick="addUser()"> Add </button>
                        </div>
                        <div class="col-sm-2">
                            <button type="button" class="btn btn-primary" onclick="updateUser()"> Update </button>
                        </div>
                        <div class="col-sm-2">
                        <button type="button" class="btn btn-primary" onclick="deleteUser()"> Delete </button>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div claass="col-sm-12">
                            <label style="color:red" id="lblError"></label>
                        </div>
                    </div>
                    
                </form

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