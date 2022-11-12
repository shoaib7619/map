<?php
include "../inc/connection.php";   
 
$sql = "SELECT * FROM services";
$result = mysqli_query($conn, $sql);
$output = "";
if(mysqli_num_rows($result) > 0){
    $output  = '<button class="add-btn" id="add_service">Add New</button>
    <table class="tab" border="1" width="100%" cellspacing="0" cellpadding="10px"
    <tr>
        <th>Service</th>
        <th>Rate</th>
        <th>Edit</th>
        <th>Delete</th>        
    </tr>';
  while($row = mysqli_fetch_assoc($result)){
    $output  .= "<tr>
    <td>{$row["service"]}</td>
    <td>{$row["rate"]}</td>
    <td align='center'><button id='edit-btn' class='service_edit-btn' data-services_eid='{$row["id"]}'>Edit</button></td>
    <td align='center'><button id='del-btn' class='service_delete-btn' data-eid='{$row["id"]}'>Delete</button></td>
</tr>";
  }
  $output .= "</table>";

  echo $output;
}   
else{
    echo "No data Found";
}

?>


