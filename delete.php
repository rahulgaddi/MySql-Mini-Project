<?php
include('config.php');
$a=$_GET['san'];

$sqll="delete from insurance where ino='$a'";
$conn->query($sqll);
echo '<meta http-equiv="refresh" content="0.1; URL=log2.php">';
?>