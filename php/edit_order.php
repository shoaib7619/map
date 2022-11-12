<?php
include "../inc/connection.php";
$id = $_POST["id"];
$date = $_POST["date"];
$cname = $_POST["cname"];
$cnic = $_POST["cnic"];
$phone = $_POST["phone"];
$atype = $_POST["atype"];
$sqfeet = $_POST["sqfeet"];
$services = $_POST["services"];
$charge = $_POST["charge"];
$discounttype = $_POST["discounttype"];
$discount = $_POST["discount"];
$tamount = $_POST["tamount"];

$sql = "UPDATE client SET Date='{$date}',Name='{$cname}',CNIC={$cnic},phone_no={$phone} where id=$id";
$query = mysqli_query($conn, $sql);

$sql2 = "UPDATE  order_detail SET area_type='{$atype}',service='{$services}',sqfeet={$sqfeet},charge={$charge}
,discount_type='{$discounttype}',discount={$discount},tamount={$tamount}  where id=$id";
$query2 = mysqli_query($conn, $sql2);

if($query){
    echo    1;
}else{
    echo    0;
}

?>