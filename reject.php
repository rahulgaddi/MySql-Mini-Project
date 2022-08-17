<?php
include('config.php');
$a=$_GET['san'];

$sqll="update registration set reg_status='Rejected' where reg_id='$a'";
$conn->query($sqll);
echo '<meta http-equiv="refresh" content="0.1; URL=alog1.php">';
?>