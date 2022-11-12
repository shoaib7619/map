<?php
include "../inc/connection.php"; 

$sname = $_POST["sname"];
$rate = $_POST["rate"];
$sql = "INSERT INTO services (service,rate)values('{$sname}','{$rate}')";
$query = mysqli_query($conn, $sql);
if($query){
    echo    1;
}else{
    echo    0;
}

?>
