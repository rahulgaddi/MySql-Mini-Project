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
    <style>
    body
    {
     background-image: url("image4.jpg");
     background-size: cover;
     background-position: center;
     background-repeat: no-repeat ;
    }
    #vehicle22
    {
        padding-left: 30px;
        margin-left: 0px;
    }
</style>
</head>
<body>


    <header class="header">
    <?php
    include 'agencynavbar.php'
    ?>
    <div>
        <div class="jumbotron">
            <div id="jum1">
                <h1 class="display-4">Add Insurance</h1>
                <form action="log1.php" method="POST">
                    <div id="login"> <input id="login1" type="text" name="iname" placeholder="Insurance Name" required><br></div>
                    <div id="login"> <input id="login1" type="text" name="amount" placeholder="Amount" required><br></div>
                    <div id="login"> <input id="login1" type="number" name="duration" placeholder="No of years" required><br></div>
                    <div id="login"> <input id="login1" type="number" name="a_id" placeholder="Agency id" required><br></div>
                
            </div> <button id="login2" type="submit" name="action" value="submit">ADD</button>


            </form>
        </div>
    </div>
    </div>
</body>

<?php error_reporting($level = null);
include('config.php');
$sqll="select * from insurance";
$res=$conn->query($sqll);
$g=0; 
while($row=$res->fetch_assoc()) 
{
$g=$row['ino'];
if($g == null) 
{
$g=0;
break;	
}
}
$g=$g+1;
?>
<?php error_reporting($level = null);
if(isset($_POST['action'])) 
{
$iname=$_POST['iname'];
$duration=$_POST['duration'];
$amount=$_POST['amount'];
$a_id=$_POST['a_id'];

//$iname=str_replace(" ","_", $iname);
$sql="insert into insurance values($g,'$iname','$amount','$duration','$a_id')";
$conn->query($sql);
echo "<script type='text/javascript'>
alert('Insurace added Successfully');
</script>";
} 
?>

</div> 
