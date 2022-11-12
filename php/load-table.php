<?php
include "../inc/connection.php";   


$limit_per_page = 6;

$page = "";
if(isset($_POST["page_no"])){
  $page = $_POST["page_no"];
}else{
  $page = 1 ;
}
$offset = ($page - 1) * $limit_per_page;



$sql = "SELECT * FROM client as c INNER JOIN order_detail as od where c.id=od.id LIMIT {$offset},{$limit_per_page}";
$result = mysqli_query($conn, $sql);
$output = "";
if(mysqli_num_rows($result) > 0){
    $output  .= '<table class="tab" border="1" cellspacing="0" cellpadding="10px"
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
    <!--<th>Delete</th>-->
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
<!--   <td align='center'><button id='del-btn' class='delete-btn' data-order_delid='{$row["id"]}'>Delete</button></td>  --> 
 <!--  <td align='center'><button id='del-btn' class='print-btn' data-order_printid='{$row["id"]}'>Print</button></td> -->
    <td> <button> <a href='http://localhost/map/pdf/pdf.php' class='print-btn' data-order_printid='{$row["id"]}' target='_blank'>Print</a></button></td>
</tr>"; 
  }
  // href='http://localhost/map/pdf/pdf.php'
  $output .= "</table>";
  // 
  $sql_total =  "SELECT * FROM client as c INNER JOIN order_detail as od where c.id=od.id ";
  $records = mysqli_query($conn, $sql_total) or die("Query Unsuccessful.");
  $total_record = mysqli_num_rows($records);
  $total_pages = ceil($total_record/$limit_per_page);

  $output .='<div id="pagination">';
 
  for($i=1; $i <= $total_pages; $i++){
    if($i == $page){
      $class_name = "active";
    }else{
      $class_name = "";
    }
    $output .= "<a class='{$class_name}' id='{$i}' href=''>{$i}</a>";
  }
  $output .='</div>';

  echo $output;
}   
else{
    echo "No data Found";
}

?>
