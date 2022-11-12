<?php 
include '../inc/connection.php';
session_destroy();
if(isset($_POST['username'])){
    
    $username=$_POST['username'];
    $password=$_POST['password'];
    
    $sql="SELECT * from users where username='".$username."'AND password='".$password."' limit 1";
    
    $result= mysqli_query($conn,$sql);
    
    if(mysqli_num_rows($result)==1){
        header('location:'.$siteurl);
        exit();
    }
    else{

        echo "<script>alert('Wrong Password')</script>";
        header('location:'.$baseurl);

       
    }
        
}
?>