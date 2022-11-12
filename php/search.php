<?php
include "../inc/connection.php";  
$search =$_POST["search"];
$sql = "SELECT * FROM client as c INNER JOIN order_detail as od where  c.id=od.id and concat(Date,Name,CNIC) LIKE '%{$search}%'";
$result = mysqli_query($conn, $sql);
$output = "";
if(mysqli_num_rows($result) > 0){
    $output  = '<table class="tab" border="1" width="100%" cellspacing="0" cellpadding="10px"
  <tr>
        <th>Date</th>
        <th>Name</th>
        <th>CNIC</th>
        <th>Phone No</th>
        <th>Area Type</th>
        <th>Services</th>
        <th>Sq.Feet</th>
        <th>Charge</th>
        <th>discount Type</th>
        <th>Discount</th>
        <th>Total Amount</th>
        <th>Edit</th>
        <th>Delete</th>
        <th>Print</th>
    </tr>';
  while($row = mysqli_fetch_assoc($result)){
    $output  .= "<tr>
    <td>{$row["Date"]}</td>
    <td>{$row["Name"]}</td>
    <td>{$row["CNIC"]}</td>
    <td>{$row["phone_no"]}</td>
    <td>{$row["area_type"]}</td>
    <td>{$row["service"]}</td>
    <td>{$row["sqfeet"]}</td>
    <td>{$row["charge"]}</td>
    <td>{$row["discount_type"]}</td>
    <td>{$row["discount"]}</td>
    <td>{$row["tamount"]}</td>
    <td align='center'><button id='edit-btn' class='edit-btn' data-order_eid='{$row["id"]}'>Edit</button></td>
    <td align='center'><button id='del-btn' class='delete-btn' data-order_delid='{$row["id"]}'>Delete</button></td>
    <td align='center'><button id='del-btn' class='print-btn' data-order_printid='{$row["id"]}'>Print</button></td>
</tr>";
  }
  $output .= "</table>";

  echo $output;
}   
else{
    echo "No data Found";
}

?> 


