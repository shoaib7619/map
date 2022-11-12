function ucharges(){
    var sname = document.getElementById('uservices').value;
    var sqfeet = document.getElementById('usqfeet').value;
    var formdata = {
        'sname' : sname,
        'sqfeet' : sqfeet
    }
    $.ajax({
        url : 'php/charges.php',
        type : 'POST',
        dataType : 'json',
        data : formdata,
        success: function(res){
            $('#ucharge').val(res);
        }
    })
}

function uabc(){
    var discounttype = document.getElementById('udiscounttype').value;
    var charge = document.getElementById('ucharge').value;
    var discount = document.getElementById('udiscount').value;
    var tamount;
    if(discounttype == 'Manual'){
    tamount =  charge - discount;
    }else{
    tamount = charge - ((charge*discount)/100);
    }
    $('#utamount').val(tamount);
    }

function servicestable(){
    $.ajax({
        type: "GET",
        url: "php/services.php",
        success: function (data) {
        $("#table").html(data); 

        }
    });
}

function areatypetable(){
    $.ajax({
        type: "GET",
        url: "php/areatype.php",
        success: function (data) {
        $("#table").html(data); 

        }
    });
}
function loadData(){
    $.ajax({
        url : "php/get.php",
        type : "POST",
        success : function(data){
            $("#atype").append(data);
        }
    })
}
loadData();
function loadData1(){
    $.ajax({
        url : "php/getservice.php",
        type : "POST",
        success : function(data){
            $("#services").append(data);

        }
    })
} 
loadData1();

$(document).ready(function(){

    function loadtable(page){
        $.ajax({
            type: "POST",
            url: "php/load-table.php",
            data:{page_no : page},
            success: function (data) {
            $("#table").html(data); 
    
            }
        });
    }
    loadtable();


    // function loadtable(){
    //     $.ajax({
    //         type: "GET",
    //         url: "php/load-table.php",
    //         success: function (data) {
    //         $("#table").html(data); 
    
    //         }
    //     });
    // }
    // loadtable();

        //Pagination Code
        $(document).on("click","#pagination a",function(e) {
            e.preventDefault();
            var page_id = $(this).attr("id");
      
            loadtable(page_id);
          })

    $('#order').click(function(){
        loadtable();
    }); 
    
    $('#service').click(function(){
        servicestable();
    });  


    $('#areatype').click(function(){
        areatypetable();
    });  


    // Add new order 
    $('#add').click(function(){
        var editModal =document.getElementById("modal");
        editModal.style.display ='block';
    });    
        $(".new-submit").click(function(e){
            e.preventDefault();
            var date = $("#date").val();
            var cname = $("#cname").val();
            var cnic = $("#cnic").val();
            var phone = $("#phone").val();
            var atype = $("#atype").val();
            var sqfeet = $("#sqfeet").val();
            var services = $("#services").val();
            var charge = $("#charge").val();
            var discounttype = $("#discounttype").val();
            var discount = $("#discount").val();
            var tamount = $("#tamount").val();
            if(date===''|| cname===''|| cnic===''|| phone===''|| atype===''|| 
                       sqfeet===''|| services===''|| charge===''|| discounttype===''|| 
                       discount===''|| tamount===''){
                         alert('Fill all field');
                       }
                       else{
            $.ajax({
                url : "php/insert.php",
                type : "POST",
                data : {
                    date : date,
                    cname : cname,
                    cnic : cnic,
                    phone : phone,
                    atype : atype,
                    sqfeet : sqfeet,
                    services : services,
                    charge : charge,
                    discounttype : discounttype,
                    discount : discount,
                    tamount : tamount
                },
                success : function(data){
                    if(data == 1){
                        document.getElementById('addModal-form').reset();
                        loadtable();     
                        hide_modal(); 
                        
                        show_message('success','Data insert successfully');                       
                    }else{
                        show_message('error','Data Not insert successfully');
                    }
                    
                }
            });
           }
       });       

// Delete order 
$(document).on("click",".delete-btn",function(){
    var id=$(this).data("order_delid");
    if(confirm("Are you want to delete this record?")){
        $.ajax({
        url:"php/delete.php",
        type:"POST",
        data:{id: id},
        success:function(data){
            if(data == 1){
                show_message('success','Data Delete successfully');
                loadtable();     
            }else{
                show_message('error',"Data Delete successfully");
            }
        }
    });
}
});


// Edit order detail
    $(document).on("click",".edit-btn",function(){
            var editModal =document.getElementById("editmodal");
            editModal.style.display ='block';
            var id=$(this).data("order_eid");
                $.ajax({
                url:"php/updateorder.php",
                type:"POST",
                data:{id: id},
                success:function(data){
                    $("#editmodal-form table").html(data);
                }
            });
            function loadData(){
                $.ajax({
                    url : "php/get.php",
                    type : "POST",
                    success : function(data){
                        $("#uatype").append(data);
        
                    }
                })
            }
            loadData();
            function loadData1(){
                $.ajax({
                    url : "php/getservice.php",
                    type : "POST",
                    success : function(data){
                        $("#uservices").append(data);
        
                    }
                })
            } 
           loadData1();
           ucharges();
           uabc();
        });

// update order detail 

    $(document).on("click",".updata_submit",function(){
        var date = $("#udate").val();
        var id = $("#id").val();
        var cname = $("#ucname").val();
        var cnic = $("#ucnic").val();
        var phone = $("#uphone").val();
        var atype = $("#uatype").val();
        var sqfeet = $("#usqfeet").val();
        var services = $("#uservices").val();
        var charge = $("#ucharge").val();
        var discounttype = $("#udiscounttype").val();
        var discount = $("#udiscount").val();
        var tamount = $("#utamount").val();
        if(date===''  || cname===''  || cnic===''  || phone===''  || atype===''  ||sqfeet===''  ||
        services===''  ||charge===''  ||discounttype===''  ||discount==='' || tamount==='' ){
                     alert('Fill all field');
                   }
                   else{
        $.ajax({
            url : "php/edit_order.php",
            type : "POST",
            data : {
                id   : id,
                date : date,
                cname : cname,
                cnic : cnic,
                phone : phone,
                atype : atype,
                sqfeet : sqfeet,
                services : services,
                charge : charge,
                discounttype : discounttype,
                discount : discount,
                tamount : tamount
            },
            success : function(data){
                if(data == 1){
                    show_message('success','Data Update successfully');
                    loadtable();
                    hide_modal();                          
                }else{
                    show_message('error',"Data Can't Update successfully");
                }              
            }
        });
       }
   });      


// search 
$("#search").keyup(function(){
    var search = $(this).val();
    if(search===''){
        loadtable();
    }
    else{
        $.ajax({
            url:"php/search.php",
            type:"POST",
            data:{search: search},
            success:function(data){
                $("#table").html(data); 
            }
        });
    }       
    });

 
// Reset password
$(document).on("click",".setting", function(){
    var editModal = document.getElementById("password_modal");
    editModal.style.display = 'block';  
});
$(document).on("click",".password",function password(){
var uname = document.getElementById('uname').value;
var opword = document.getElementById('opword').value;
var npword = document.getElementById('npword').value;
var cpword = document.getElementById('cpword').value;

if(uname === '' || opword ==='' || npword === ''
 || cpword ==='' ){
    alert('Please Fill All Fields');
    return false;
}else{
    var formdata = {
        'uname' : uname,
        'opword' : opword,
        'npword' : npword,
        'cpword' : cpword
    }
    
    var jsondata = JSON.stringify(formdata);
    $.ajax({
        url: "php/changepassword.php",
        type: 'POST',
        dataType: 'json',
        data:formdata,
        success: function(res) {
            show_message('success','Password Change successfully');
             hide_modal();
             document.getElementById('password-form').reset();
        },
        error: function(){
            show_message('error','Password Not Change Enter Valid Value.');
            }
        
    });
    
}
});
 

// Delete services
$(document).on("click",".service_delete-btn",function(){
    var id=$(this).data("eid");
    if(confirm("Are you want to delete this record?")){
    $.ajax({
        url:"php/delete_service.php",
        type:"POST",
        data:{id: id},
        success:function(data){
            if(data == 1){
            show_message('success','Data Delete successfully');
            servicestable();
            }else{
            show_message('error',"Data Can't Delete successfully");
            }
        }
    });
}
});

//Add Sevices

$(document).on("click","#add_service",function(){
    var editModal =document.getElementById("service_modal");
    editModal.style.display ='block';
});   
    $(".service_modal").click(function(e){
        e.preventDefault();
        var sname = $("#sname").val();
        var rate = $("#rate").val();
        if(sname===''|| rate===''){
                     alert('Fill all field');
                   }
                   else{
        $.ajax({
            url : "php/add_services.php",
            type : "POST",
            data : {
                sname : sname,
                rate : rate
            },
            success : function(data){
                if(data == 1){
                   document.getElementById('serviceModal-form').reset();
                    servicestable();
                    hide_modal(); 
                    show_message('success','Data insert successfully');                    
                }else{
                   show_message('error',"Data Can't insert successfully");
                }          
            }
        });
       }
   });      
   


// Edit services
$(document).on("click",".service_edit-btn",function(){
    var editModal =document.getElementById("editmodal");
    editModal.style.display ='block';
    var id=$(this).data("services_eid");
    $.ajax({
        url:"php/update_services.php",
        type:"POST",
        data:{id: id},
        success:function(data){
            $("#editmodal-form table").html(data);               
        }

    });
});

// update Services
    $(document).on("click",".sevice-submit",function(){
        var id = $("#id").val();
        var sname = $("#sname").val();
        var srate = $("#srate").val();
        if(sname===''|| srate===''){
                     alert('Fill all field');
                   }
                   else{
        $.ajax({
            url : "php/edit_service.php",
            type : "POST",
            data : {
                id    :id,
                sname : sname,
                srate : srate
            },
            success : function(data){
                if(data == 1){
                    show_message('success','Data Update successfully');
                    servicestable();  
                    hide_modal();                    
                }else{
                    show_message('error',"Data Can't Update successfully");
                }       
            }
        });
       }
   });      
     

//Add AreaType
$(document).on("click","#add-btn",function(){
    var editModal =document.getElementById("areatype_modal");
    editModal.style.display ='block';
    }); 
    $(document).on("click", ".areatype_modal",function(e) {
        e.preventDefault();  
        var aname = $("#aname").val();
        var sfeet = $("#sfeet").val();
        if(aname==='' || sfeet===''){
                    alert('Fill the all field');
                   }
                else{
        $.ajax({
            url : "php/add_areatype.php",  
            type : "POST",
            data : {
                aname : aname,
                sfeet : sfeet
            },
            success : function(data){
                if(data == 1){
                    show_message('success','Data insert successfully');
                    areatypetable();
                    hide_modal();
                    document.getElementById('area-form').reset();
                }else{
                    show_message('error',"Data can't insert successfully");
                }                
            }
        });
       }
   });      
     


// Edit AreaType
$(document).on("click",".areatype_edit-btn",function(){
    var editModal =document.getElementById("editmodal");
    editModal.style.display ='block';
    id=$(this).data("areatype_eid");
    $.ajax({
        url:"php/update_areatype.php",
        type:"POST",
        data:{id: id},
        success:function(data){
            $("#editmodal-form table").html(data);
        }
    });   
});

// update area type         
    $(document).on("click","#updata-area_btn",function(){
        var id = $("#id").val();
        var aname = $("#aname").val();
        var sfeet = $("#sfeet").val();
        if(aname ==='' || sfeet===''){
                     alert('Fill the all field');
                   }
                   else{
        $.ajax({
            url : "php/edit_areatype.php",
            type : "POST",
            data : {
                id    : id,
                aname : aname,
                sfeet : sfeet
            },
            success : function(data){
                if(data == 1){
                    show_message('success','Data Update successfully');
                    areatypetable();
                    hide_modal();
                }else{
                    show_message('error',"Data Can't Update successfully");
                }
                
            }
        });
       }
   });          



// Delete AreaType
$(document).on("click",".areatype_delete-btn",function(){
    var id=$(this).data("areatype_eid");
    if(confirm("Are you want to delete this record?")){
    $.ajax({
        url:"php/delete_areatype.php",
        type:"POST",
        data:{id: id},
        success:function(data){
            if(data == 1){
            show_message('success','Data Delete successfully');
            areatypetable();
            }else{
                show_message('error',"Data Can't successfully");
            }
        }
    });
}
});
}); 



// print function
$(document).on("click",".print-btn",function(){
    //  var editModal =document.getElementById("printmodal");
   //  editModal.style.display ='block';
    var  id=$(this).data("order_printid");
  // var  id=[46];
    alert(id);
        $.ajax({
        url:"pdf/pdf.php",
        type:"post",
        data:{id: id},
        //  success:function(data){
        //     $("#printmodal table").html(data);
        //     $('a.printPage').click(function(){
        //         window.print('#printmodal');
        //         hide_modal();                
        //     });
        // }
   });      
});


function charges(){
    var sname = document.getElementById('services').value;
    var sqfeet = document.getElementById('sqfeet').value;
    var formdata = {
        'sname' : sname,
        'sqfeet' : sqfeet
    }

    $.ajax({
        url : 'php/charges.php',
        type : 'POST',
        dataType : 'json',
        data : formdata,
        success: function(res){
            $('#charge').val(res);
        }
    })
}


    function abc(){
    var discounttype = document.getElementById('discounttype').value;
var charge = document.getElementById('charge').value;
var discount = document.getElementById('discount').value;
var tamount;
if(discounttype == 'Manual'){
    tamount =  charge - discount;
}else{
    tamount = charge - ((charge*discount)/100);
}
$('#tamount').val(tamount);
}

    //  hide form 
    function hide_modal(){
        var editModal =document.getElementById("modal");
        editModal.style.display ='none';
        var editModal =document.getElementById("editmodal");
        editModal.style.display ='none';
        var editModal =document.getElementById("service_modal");
        editModal.style.display ='none';
        var editModal =document.getElementById("areatype_modal");
        editModal.style.display ='none';
        var editModal =document.getElementById("password_modal");
        editModal.style.display ='none';
        var editModal =document.getElementById("printmodal");
        editModal.style.display ='none';      
    }

//show message
    function show_message(type,text){
        if(type=='error'){
            var message_box= document.getElementById('error-message');
        }else{

            var message_box= document.getElementById('success-message');
        }
        message_box.innerHTML=text;
        message_box.style.display="block";
        setTimeout(function(){
            message_box.style.display="none";
        },3000)
        }

    