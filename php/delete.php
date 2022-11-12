<?php
include '../inc/connection.php';
$id=$_POST["id"];
$sql1="DELETE from order_detail where id=$id";
$del1 = mysqli_query($conn,$sql1);

$sql2="DELETE from client where id=$id";
$del2 = mysqli_query($conn,$sql2);

if($del1 && $del2){
	echo 1;
	// echo "success";
}else{
	echo 0;
	// echo "failed";

}
?>
