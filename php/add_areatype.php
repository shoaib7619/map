<?php
include "../inc/connection.php"; 
$aname = $_POST["aname"];
$sfeet = $_POST["sfeet"];
$sql = "INSERT INTO area_type (area_type,sq)values('{$aname}','{$sfeet}')";
$query = mysqli_query($conn, $sql);
if($query){
    echo    1;
}else{
    echo    0;
}
?>
