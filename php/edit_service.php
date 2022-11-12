<?php
include "../inc/connection.php"; 
$id =$_POST["id"]; 
$sname = $_POST["sname"];
$srate = $_POST["srate"];
$sql = "UPDATE  services SET service='{$sname}', rate='{$srate}' where id=$id";
$query = mysqli_query($conn, $sql);
if($query){
    echo    1;
}else{
    echo    0;
}

?>
