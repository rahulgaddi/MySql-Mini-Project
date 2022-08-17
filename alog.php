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
                <h1 class="display-4">Agency Login!</h1>
                <form action="alog.php" method="POST">
                    <div id="login"> <input id="login1" type="text" name="aname" placeholder="Name" required><br></div>
                    <div id="login"> <input id="login1" type="password" name="password" placeholder="Password" required><br></div>
            </div> <button id="login2" type="submit" name="action" value="submit">Login</button>


            </form>
        </div>
    </div>
    </div>
</body> 

<?php error_reporting($level = null);
//echo var_dump($_POST);
if(isset($_POST['action'])) 
{
$a=$_POST['aname'];
$b=$_POST['password'];
include('config.php');


$sqll="select * from agency where aname='$a'";
$res=$conn->query($sqll);

while($row=$res->fetch_assoc()) 
{
$aname=$row['aname'];
$password=$row['password'];


if($aname==$a && $password == $b) 
{
session_start();
$_SESSION['new']=$aname;
$_SESSION['id']=$row['a_id'];
if($_SESSION['new']==$aname) 
{
header('Location:log1.php');
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
</div>
<h3 id="by1"></h3>   