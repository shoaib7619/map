<?php
include "../inc/connection.php";   
$id =$_POST["id"]; 
$sql = "SELECT * FROM services where id=$id";
$result = mysqli_query($conn, $sql);
$output = "";
if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)){
    $output  .= "<tr>
    <td width='90px'>Service Name</td>
    <td><input type='text' id='sname' value='{$row["service"]}'></td>
  </tr>
  <tr>
    <td><input type='text' id='id' value='{$row["id"]}' hidden></td>
  </tr>
  <tr>
    <td width='90px'>Service Rate</td>
    <td>
      <input type='number' id='srate' value='{$row["rate"]}' >
    </td>
  </tr>
  
  <td><button type='button' class='sevice-submit'>Save</button></td>
  </tr>";
  }

  echo $output;
}   
else{
    echo "No data Found";
}
?>