<?php
 require_once "../inc/dompdf/vendor/autoload.php";
 use Dompdf\Dompdf;
 $conn = new PDO('mysql:host=localhost;dbname=map','root','') or die('Connection Failed.');
 $id=46;  
 $sql = "SELECT * FROM client as c INNER JOIN order_detail as od where c.id=$id && od.id=$id";
 $stmt=$conn->prepare($sql);
 $stmt->execute();
 $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
// print_r($rows);
foreach ($rows as $row){
  $output .='<body>
  <table>
	  <tr>
	  <th width="90px">Name</th>
	  <td>".$row["Name"]."</td>
	</tr>
	<tr>
	  <th width="90px">CNIC</th>
	  <td>".$row["Name"]."</td>
	</tr>
	<tr>
	  <th width="90px">Phone</th>
	</tr>
	  <th width="90px">Sq feet</th>
	</tr>
	<tr>
	  <th width="90px">Service</th>
	  </tr>
	<tr>
	  <th width="90px">Charge</th>
	</tr>
	<tr>
	  <th width="90px">Discount type</th>
	  </tr>
	<tr>
	  <th width="90px">Discount</th>
	</tr>
	<tr>
	  <th width="90px">Total Amount</th>
		  </tr>

	  <tr>
		  </tr>
		  <td></td>
		  <tr></tr>
		  <td>2</td>
		  <td>1sdf</td>
		  <td>1sd</td>
		  <td>we1</td>
		  <td>we1</td>
		  <td>1c</td>
		  <td>1x </td>
		  <td>1xc </td>
		  <td>xc 1</td>
		  <td>zx1</td>
		  <td>1sd</td>
  </tr>
  </tbody>
  
		  </table>
    </body>
</html>	'; 
}
echo   $output;
$dompdf= new Dompdf;
$dompdf-> loadHTML($output);
// $dompdf-> setPaper('A4','portrait');
// $dompdf->render();
// $dompdf-> stream('order.pdf');




?>

<!DOCTYPE html>
  <html>
	  <head>
		  <meta >
		  <meta >
		  <title>
			  PDF
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
			  }
		  </style>
	  </head>
<style>
	  /* #printmodal-form{
		  background:rgb(255, 255, 255);
		  width: 300px;
		  position: relative;
		  font-size: 16px;
		  line-height: 24px;
		  font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
		  top: 3%;
		  left: calc(50% - 23%);
		  padding: 0px;
		  border-radius: 4px;
		  margin-right: 100px;
		} */
		
			  /* body {
				  font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
				  text-align: center;
			  } */
  
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
									  Customer Id: {$row["id"]}<br />
								  </td>
								  <td>
									  Date: {$row["Date"]}<br/>
								  </td>
							  </tr>
						  </table>
					  </td>
				  </tr>  
				  <tr>