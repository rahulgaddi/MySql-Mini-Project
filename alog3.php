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
    <style>
        body
        {
         background-image: url("image7.jpg");
         background-size: cover;
         background-position: center;
         background-repeat: no-repeat ;
        }
    </style>
</head>
<body>
    
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
<th>Agency ID</th>
<th>Amount</th>
<th>Payment no</th>
</tr>
 <?php error_reporting($level = null);
include('config.php');
$file=file_get_contents("san.txt");
$file=file_get_contents("sans.txt");
$file=file_get_contents("tan.txt");
$id=$_SESSION['id'];
$sqll="select * from payment where a_id=$id";
$res=$conn->query($sqll);
$i=1;

while($row=$res->fetch_assoc()) 
{	
$a_id=$row['a_id'];
$amount=$row['amount'];
$p_no=$row['p_no'];
echo '<tr>
<td>'.$a_id.'</td>
<td>'.$amount.'</td>
<td>'.$p_no.'</td>

</tr>';$i++;
    }
?>

</table>
</div> 
<h3 id="by1"></h3> 