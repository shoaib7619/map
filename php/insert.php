<?php
include "../inc/connection.php";
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

$sql = "INSERT INTO client (Date,Name,CNIC,phone_no)
values('{$date}','{$cname}','{$cnic}','{$phone}')";
$query = mysqli_query($conn, $sql);

$sql2 = "INSERT INTO order_detail (area_type,service,sqfeet,charge,discount_type,discount,tamount)
values('{$atype}','{$services}','{$sqfeet}','{$charge}'
,'{$discounttype}','{$discount}','{$tamount}')";
$query2 = mysqli_query($conn, $sql2);

if($query && $query2){
    echo    1;
}else{
    echo    0;
}

?>