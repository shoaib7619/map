<?php
include "../inc/connection.php";   
$id =$_POST["id"]; 
$sql = "SELECT * FROM client as c INNER JOIN order_detail as od where c.id=$id && od.id=$id";
$result = mysqli_query($conn, $sql);
$output = "";
if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)){
    $output  .= "<tr>
    <td width='90px'>Date</td>
    <td><input type='date' id='udate' value='{$row["Date"]}'>
        <input type='number' id='id' value='{$row["id"]}' hidden></td>
  </tr>
  <tr>
    <td width='90px'>Name</td>
    <td><input type='text' id='ucname' value='{$row["Name"]}'></td>
  </tr>
  <tr>
    <td width='90px'>CNIC</td>
    <td>
      <input type='number' id='ucnic' value='{$row["CNIC"]}' >
    </td>
  </tr>
  <tr>
    <td width='90px'>Phone</td>
    <td><input type='number' id='uphone' value='{$row["phone_no"]}'></td>
  </tr>
  <tr>
            <td width='90px'>Area type</td>
            <td><select type='text' id='uatype'>
                <option value='{$row["area_type"]}'>{$row["area_type"]}</option>
            </td>
          </tr>
  <tr>
    <td width='90px'>Sq feet</td>
    <td><input type='float' id='usqfeet' value='{$row["sqfeet"]}' ></td>
  </tr>
  <tr>
            <td width='90px'>Service</td>
            <td><select type='text' id='uservices' onchange='ucharges()'>
            <option value='{$row["service"]}'>{$row["service"]}</option>
            </td> 
          </tr>
  
  <tr>
    <td width='90px'>Charge</td>
    <td><input type='float' id='ucharge' disabled='disabled' value='{$row["charge"]}'></td>
  </tr>
  <tr>
            <td width='90px'>Discount type</td>
            <td><Select type='text' id='udiscounttype'>
            <option value='Percentage'>Percentage</option>
            <option value='Manual'>Manual</option>
            </td>
          </tr>
  <tr>
    <td width='90px'>Discount</td>
    <td><input type='float' id='udiscount' oninput='uabc()' value='{$row["discount"]}'></td>
  </tr>
  <tr>
    <td width='90px'>Total Amount</td>
    <td><input type='float' id='utamount' disabled='disabled' value='{$row["tamount"]}'></td>
  </tr>
    
  <td><button type='button' class='updata_submit'>Save</button></td>
  </tr>";
  }

  echo $output;
}   
else{
    echo "No data Found";
}
?>