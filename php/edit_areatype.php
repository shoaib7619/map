<?php
include "../inc/connection.php"; 
$id =$_POST["id"]; 
$aname = $_POST["aname"];
$sfeet = $_POST["sfeet"];
$sql = "UPDATE  area_type SET area_type='{$aname}', sq='{$sfeet}' where id=$id";
$query = mysqli_query($conn, $sql);
if($query){
    echo    1;
}else{
    echo    0;
}

?>
