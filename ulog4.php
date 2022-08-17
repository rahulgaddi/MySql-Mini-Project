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
    <link rel="stylesheet" type="text/css" href="style2.css">
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

    <header class="header">
        <?php
        include 'usernavbar.php';
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
        <table class="center" border="2" style="border-color:black;width:50%;">
        <tr>
        <th>User ID</th>
        <th>Insurance no</th>
        <th>Registration no</th>
        <th>Regisration Date</th>
        <th>Status</th>
        </tr>
        
<?php error_reporting($level = null);
include('config.php');
$file=file_get_contents("san.txt");
$a=$_SESSION['new'];
$sqll="select * from registration";
$res=$conn->query($sqll);
$i=1;

while($row=$res->fetch_assoc()) 
{ 
$reg_id=$row['reg_id'];  
$reg_no=$row['reg_no'];
$reg_date=$row['reg_date'];
$reg_status=$row['reg_status'];
$ino=$row['ino'];
$u_id=$row['u_id'];
echo '<tr>
<td>'.$u_id.'</td>
<td>'.$ino.'</td>
<td>'.$reg_no.'</td>
<td>'.$reg_date.'</td>
<td>'.$reg_status.'</td>
</tr>';$i++;
    }
?>

</table>
</div> 
</body>
<h3 id="by1"></h3>