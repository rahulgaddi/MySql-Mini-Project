 
<?php error_reporting($level = null);
include('config.php');
$sqll="select * from payment";
$res=$conn->query($sqll);
$g=0; 
while($row=$res->fetch_assoc()) 
{
$g=$row['p_no'];
if($g == null) 
{
$g=0;
break;	
}
}
$g=$g+1;
?> 
 <?php error_reporting($level = null);
include('config.php');
//echo var_dump($_POST);
session_start();
$username=$_SESSION["new"];
$sqlu="SELECT * FROM `user` WHERE `username`='$username'";
$res=$conn->query($sqlu);
$usr=$res->fetch_assoc();
$u_id=$usr["u_id"];
//$u_id=$_POST['u_id'];
$amount=$_POST['amount'];
$p_date= date('jS  F - Y ');
$a_id=$_POST['a_id'];
$sqll="insert into payment values ('$u_id','$g','$amount','$p_date','$a_id')";
$conn->query($sqll);
echo '<script type="text/javascript">
alert("Insurance paid successfully");
</script>';
echo '<meta http-equiv="refresh" content="0.1; URL=vehicle.php">';
?>

