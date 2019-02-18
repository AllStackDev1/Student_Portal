$(document).ready(function () {
    $("#btn-login").click(function(e) {
        e.preventDefault();
        login();
    });
    $("#btn-forget").click(function(e) {
        e.preventDefault();
        forget();
    });
 })

function login(){

	$('.error_message1').hide();
    $('.error_message2').hide();
    $('.success_message').hide();

	var studentid = $('#login_id').val();
	var password = $('#login_password').val()
    $.ajax({
    
	    type: "POST",
	    url: "../v1.2/api/studentportalapi_.php/Login/",
	    data:   "&sz_studentid=" + studentid + 
	            "&sz_password=" + password,
	    cache: false,
	    
	    success: function (d) {
	        if(d.success == true){
	        	$('.success_message').show();
			    sessionStorage.setItem('studentid', d.sz_studentid);
			    sessionStorage.setItem('studentname', d.sz_studentname);
			    sessionStorage.setItem('szclass', d.sz_class);
			    sessionStorage.setItem('schoolid', d.sz_schoolid);
			    document.location.href = "../v1.2/main/";
	        }else if(d.success == false){
	            //
	            $('.error_message1').show();
	        } else{
	        	$('.error_message2').show();
	        }
	    }
	    
	});
    return false;
}

function forget(){

	var studentid = $('#studentid').val();
	var email = $('#email').val();
	var mobile = $('#mobile').val();
	var dob = $('#dob').val();
	var comfirm_password = $('#comfirm_password').val()
	var newpass = $('#newpass').val();

    $.ajax({
    
	    type: "POST",
	    url: "http://localhost/iKolilu/studentportal/v1.2/api/studentportalapi_.php/Login/",
	    data:   "&sz_studentid=" + studentid + 
	            "&sz_email=" + email + 
	            "&sz_mobile=" + mobile + 
	            "&sz_dob=" + dob + 
	            "&sz_newpass=" + password,
	    cache: false,
	    
	    success: function (d) {
	        if(d.success == true){
	        	$('.success_message').show();
			    // 
	        }else if(d.success == false){
	            //
	            $('.error_message1').show();
	        } else{
	        	$('.error_message2').show();
	        }
		}
	});
	return false;
}
