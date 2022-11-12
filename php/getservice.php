<?php
include "../inc/connection.php";  
$sql = "Select * From services";
$querry = mysqli_query($conn,$sql) or die("Queery die");
$str =  "";
while($row = mysqli_fetch_assoc($querry)){
    // $str .= "<option value='{$row['id']}'>{$row['service']}</option>";
    $str .= "<option value='{$row['service']}'>{$row['service']}</option>";

}
echo $str;
?>