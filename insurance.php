
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
    <style>
    body
    {
     background-image: url("image4.jpg");
     background-size: cover;
     background-position: center;
     background-repeat: no-repeat ;
    }
    
        table, tr, td{
            border: 1px solid black;
            width: 600px;
        }
        tr, td{
            padding: 10px;
        }
    </style>
</head>
<body> 
    

    <header class="header">
       <?php
       include 'navbar1.php';
       ?>
   
       
       <div class="container">
        <br><br><br><br>
        <table class="center" border="2" style="border-color:black;width:40%;">
        <tr>
        <th>S.no</th>
        <th>Insurance Name</th>
        <th>Amount</th>
        <th>No Of Years</th>
        <th>Agency id</th>
        </tr>
    </div>
    </style>
    </body>        
    <?php error_reporting($level = null);
    include('config.php');
    $file=file_get_contents("san.txt");
    $sqll="select * from insurance";
    $res=$conn->query($sqll);
    
    while($row=$res->fetch_assoc()) 
    {
    $ino=$row['ino'];    
    $iname=$row['iname'];
    $amount=$row['amount'];
    $duration=$row['duration'];
    $a_id=$row['a_id'];
    echo '<tr>
    <td>'.$ino.'</td>
    <td>'.$iname.'</td>
    <td>'.$amount.'</td>
    <td>'.$duration.'</td>
    <td>'.$a_id.'</td>
    </tr>';
        }
    ?> 
    
    </table>
    </div>
    <h3 id="by1"></h3>    
          