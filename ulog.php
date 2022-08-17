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
                <h1 class="display-4">User Login!</h1>
                <form action="ulog.php" method="POST">
                    <div id="login"> <input id="login1" type="text" name="username" placeholder="Username" required><br></div>
                    <div id="login"> <input id="login1" type="password" name="password" placeholder="Password" required><br></div>
            </div id="login"> <input type="submit" type="button" id="login2" name="action" value="Log in" />
            <a id="login3" href="usign.php">Don't have a account?</a>
                </form>
        </div>
    </div> 
</body>
<?php error_reporting($level = null);
//echo var_dump($_POST);
if(isset($_POST["action"])) 
{
$a=$_POST['username'];
$b=$_POST['password'];
include('config.php');


$sqll="select * from user where username='$a'";
$res=$conn->query($sqll);

while($row=$res->fetch_assoc()) 
{
$username=$row['username'];
$password=$row['password'];


if($username==$a && $password == $b) 
{
session_start();
$_SESSION['new']=$username;
if($_SESSION['new']==$username) 
{
header('Location:vehicle.php');
}

}

}
 
{
echo '<script type="text/javascript">
alert("Name or password you entered is wrong");</script>';
}
}
?>
</div>  
<h3 id="by1"></h3>   