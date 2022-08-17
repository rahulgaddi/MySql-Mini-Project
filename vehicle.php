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
     background-image: url("image4.jpg");
     background-size: cover;
     background-position: center;
     background-repeat: no-repeat ;
    }
</style>
    <header class="header">
    <?php
    include 'usernavbar.php';
    ?>
    <div>
        <div class="jumbotron">
            <div id="jum1">
                <h1 class="display-4">Add Your Vehicle Details</h1>
                <form action="vehicle.php" method="POST">
                    <div id="login"> <input id="login1" type="text" name="u_id" placeholder="User ID" required><br></div>
                    <div id="login"> <input id="login1" type="text" name="veh_no" placeholder="Vehicle no" required><br></div>
                    <!--<div id="login"> <input id="login1" type="text" name="veh_type" placeholder="Vehicle Type" required><br></div>
-->     <div id="login">             
<select id="login1" class="box" style="width:203.2px;" name=veh_type">
     <?php error_reporting($level = null);
    include('config.php');
    $sqll="select * from insurance";
    $res=$conn->query($sqll);
    $g=0; 
    while($row=$res->fetch_assoc()) 
    {
    $iname=$row['iname'];
    $amount=$row['amount'];
    $duration=$row['duration'];
    $a_id=$row['a_id'];
    $g=$row['ino'];
    echo "<option value='$iname'>$iname</option>";
    
    }
    ?>
    </select><br>
    </div>
<div id="login"> <input id="login1" type="text" name="veh_desc" placeholder="License no" required><br></div>
            </div> <button id="login2" name="action" value="submit" ><a href="ulog3.php">ADD</a></button>

            </form>
        </div>
    </div>
    </div>
</body>
<?php error_reporting($level = null);
define("UPLOAD_DIR", "insurance/");

if (!empty($_FILES["myFile"])) {
    $myFile = $_FILES["myFile"];

    if ($myFile["error"] !== UPLOAD_ERR_OK) {
        echo "<p>An error occurred.</p>";
        exit;
    }

    // ensure a safe filename
    $iname = preg_replace("/[^A-Z0-9._-]/i", "_", $myFile["iname"]);

    // don't overwrite an existing file
    $i = 0;
    $parts = pathinfo($iname);
    while (file_exists(UPLOAD_DIR . $iname)) {
        $i++;
        $iname = $parts["filename"] . "-" . $i . "." . $parts["extension"];
    }

    // preserve file from temporary directory
    $success = move_uploaded_file($myFile["tmp_name"],
        UPLOAD_DIR . $iname);
    if (!$success) { 
        echo "<p>Unable to save file.</p>";
        exit;
    }

    // set proper permissions on the new file
    chmod(UPLOAD_DIR . $iname, 0644);
}

?>
<?php error_reporting($level = null);
include('config.php');
$sqll="select * from vehicle";
$res=$conn->query($sqll);
$g=0; 
while($row=$res->fetch_assoc()) 
{
$g=$row['veh_id'];
if($g == null) 
{
$g=0;
break;	
}
}
$g=$g+1;
?>
<?php error_reporting($level = null);
if(isset($_POST['action'])) {
$u_id=$_POST['u_id'];
$veh_no=$_POST['veh_no'];
$veh_type=$_POST['veh_type'];
$veh_desc=$_POST['veh_desc'];
//$iname=str_replace(" ","_", $iname);
$aa=$_SESSION['new'];
$sql="insert into vehicle values($g,'$veh_no','$veh_type','$veh_desc','$u_id')";
$conn->query($sql);
header("location:ulog3.php");
echo "<script type='text/javascript'>
alert('Vehicle Details Added Successfully');
</script>";

} 
?>


</div> 
<h3 id="by1"></h3>