/*
 *
 * login-register modal
 * Autor: Fitzgerald Afful
 * 
 */

$(document).ready(function (e){


    if(sessionStorage.getItem("username") === null){
        //console.log(window.location.pathname);
        /*if(!(window.location.pathname === "/about/index.php")||(window.location.pathname === "/about/verification.html")){
            window.location.href = '/about/index.php';

            /portal/v1.3/index.php
        }*/
    }


    /*for(var i=0, len=sessionStorage.length; i<len; i++) {
        var key = sessionStorage.key(i);
        var value = sessionStorage[key];
        //console.log(key + " => " + value);
    }*/



    switch(window.location.pathname) {
        case "/portal/v1.3/verification.html":
            $("#verifyp").text("Please verify account via email, "+sessionStorage.getItem("email")+".");
            break;
        case "/portal/v1.3/main/students.html":
            $("#us_name").text(sessionStorage.getItem("username"));
        case "/portal/v1.3/bills.html":
            //console.log("shiii");
            $("#us_name").text(sessionStorage.getItem("username"));
            $("#titling").text(sessionStorage.getItem("studentName")+" - BILLS & PAYMENTS");
        case "/portal/v1.3/main/academics.html":
            $("#us_name").text(sessionStorage.getItem("username"));
            $("#titling").text(sessionStorage.getItem("studentName")+" - ACADEMIC RECORDS");
            break;
        default:
            //console.log(window.location.pathname);
            //console.log("shiii1");
            $("#us_name").text(sessionStorage.getItem("username"));
            $("#titling").text(sessionStorage.getItem("studentName"));
    }



});



function showRegisterForm(){
    $('.registerBox1').fadeOut('fast',function(){
        $('.registerBox').fadeIn('fast');
        $('.login-footer').fadeOut('fast',function(){
            $('.register-footer').fadeIn('fast');
        });
        $('.modal-title').html('Register with');
    }); 
    $('.error').removeClass('alert alert-danger').html('');
       
}

function newStudentForm(){
    $('.registerBox1').fadeOut('fast',function(){
        $('.registerBox1').fadeIn('fast');
        $('.login-footer').fadeOut('fast',function(){
            $('.register-footer').fadeIn('fast');
        });
        $('.modal-title').html('Add New Student');
    });
    $('.error').removeClass('alert alert-danger').html('');

}

function showLoginForm(){
    $('#loginModal .registerBox').fadeOut('fast',function(){
        $('.registerBox1').fadeIn('fast');
        $('.register-footer').fadeOut('fast',function(){
            $('.login-footer').fadeIn('fast');    
        });
        document.getElementById("Log").disabled = false;
        $('.modal-title').html('Login with');
    });       
     $('.error').removeClass('alert alert-danger').html(''); 
}

function logout(){
    //console.log("here");
    window.sessionStorage.removeItem("username");
    window.location.href = '../index.php';
}

function openLoginModal(){
    showLoginForm();
    setTimeout(function(){
        $('#loginModal').modal('show');    
    }, 230);
    
}
function openRegisterModal(){
    showRegisterForm();
    setTimeout(function(){
        $('#loginModal').modal('show');    
    }, 230);
    
}

function openNewStudent(){
    newStudentForm();
    setTimeout(function(){
        $('#addNew').modal('show');
    }, 230);

}

function viewStudent(str){

    //console.log(str.substring(0,str.indexOf(",")).trim());
    //console.log(str.substring(str.indexOf(",")+1,str.length).trim());
    var str1 = str.substring(str.indexOf(",")+1,str.length).trim();
    //console.log(str1.substring(0,str1.indexOf(",")).trim());
    //console.log(str1.substring(str1.indexOf(",")+1,str1.length).trim());

    sessionStorage.setItem("schoolID",str.substring(0,str.indexOf(",")).trim());
    sessionStorage.setItem("studentID",str1.substring(0,str1.indexOf(",")).trim());
    sessionStorage.setItem("studentName",str1.substring(str1.indexOf(",")+1,str1.length).trim());

    window.location.replace("bills.html");
}

function loginAjax(){
    //console.log("Here");

    $.post( "/login", function( data ) {
        var email = $("#email").val().trim();
        var userpass = $("#password").val().trim();

        //console.log(email);
        //console.log(userpass);

        if(data == 1){
            window.location.replace("/home");
        } else {
            shakeModal();
        }
    });

     //shakeModal();
}

function shakeModal(){
    $('#loginModal .modal-dialog').addClass('shake');
             $('.error').addClass('alert alert-danger').html("Invalid email/password combination");
             $('input[type="password"]').val('');
             setTimeout( function(){ 
                $('#loginModal .modal-dialog').removeClass('shake'); 
    }, 1000 ); 
}

   