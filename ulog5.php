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
 
    <form method="post" style="width:25%;position:relative;left:26%" enctype="multipart/form-data">
    <br><br><br><br>
    <h3 >Select insurance</h3>
 <hr>
 <select class="form-control" name="inname">
  <?php error_reporting($level = null);
  header("location:ulog6.php");
 include('config.php');
 $a=$_SESSION['new'];
 $sqll="select * from insurance";
 $res=$conn->query($sqll);
 $g=0; 
 while($row=$res->fetch_assoc()) 
 {
 $iname=$row['iname'];
 $amount=$row['amount'];
 $g=$row['ino'];
 echo "<option value='$iname'>$iname</option>";
 }
 ?>
 </select><br>
 <button class="btn btn-success" name="action" value="submit">Pay insurance</button>
 </form>
 
 <?php error_reporting($level = null);
 if(isset($_POST['action'])) 
 {
 $inname=$_POST['inname'];
 
 $sqll="select * insurance where iname='$inname'";
 while($row=$res->fetch_assoc()) 
 {
 $iname=$row['iname'];
 $amount=$row['amount'];
 }
 file_put_contents('tan.txt',$iname);
 echo '<meta http-equiv="refresh" content="0.1; URL=ulog6.php">';
 }
 ?>
 </div>  
 <h3 id="by1"></h3>