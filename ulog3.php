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
    <header class="header">
        <?php
        include 'usernavbar.php';
        ?>
    <div>
        <div class="jumbotron">
            <div id="jum1">
                <h1 class="display-4">Apply Insurance</h1>
                <form action="ulog3.php" method="POST">
                <div id="login"> <input id="login1" type="text" name="u_id" placeholder="User id" required><br></div>
                    <div id="login"> <input id="login1" type="text" name="ino" placeholder="Insurance no" required><br></div>
                    <div id="login"> <input id="login1" type="text" name="reg_date" placeholder="Date" required><br></div>
            </div> <button id="login2" name="action" value="submit">APPLY</button>


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
$sqll="select * from registration";
$res=$conn->query($sqll);
$g=0; 
/*while($row=$res->fetch_assoc()) 
{
$g=$row['reg_no'];
if($g == null) 
{
$g=0;
break;	
}
}*/
$g=$g+1;
?>
<?php error_reporting($level = null);
if(isset($_POST['action'])) 
{
$u_id=$_POST['u_id'];
$ino=$_POST['ino'];
$reg_date= date('jS  F - Y ');
$fp=file_get_contents("san.txt");
$fps=file_get_contents("sans.txt");

//$iname=str_replace(" ","_", $iname);
$aa=$_SESSION['new'];
$sql="INSERT INTO `registration` (`reg_date`, `reg_status`, `ino`, `u_id`) VALUES ('$reg_date', 'noaction', '$ino', '$u_id')";
$conn->query($sql);
header("location:ulog6.php");
echo "<script type='text/javascript'>
alert('insurance applied Successfully');
</script>";
} 
?>


</div> 
<h3 id="by1"></h3>