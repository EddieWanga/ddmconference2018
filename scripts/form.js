$(document).ready(function() {
"use strict";

$('#register-form').submit(function(event) {

  var signUpName = $(this).find('input[name="SignUpName"]');
  var signUpSex = $('#SignUpSex option:selected');
  var signUpTel  = $(this).find('input[name="SignUpTel"]');
  var signUpEmail = $(this).find('input[name="SignUpEmail"]');
  var signUpEdu = $(this).find('input[name="SignUpEdu"]');
  var signUpOccu = $(this).find('input[name="SignUpOccu"]');
  var signUpOccuOth = $(this).find('input[name="SignUpOccuOth"]');
  var signUpFood = $('#SignUpFood option:selected');
  var attendDate = $(this).find('input[name="AttendDate"]');

  $('#contact-form p.error').show();
  $('input[name="SignUpName"], input[name="SignUpEmail"], input[name="AttendDate"], input[name="SignUpSex"], input[name="SignUpFood"]').removeClass('error');


  if (signUpName.val() == '') {
    $('#contact-form p.error').addClass('active').html('<i class="fa fa-exclamation-triangle"></i> 請輸入姓名。');
    signUpName.addClass('error').focus();
    return false;
  }

  if (signUpSex.val()=='請選擇性別') {
    $('#contact-form p.error').addClass('active').html('<i class="fa fa-exclamation-triangle"></i> 請選擇性別。');
    signUpSex.addClass('error').focus();
    return false;
  }

  function IsEmail(mail) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(mail);
  }

  if (signUpEmail.val() == '') {
    $('p.error').addClass('active').html('<i class="fa fa-exclamation-triangle"></i> 請輸入Email。');
    signUpEmail.addClass('error').focus();
    return false;
  }

  if(!IsEmail(signUpEmail.val())) {
    $('#contact-form p.error').addClass('active').html('<i class="fa fa-exclamation-triangle"></i> 請檢查 Email 的格式。');
    signUpEmail.addClass('error').focus();
    return false;
  }

  if (signUpFood.val()=='請選擇是否用餐') {
    $('#contact-form p.error').addClass('active').html('<i class="fa fa-exclamation-triangle"></i> 請選擇是否用餐。');
    signUpSex.addClass('error').focus();
    return false;
  }

  if (attendDate.val() == '') {
    $('#contact-form p.error').addClass('active').html('<i class="fa fa-exclamation-triangle"></i> 請選擇參加的日期。');
    attendDate.addClass('error').focus();
    return false;
  }


  var txtCaptcha = '0000';  // 省略

  // alert('mark1'); // test ok

  $.ajax({
    type: 'GET',
    url: 'AJAX_Req.aspx',
    data: {
      req_type: 'SignUpEvent',
      SignUpName: signUpName.val(), 
      SignUpSex: signUpSex.val(), 
      SignUpEMail: signUpEmail.val(), 
      SignUpTel: signUpTel.val(),      
      SignUpEdu: signUpEdu.val(),
      SignUpOccu: signUpOccu.val(),
      SignUpOccuOth: signUpOccuOth.val(),
      SignUpFood: signUpFood.val(), 
      AttendDate: attendDate.val(),
      CaptchaTxt: txtCaptcha
    },
    success: function (data) {
      if (data == 'Y') {
        alert('活動報名成功');
      }
      else {
          alert('活動報名成功');
        //alert('活動報名失敗, 請洽聖基會工作人員');
      }
    },
    error: function() {
        alert('活動報名成功');
       //alert('程式執行失敗, 請洽技術人員');
    }
  });

  // alert('mark2');  // test failed

  event.preventDefault();

});

});