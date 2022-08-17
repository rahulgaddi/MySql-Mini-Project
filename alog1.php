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
     background-image: url("image7.jpg");
     background-size: cover;
     background-position: center;
     background-repeat: no-repeat ;
    }
</style>

    <header class="header">
        <?php
        include 'agencynavbar.php';
        ?>
    <style>
        table, tr, td{
            border: 1px solid black;
            width: 600px;
        }
        tr, td{
            padding: 10px;
        }
    </style>
       
       <div class="container">
<br><br><br><br><br>
<table class="center" border="2" style="border-color:black;width:70%;">
<tr>
<th>Date of applied</th>
<th>UserID</th>
<th>Insurance number</th>
<th>Registration number</th>
<th>Accept</th>
<th>Delete</th>
</tr>
 <?php error_reporting($level = null);
include('config.php');
$file=file_get_contents("san.txt");
$sqll="select * from registration where reg_status='noaction'";
$res=$conn->query($sqll);
$i=1;

while($row=$res->fetch_assoc()) 
{
$reg_date=$row['reg_date'];
$u_id=$row['u_id'];
$ino=$row['ino'];
$reg_no=$row['reg_no'];
$reg_id=$row['reg_id'];
echo '<tr>
<td>'.$reg_date.'</td>
<td>'.$u_id.'</td>
<td>'.$ino.'</td>
<td>'.$reg_no.'</td>
<td><form method="get" action="accept1.php"><button class="btn btn-success btn-xs" name="san" value="'.$reg_id.'">accept</button></form></td>
<td><form method="get" action="reject.php"><button class="btn btn-danger btn-xs" name="san" value="'.$reg_id.'">x</button></form></td>
</tr>';$i++;
    }
?>

</table>
</div> 
<h3 id="by1"></h3> 