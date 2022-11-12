<?php
include "../inc/connection.php";   
$id =$_POST["id"]; 
$sql = "SELECT * FROM client as c INNER JOIN order_detail as od where c.id=$id && od.id=$id";
$result = mysqli_query($conn, $sql);
$output = "";
if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)){
    $output  .= "<style>
	#printmodal-form{
		background:rgb(255, 255, 255);
		width: 300px;
		position: relative;
		font-size: 16px;
		line-height: 24px;
		font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
		top: 3%;
		left: calc(50% - 23%);
		padding: 0px;
		border-radius: 4px;
		margin-right: 100px;
	  }
	  
			body {
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				text-align: center;
			}

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

		<div class='invoice-box'>
			<table>
				<tr class='top'>
					<td colspan='2'>
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
				<tr class='information'>
					<td colspan='2'>
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
    <td width='90px'>Name</td>
    <td><label>{$row["Name"]}<br /></td>
  </tr>
  <tr>
    <td width='90px'>CNIC</td>
    <td>
    <label>{$row["CNIC"]}</td>
  </tr>
  <tr>
    <td width='90px'>Phone</td>
    <td><label>{$row["phone_no"]}</td>
  </tr>
    <td width='90px'>Sq feet</td>
    <td><label>{$row["sqfeet"]}</td>
  </tr>
  <tr>
    <td width='90px'>Service</td>
    <td><label>{$row["service"]}</td> 
    </tr>
  <tr>
    <td width='90px'>Charge</td>
    <td><label>{$row["charge"]}</td>
  </tr>
  <tr>
    <td width='90px'>Discount type</td>
    <td><label>{$row["discount_type"]}</td> 
    </tr>
  <tr>
    <td width='90px'>Discount</td>
    <td><label>{$row["discount"]}</td>
  </tr>
  <tr>
    <td width='90px'>Total Amount</td>
    <td><label>{$row["tamount"]}</td>
  </tr>
  </tr>          
  <td><button class='new-submit'><a class='printPage'>Print</a></button></td>
  </tr>";
  }
  echo $output;
}   
else{
    echo "No data Found";
}
?>




