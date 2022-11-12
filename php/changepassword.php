<?php
include "../inc/connection.php"; 

$uname = $_POST['uname'];
$opword = $_POST['opword'];
$npword = $_POST['npword'];
$cpword = $_POST['cpword'];

$sql = "Select username,password From users where id=1";
$data = mysqli_query($conn, $sql);
if(mysqli_num_rows($data) > 0){
    while($row = mysqli_fetch_assoc($data)){
        $username = $row['username'];
        $password = $row['password'];
    }
}

if($npword != $cpword){
    
}else if($opword == $password and  $uname === $username ){
    $sql2 = "Update users set username = '{$uname}', password = '{$npword}' where id=1";
    $query2 = mysqli_query($conn, $sql2);
    echo    json_encode(array('change' => 'success'));
}else{
    echo    json_encode(array('error' => 'failed'));

}

?>