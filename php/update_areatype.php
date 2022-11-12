<?php
include "../inc/connection.php";   
$id =$_POST["id"]; 
$sql = "SELECT * FROM area_type where id=$id";
$result = mysqli_query($conn, $sql);
$output = "";
if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)){
    $output  .= "
    <tr>
    <td width='90px'>Area Type</td>
    <td><input type='text' id='aname' value='{$row["area_type"]}'></td>
  </tr>
  <tr>
    <td><input type='text' id='id' value='{$row["id"]}' hidden></td>
  </tr>
  <tr>
    <td width='90px'>Sq.Feet</td>
    <td>
      <input type='number' id='sfeet' value='{$row["sq"]}' >
    </td>
  </tr>
  
  <td><button type='button' id='updata-area_btn'>Save</button></td>
  </tr>";
  }

  echo $output;
}   
else{
    echo "No data Found";
}
?>