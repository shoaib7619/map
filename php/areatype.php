<?php
include "../inc/connection.php";   
 
$sql = "SELECT * FROM area_type";
$result = mysqli_query($conn, $sql);
$output = "";
if(mysqli_num_rows($result) > 0){
    $output  = '<button id="add-btn"  class="add-btn" id="add_areatype">Add New</button><table class="tab" border="1" width="100%" cellspacing="0" cellpadding="10px"
    <tr>
        <th>Area Type</th>
        <th>Square Feet</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>';
  while($row = mysqli_fetch_assoc($result)){
    $output  .= "<tr>
    <td>{$row["area_type"]}</td>
    <td>{$row["sq"]}</td>
    <td align='center'><button id='edit-btn' class='areatype_edit-btn' data-areatype_eid='{$row["id"]}'>Edit</button></td>
    <td align='center'><button id='del-btn' class='areatype_delete-btn' data-areatype_eid='{$row["id"]}'>Delete</button></td>
</tr>";
  }
  $output .= "</table>";

  echo $output;
}   
else{
    echo "No data Found";
}

?>