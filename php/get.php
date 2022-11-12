<?php
include "../inc/connection.php";  
$sql = "Select * From area_type";
$querry = mysqli_query($conn,$sql) or die("Queery die");
$str =  "";
while($row = mysqli_fetch_assoc($querry)){
    // $str .= "<option value='{$row['id']}'>{$row['area_type']}</option>";
    $str .= "<option value='{$row['area_type']}'>{$row['area_type']}</option>";

}
echo $str;
?>