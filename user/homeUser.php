<?php
include "..\db.php";

session_start();
if(!isset($_SESSION["uLogin"]))
{
    $_SESSION["errorUser"]="Sesssion Expired! Please Login again";
    header("Location: /foodManagementSystem/User/loginUser.php");
    return;
}

if(isset($_GET["txtFoodName"]))
{
    $k="select * from foods where quantity>0 and expiry_date>NOW() and name like '".$_GET["txtFoodName"]."%'";
}
else $k="select * from foods where quantity>0 and expiry_date>NOW()";
$res=mysqli_query($mysqli,$k);

$user_id=$_SESSION["uId"];
$p="select u.*, f.name, f.category from foods f inner join user_request u where f.id=u.food_id and u.user_id='".$user_id."'";
$res2=mysqli_query($mysqli,$p);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User Home</title>

    <!-- Custom fonts for this template-->
    <link href="/foodManagementSystem/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/foodManagementSystem/css/sb-admin-2.min.css" rel="stylesheet">
    <script>
        var availableQuantity=0;
        window.onload=function()
        {
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
                $("#txtId").val(cells[0].innerHTML);
                $("#txtName").val(cells[1].innerHTML);
                $("#txtRequiredQuantity").val("");
                availableQuantity=parseInt(cells[3].innerHTML);
                console.log(availableQuantity);
            }
        }
        function validate2()
        {
            $("#lblError").text("");
            var id=$("#txtId").val();
            var name=$("#txtName").val();
            var quantity=$("#txtRequiredQuantity").val();
            if(id.length==0 || name.length==0 || quantity.length==0)
            {
                $("#lblError").text("Pleae fill all text fields");
                return false;
            }
            console.log(this.availableQuantity);
            if(quantity>this.availableQuantity)
            {
                $("#lblError").text("Quantity asked is greater than avaiable quantity");
                return false;
            }
            return true;
        }

        function sendRequest()
        {
            if(!validate2()) return;
            form=document.getElementById('myForm');
            form.action='/foodManagementSystem/user/sendRequestUserDB.php';
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
                <div class="sidebar-brand-text mx-3">User</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="/foodManagementSystem/user/homeUser.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Request Food</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/foodManagementSystem/user/homeUser-account.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Manage Account</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/foodManagementSystem/user/homeUser-logout.php">
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION["uLogin"]; ?></span>
                            </a>
                        </li>
                        
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1> Request Foods </h1>
                    <br>
                    <form id="searchForm" href="/FoodManagementSystem/user/homeUser.php">
                    <div class="form-group row">
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <input type="text" class="form-control form-control-user" id="txtFoodName" name="txtFoodName"
                                placeholder="Food Name to Search" value="<?php if(isset($_GET["txtFoodName"])) echo $_GET["txtFoodName"];  ?>">
                        </div>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-primary"> Search </button>
                            <!-- <button type="button" class="btn btn-primary" onclick="sendRequest()"> Send Request</button> -->
                            <a href="/foodManagementSystem/user/homeUser.php" class="btn btn-primary"> Show all Foods </a>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div claass="col-sm-12">
                            <label style="color:red" id="lblError"></label>
                        </div>
                    </div>                    
                </form>
                
                    <div class="col-xl-12 col-md-12 mb-12">
                    <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Foods Table</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row"></div>
                                <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered dataTable" id="tblDataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                        <thead>
                                            <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 64.6094px;">id</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 90px;">Food Name</th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column descending" aria-sort="ascending" style="width: 57.1094px;">Food Category</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" 
                                                rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 64.5px;">Available Quantity</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" 
                                                rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 64.5px;">Expiry Date</th>
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
                                            <td><?php echo $row["name"] ?></td>
                                            <td><?php echo $row["category"] ?></td>
                                            <td><?php echo $row["quantity"] ?></td>
                                            <td><?php echo $row["expiry_date"] ?></td>
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
                </div>
                <!-- /.container-fluid -->
                <form id="myForm">
                    <div class="form-group row">
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <input type="text" class="form-control form-control-user" id="txtId" name="txtId"
                                placeholder="Id" readonly="true">
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control form-control-user" id="txtName" name="txtName" placeholder="Name">
                        </div>
                        <div class="col-sm-4">
                            <input type="number" class="form-control form-control-user" id="txtRequiredQuantity" name="txtRequiredQuantity" placeholder="Required Quantity">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-primary" onclick="sendRequest()"> Send Request</button>
                        </div>
 
                    </div>
                    <div class="form-group row">
                        <div claass="col-sm-12">
                            <label style="color:red" id="lblError"></label>
                        </div>
                    </div>                    
                </form>


                <div class="col-xl-12 col-md-12 mb-12">
                    <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">User Requests</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row"></div>
                                <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered dataTable" id="tblDataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                        <thead>
                                            <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="requestTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 64.6094px;">Request Id</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 90px;">Food Name</th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column descending" aria-sort="ascending" style="width: 57.1094px;">Food Category</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" 
                                                rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 64.5px;">Request Quantity</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" 
                                                rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 64.5px;">Request Status</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if(mysqli_num_rows($res2)>0)
                                            {
                                                while($row2=mysqli_fetch_assoc($res2))
                                                {
                                                    ?>
                                            <tr>
                                            <td><?php echo $row2["id"] ?></td>
                                            <td><?php echo $row2["name"] ?></td>
                                            <td><?php echo $row2["category"] ?></td>
                                            <td><?php echo $row2["quantity"] ?></td>
                                            <td><?php 
                                            if($row2["is_fulfilled"]==0) echo "Pending";
                                            else if($row2["is_fulfilled"]==-1) echo "Rejected";
                                            else echo "Fulfilled";
                                            ?></td>
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
                </div>

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