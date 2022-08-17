<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
    <header class="header">
        <?php
        include 'navbar1.php';
        ?>
    <div>
        <div class="jumbotron">
            <div id="jum1">
                <h1 class="display-4">User Signup!</h1>
                <form action="usign.php" method="POST">
                    <div id="login"> <input id="login1" type="text" name="username"  placeholder="Name" required><br></div>
                    <div id="login"> <input id="login1" type="password" name="password"  placeholder="Password" required><br></div>
                    <div id="login"> <input id="login1" type="text" name="aadhar"  placeholder="Aadhar number" required><br></div>
                    <div id="login"> <input id="login1" type="text" name="email"  placeholder="Email" required><br></div>
                    <div id="login"><input id="login1" textarea required="required" placeholder="Address" name="address"></textarea><br></div>
                    <div id="login"> <input id="login1" type="phone" name="phno" placeholder="Phone number" required><br></div>
                    <p style="color: black;"><span><input type="checkbox"></span> I agree to the terms & conditions</p>
            </div> <button id="login2" name="action" value="submit">Signup</button>


            </form>
        </div>
    </div>
</body>
<?php error_reporting($level = null);
define("UPLOAD_DIR", "sign/");

if (!empty($_FILES["myFile"])) {
    $myFile = $_FILES["myFile"];

    if ($myFile["error"] !== UPLOAD_ERR_OK) {
        echo "<p>An error occurred.</p>";
        exit;
    }

    // ensure a safe filename
    $name = preg_replace("/[^A-Z0-9._-]/i", "_", $myFile["name"]);

    // don't overwrite an existing file
    $i = 0;
    $parts = pathinfo($name);
    while (file_exists(UPLOAD_DIR . $name)) {
        $i++;
        $name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
    }

    // preserve file from temporary directory
    $success = move_uploaded_file($myFile["tmp_name"],
        UPLOAD_DIR . $name);
    if (!$success) { 
        echo "<p>Unable to save file.</p>";
        exit;
    }

    // set proper permissions on the new file
    chmod(UPLOAD_DIR . $name, 0644);
}

?>
 <?php error_reporting($level = null);
include('config.php');
$sqll="select * from user";
$res=$conn->query($sqll);
$g=0; 
while($row=$res->fetch_assoc()) 
{
$g=$row['u_id'];
if($g == null) 
{
$g=0;
break;	
}
}
$g=$g+1;
?>
<?php error_reporting($level = null);
$username=$_POST['username'];
$password=$_POST['password'];
$aadhar=$_POST['aadhar'];
$email=$_POST['email'];
$address=$_POST['address'];
$phno=$_POST['phno'];
if($_POST['action']=='submit') 
{
	
$username=str_replace(" ","_", $username);
$int = intval(preg_replace('/[^0-9]+/', '', $username), 10);
if($int==0) 
{
	
	if (is_numeric($phno) && strlen($phno)==10) 
{
	
	if (is_numeric($aadhar) && strlen($aadhar)==12) 
{
$sql="insert into user values('$g','$username','$password','$aadhar','$address','$email','$phno')";
$conn->query($sql);
echo "<script type='text/javascript'>
alert('user Signup Successfully');
</script>";
}
else 
{
echo "<script type='text/javascript'>
alert('please enter 12 digit aadhar number');
</script>";
}
}
else 
{
echo "<script type='text/javascript'>
alert('invalid phno');
</script>
";	
}
}
else 
{
echo "<script type='text/javascript'>
alert('invalid name');
</script>";
}
} 
?>


</div> 
<h3 id="by2"></h3