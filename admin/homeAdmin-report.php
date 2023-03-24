<?php
include "..\db.php";
session_start();
if(!isset($_SESSION["login"]))
{
    $_SESSION["error"]="Sesssion Expired! Please Login again";
    header("Location: /foodManagementSystem/admin/loginAdmin.php");
    return;
}

$k="select count(*) as count from donation";
$res=mysqli_query($mysqli,$k);
$row=mysqli_fetch_assoc($res);


$p="select count(*) as count from user_request where is_fulfilled=1";
$res2=mysqli_query($mysqli,$p);
$row2=mysqli_fetch_assoc($res2);

$r="select * from foods order by quantity desc";
$res3=mysqli_query($mysqli,$r);

$s=" select f.name from user_request u inner join foods f where u.food_id=f.id order by u.quantity;";
$res4=mysqli_query($mysqli,$s);

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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                            </a>
                        </li>
                        
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1> Report</h1>

                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-6 col-md-6 mb-6">
                            <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Number Of Donation Recieved</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row["count"] ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>  

                        </div>

                        <div class="col-xl-6 col-md-6 mb-6">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Number Of People Helped</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row2["count"] ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>

                </div>
                <br>
                <div class="row">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-6 col-md-6 mb-6">
                        <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Top 5 recieved foods</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                                            $i=0;
                                            while($row3=mysqli_fetch_assoc($res3))
                                            {
                                             echo $row3["name"].",";
                                             $i+=1;
                                             if($i>=4) break;
                                            }

                                             ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>  

                    </div>

                    <div class="col-xl-6 col-md-6 mb-6">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Top 5 desired foods</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                                            $i=0;
                                            while($row4=mysqli_fetch_assoc($res4))
                                            {
                                             echo $row4["name"].",";
                                             $i+=1;
                                             if($i>=4) break;
                                            }

                                             ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
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
$s="select name from foods where expiry_date<DATE_ADD(CURRENT_DATE, INTERVAL +10 DAY);";
$res=mysqli_query($mysqli,$s);
if(mysqli_num_rows($res)>0)
{
    $foodName='';
    while($row=mysqli_fetch_assoc($res))
    {
        $foodName.=$row["name"].",";
    }
    $_SESSION["food_name"]=$foodName;
    echo '<script type="text/javascript">',
    '$.ajax({
        type: "POST",
        url: "/foodManagementSystem/phpMailer/sendEmail-expiry.php",
        data: { "food_name":"'.$foodName.'" }
    }).done(function( msg ) {
        console.log( "Data Saved: " + msg );
        location.reload();
    });',
    '</script>;';
}

?>
</body>

</html>