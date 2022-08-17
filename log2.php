<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>  <style>
    body
    {
     background-image: url("image4.jpg");
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
    <table class="center" border="1" style="border-color:black;width:50%;">
    <tr>
    <th>S.no</th>
    <th>Insurance Name</th>
    <th>Amount</th>
    <th>No Of Years</th>
    <th>Agency ID</th>
    <th>Delete</th>
    
    </tr>
</body>
<?php error_reporting($level = null);
include('config.php');
session_start();
$id=$_SESSION['id'];
//echo var_dump($_SESSION);
$file=file_get_contents("san.txt");
$sqll="select * from insurance where a_id=$id";
$res=$conn->query($sqll);
$i=1;

while($row=$res->fetch_assoc()) 
{
$ino=$row['ino'];
$iname=$row['iname'];
$amount=$row['amount'];
$duration=$row['duration'];
$a_id=$row['a_id'];
echo '<tr>
<td>'.$i.'</td>
<td>'.$iname.'</td>
<td>'.$amount.'</td>
<td>'.$duration.'</td>
<td>'.$a_id.'</td>
<td><form method="get" action="delete.php"><button class="btn btn-danger btn-xs" name="san" value="'.$ino.'">x</button></form></td>
</tr>';$i++;
    }
?> 

</table>
</div>
<h3 id="by1"></h3>    
   