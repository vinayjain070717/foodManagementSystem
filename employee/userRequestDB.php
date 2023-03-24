<?php
include '../db.php';
session_start();

$id=$_POST["id"];
$action=$_POST["action"];
$quantity=$_POST["quantity"];
echo $id;
$k="update user_request set is_fulfilled='".$action."' where id='".$id."'";
if(mysqli_query($mysqli,$k))
{
    echo "Updated";
}
else echo "not updated";
if($action==1)
{
    if(isset($_POST["food_id"])) $food_id=$_POST["food_id"];
    $k="update foods set quantity=quantity-'".$quantity."' where id='".$food_id."'";
    if(mysqli_query($mysqli,$k))
    {
        echo "Updated";
    }
    else echo "not updated";
}

$s="select name from foods where quantity<3";
$res=mysqli_query($mysqli,$s);
if(mysqli_num_rows($res)>0)
{
    $foodName='';
    while($row=mysqli_fetch_assoc($res))
    {
        $foodName.=$row["name"].",";
    }
    // echo "hello ".mysqli_num_rows($res)." hi ".$foodName;
    $_SESSION["food_name"]=$foodName;
    header("Location: /foodManagementSystem/phpMailer/sendEmail-quantity.php");
    // echo '<script type="text/javascript">',
    // '$.ajax({
    //     type: "POST",
    //     url: "/foodManagementSystem/phpMailer/sendEmail-quantity.php",
    //     data: { "food_name":"'.$foodName.'" }
    // }).done(function( msg ) {
    //     console.log( "Data Saved: " + msg );
    //     location.reload();
    // });',
    // '</script>;';

}


?>