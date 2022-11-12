<?php
error_reporting(0);
require_once "../inc/dompdf/vendor/autoload.php";
 include "connection.php";   
 use Dompdf\Dompdf;
 $id=46;
// echo $id;
// $id = $_POST['id'];
$sql = "SELECT * FROM client as c INNER JOIN order_detail as od where c.id=$id And od.id=$id";
 $stmt=$con->prepare($sql);
 $stmt->execute();
 $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
// print_r($rows);
foreach ($rows as $row){
  $output .='<!DOCTYPE html>
  <html>
	  <head>

		  <title>
		  '.$row["id"].'
		  </title>
		  <style>
			  h2{
				  font-family: verdana, Geneva , Tahoma ,sans-serif;
   
			  }
			  table{
				  font-family: Arial,Helvetica,sans-serif;
				  border-collapse: collapsw;
				  width:100%
				  flex-direction: column;
			  }
			  td,
			  th{
				padding-bottom: 20px;
			}
		  </style>
	  </head>
<style>
			  body h2 {
				  text-shadow: black;
				  margin-bottom: 0px;
				  padding-bottom: 0px;
				  color: black;
				  text-align: center;
			  }
  
			  body h3 {
				  margin-top: 0px;
				  margin-bottom: 0px;
				  font-style: italic;
				  color: black;
				  font-size:14px;
				  text-align: center;
			  }

			  .invoice-box table {
				  width: 100%;
				  line-height: inherit;
				  text-align: left;
				  border-collapse: collapse;
			  }
  
			  .invoice-box table td {
				  padding: 5px;
				  vertical-align: top;
			  }
  
			  .invoice-box table tr td:nth-child(2) {
				  text-align: right;
			  }
  
			  .invoice-box table tr.top table td {
				  padding-bottom: 10px;
				  border-bottom: 1px solid grey;
  
			  }
  
			  .invoice-box table tr.top table td.title {
				  font-size: 45px;
				  line-height: 45px;
				  color: #Green;
			  }
  
			  .invoice-box table tr.information table td {
				  padding-bottom: 10px;
				  border-bottom: 1px solid grey;
  
			  }
  
			  @media only screen and (max-width: 600px) {
				  .invoice-box table tr.top table td {
					  width: 100%;
					  display: block;
					  text-align: center;
				  }
  
				  .invoice-box table tr.information table td {
					  width: 100%;
					  display: block;
					  text-align: left;
				  }
			  }
		  </style>
	  <body>
  
		  <div class="invoice-box">
			  <table>
				  <tr class="top">
					  <td colspan="2">
						  <table>
							  <tr>
								  <td>							
								  <h2>Guardian Associate</h2>
								  <h3>Garden Town
								  <h3>Hammad: 0305-7865405
								  <h3>Saad: 0303-9269664
								  <h3>GuardianAssociate@gmail.com															
								  </td>
							  </tr>
						  </table>
					  </td>
				  </tr>
				  <tr class="information">
					  <td colspan="2">
						  <table>
							  <tr>
								  <td>
									  Customer Id:'.$row["id"].'
								  </td>
								  <td>
								  Date:'.$row["Date"].'
									  <br/>
								  </td>
							  </tr>
						  </table>
					  </td>
				  </tr>  
				  <tr>
				  <body>
  <table>
	  <tr>
	  <th width="90px">Name</th>
	  <td>'.$row["Name"].'</td>
	</tr>
	<tr>
	  <th width="90px">CNIC</th>
	  <td>'.$row["CNIC"].'</td>
	</tr>
	<tr>
	  <th width="90px">Phone</th>
	  <td>'.$row["phone_no"].'</td>
		</tr>
		<tr>
		<th width="90px">Area Type</th>
		<td>'.$row["area_type"].'</td>
		</tr>
	<tr>
		<th width="90px">Sq feet</th>
		<td>'.$row["sqfeet"].'</td>
		</tr>
	<tr>
	  <th width="90px">Service</th>
	  <td>'.$row["service"].'</td>
	  </tr>
	<tr>
	  <th width="90px">Charge</th>
	  <td>'.$row["charge"].'</td>

	</tr>
	<tr>
	  <th width="90px">Discount type</th>
	  <td>'.$row["discount_type"].'</td>

	  </tr>
	<tr>
	  <th width="90px">Discount</th>
	  <td>'.$row["discount"].'</td>

	</tr>
	<tr>
	  <th width="90px">Total Amount</th>
	  <td>'.$row["tamount"].'</td>
		  </tr>
		  </table>
		  </body>
		  </html>';
}
echo   $output;
$dompdf= new Dompdf;
$dompdf-> loadHTML($output);
// $dompdf-> setPaper('A4','portrait');
$dompdf->render();
// $dompdf-> stream('pdf');

?>