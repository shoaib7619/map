<?php
include "../inc/connection.php"; 
$id=$_POST["id"];
$sql="DELETE From services where id=$id";
if(mysqli_query($conn,$sql)){
	echo 1;
}else{
	echo 0;
}
?>
