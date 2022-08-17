<?php error_reporting($level = null);
session_start();
if(!$_SESSION['new']) 
{
header('Location:home.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style3.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body> 
     <style>
    body
    {
     background-image: url("image5.jpg");
     background-size: cover;
     background-position: center;
     background-repeat: no-repeat ;
    }
</style>
<body>
    <header class="header">
        <?php
        include 'usernavbar.php';
        ?>
    <div class="container">
    <form method="POST" action="accept.php" style="width:25%;position:relative;left:35%" enctype="multipart/form-data">
<br><br><br><br>
<h3 >Pay Insurance</h3>
<hr>

 <?php error_reporting($level = null);
include('config.php');
$fp=file_get_contents("tan.txt");
$sqll="select * from insurance where iname='$fp'";
$res=$conn->query($sqll);
$g=0; 
while($row=$res->fetch_assoc()) 
{
$iname=$row['iname'];
$amount=$row['amount'];
$a_id=$row['a_id'];
$g=$row['ino'];
echo '<input type="text" name="a_id" class="form-control"placeholder="Agency ID"value=""><br>';
echo '<input type="text" name="iname" class="form-control" placeholder="insurance name" value=""><br>';
echo '<input type="text" name="amount" class="form-control"placeholder="insurance amount"value=""><br>';
echo '<button class="btn btn-success" name="san"  value="'.$g.'">pay insurance</button>';
}
header("location vehicle.php");
?>


</form>
</div> 


 