<?php
include "../inc/connection.php";  
$sid = $_POST["sname"];
$sqfeet = $_POST["sqfeet"];
$sql = "Select rate from services where service='".$sid."'";
$query = mysqli_query($conn, $sql);
if(mysqli_num_rows($query)>0){
    while($row = mysqli_fetch_assoc($query)){
        $rate = $row['rate'];
    }
}


 $charg = ($rate) * ($sqfeet);
 echo $charg;
?>