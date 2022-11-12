<?php
include "inc/header.php";
include "inc/sidebar.php";
?>
 <div id="table">    
 
        </div>
<!-- Add new form  -->
<?php
    date_default_timezone_set("Asia/Karachi");
?>
<div id="modal">
    <div id="modal-form" >
      <h2>Add Form</h2>
      <form method="POST" id="addModal-form">
        <table cellpadding="10px" width="100%" id="add-form">
        <tr>
            <td width='90px'>Date</td>
            <td><input type='date' value="<?php echo date('Y-m-d') ?>" id='date'></td>
          </tr>
          <tr>
          <tr>
            <td width='90px'>Name</td>
            <td><input type='text' id='cname' ></td>
          </tr>
          <tr>
            <td width='90px'>CNIC</td>
            <td>
              <input type='number' id='cnic' placeholder='Enter CINC without dash' >
            </td>
          </tr>
          <tr>
            <td width='90px'>Phone</td>
            <td><input type='number' id='phone' placeholder='Phone no. without dash' ></td>
          </tr>
          <tr>
            <td width='90px'>Area type</td>
            <td><select type='text' id='atype'>
                <option value="">Select Area Type</option>
            </td>
          </tr>
          <tr>
            <td width='90px'>Sq feet</td>
            <td><input type='float' id='sqfeet' ></td>
          </tr>
          <tr>
            <td width='90px'>Service</td>
            <td><select type='text' id='services' onchange='charges()'>
            <option value="">Select Service</option>
            </td>
          </tr>
          
          <tr>
            <td width='90px'>Charge</td>
            <td><input type='float' id='charge' disabled="disabled"></td>
          </tr>
          <tr>
            <td width='90px'>Discount type</td>
            <td><Select type='text' id='discounttype'>
            <option value="Percentage">Percentage</option>
            <option value="Manual">Manual</option>
            </td>
          </tr>
          <tr>
            <td width='90px'>Discount</td>
            <td><input type='float' id='discount' oninput='abc()'></td>
          </tr>
          <tr>
            <td width='90px'>Total Amount</td>
            <td><input type='float' id='tamount' disabled="disabled"></td>
          </tr>
            
          <td><button type="button" class='new-submit'>Save</button></td>
          </tr>
        </table>
      </form>
      <div id="close-btn" onclick="hide_modal()">X</div>
    </div>
  </div>



  <!-- Edit form -->
  <div id="editmodal">
    <div id="editmodal-form" >
      <h2>Edit Form</h2>
      <form method="POST" id="addModal-form">
        <table cellpadding="10px" width="100%" id="add-form">
       
        </table>
      </form>
      <div id="close-btn" onclick="hide_modal()">X</div>
    </div>
  </div>

<!-- Add services  -->

 <div id="service_modal">
    <div id="service-form" >
      <h2>Add Form</h2>
      <form method="POST" id="serviceModal-form" >
        <table cellpadding="10px" width="100%" id="add-form">
          <tr>
            <td width='90px'>Service Name</td>
            <td><input type='text' id='sname' ></td>
          </tr>
          <tr>
            <td width='90px'>Rate</td>
            <td>
              <input type='number' id='rate' >
            </td>
          </tr>
            
          <td><button type="button" class='service_modal'>Save</button></td>
          </tr>
        </table>
      </form>
      <div id="close-btn" onclick="hide_modal()">X</div>
    </div>
  </div> 


  <!-- Add AreaType  -->
  <div id="areatype_modal">
    <div id="modal-form" >
      <h2>Add Form</h2>
      <form method="POST" id="addModal-form2">
        <table cellpadding="10px" width="100%" id="add-form">
          <tr>
            <td width='90px'>Area Type Name</td>
            <td><input type='text' id='aname'></td>
          </tr>
          <tr>
            <td width='90px'>Square feet</td>
            <td><input type='number' id='sfeet'></td>
          </tr>
            
          <td><button type="button" class='areatype_modal'>Save</button></td>
          </tr>
        </table>
      </form>
      <div id="close-btn" onclick="hide_modal()">X</div>
    </div>
  </div>

<!-- Reset Password  -->

  <div id="password_modal">
    <div id="modal-form" >
      <h2>Change Password</h2>
      <form method="POST" id="password-form">
		<form>
		<tabel>
		<tr>
            <td width='90px'><label>Username</label></td>
            <td><input type='text' id='uname'></td>
          </tr>
          <tr>
            <td width='90px'><label>Old Password</label></td>
            <td><input type='password' id='opword' ></td>
          </tr>
          <tr>
            <td width='90px'><label>New Password</label></td>
            <td><input type='password' id='npword' minlength="8"></td>
          </tr>
          <tr>
            <td width='90px'><label>Confirm Password</label></td>
            <td><input type='password' id='cpword' minlength="8"></td>
          </tr>
          <tr>
                <br>
            <td></td>
            <td><button type="button" id='oldpword' class="password">Save</button></td>
          </tr>
          <div id="close-btn" onclick="hide_modal()">X</div>
        </table>
      </form>
</div>
</div>


<!-- print   -->

<div id="printmodal">
    <div id="printmodal-form">
      <div>
        <table cellpadding="10px" width="100%" id="add-form">

        </table>
      </form>
      <div id="close-btn" onclick="hide_modal()">X</div>
    </div>
  </div>
</div>
<?php
include "inc/footer.php";
?>

