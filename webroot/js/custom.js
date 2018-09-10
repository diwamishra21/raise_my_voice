
$(document).ready(function () {
    $(".btn").on("click",function () {
        $(this).blur();
    });

    $(".smooth-scroll").on('click', function (event) {
        var hash = this.hash;
        $('html, body').animate({
            scrollTop: ($(hash).offset().top - 75)
        }, 800);

        $(this).closest("ul").find(".active").removeClass("active");
        $(this).closest("li").addClass("active");
    });

    $("#btn-previous").on("click", function () {
        var currentCount = parseInt($("#concern-form .concern-form-section.active").attr("data-section-order")) - 1;
        $("#concern-form .concern-form-section").removeClass("active").addClass("hidden");
        $("#concern-form .concern-form-section[data-section-order='"+ (currentCount) +"']").removeClass("hidden").addClass("active");

        if(currentCount < 7) {
            $("#btn-proceed").removeClass("hidden");
            $("#btn-download").addClass("hidden");
        }

        if(currentCount == 1) {
            $("#btn-previous").addClass("hidden");
            $("#btn-proceed").removeClass("hidden");
        }
        if(currentCount == 6) {
            $("#btn-previous").addClass("hidden");
            $("#btn-proceed").removeClass("hidden");
        }

        $('html, body').animate({
            scrollTop: 0
        }, 0);
    });

    function checkEmail(mail) {
        var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        return regex.test(mail);
    }

    $('#other').hide();
    $('#resolve1').hide();
    $('#concent').hide();
    // $("#concern_regarding").change(function(){
    // if($('#concern_regarding').val() =='Others')
    // {
    //   $('#other').show();
    // }
    // else
    // {
    //  $('#other').hide();
    // }
        
    // });
    
    $("#colleague_complaint").change(function(){
    var str1=$('#colleague_complaint').val();
      var str2 = "Yes";
      if(str1==str2)
       {
          $('#resolve').hide();
          $('#resolve1').show();
       }
       else{
        $('#resolve').show();
        $('#resolve1').hide();
    }

});
    $('#written_concent').change(function(){
      if($('#written_concent').val() == 'No')
      {
         $('#concent').show();
         $('#confirm_concent').prop('checked', true);
      } 
      else
      {
        $('#concent').hide();
      }  

    });


    $('#others_categorys').hide();
    $('#others_subcategorys').hide();
     // var isChecked = $('#confirm_check').is(':checked');
     //        if(isChecked)
     //        {
     //            $('#confirm_check').css('border','1px solid #cccccc');
     //            $('#check_confirm_check').text('');
     //        }
     //        else
     //        {
     //            $('#confirm_check').css('border','1px solid red');
     //            $('#check_confirm_check').text('Please check the checkbox ');
     //            $('#check_confirm_check').addClass('error_label');
     //            valid = false;
     //        }
        

    $("#btn-proceed").on("click", function () {
        var currentCount = parseInt($("#concern-form .concern-form-section.active").attr("data-section-order")) + 1;
        
        var curSection = parseInt(currentCount - 1);

        var valid = true;
        if(curSection == 1) {
            // var con = $('#category_concern').val();
            //  alert(con);
            // console.log(con);exit;
            if($('#category_concern').val() == "") {
                $('#category_concern').css('border','1px solid red');
                $('#check_concern_regarding').text('Please choose an option ');
                $('#check_concern_regarding').addClass('error_label');
                valid = false;
                $('#concern_regarding').focus();
            }
            else {
                $('#category_concern').css('border','1px solid #cccccc');
                $('#check_concern_regarding').text('');
            }

            if(($("#category_concern option:selected").text() == 'Other') && ($('#other_category').val() == ''))            {
                $('#other_category').css('border','1px solid red');
                $('#check_other_category').text('Please enter category ');
                $('#check_other_category').addClass('error_label');
                valid = false;
                $('#others_category').focus();
            }
            else
            {
                 $('#other_category').css('border','1px solid #cccccc');   
                 $('#check_other_category').text('');
            }

            if(($("#category_concern_sub option:selected").text() == 'Other') && ($('#other_subcategory').val() == ''))            {
                $('#other_subcategory').css('border','1px solid red');
                $('#check_other_subcategory').text('Please enter sub category ');
                $('#check_other_subcategory').addClass('error_label');
                valid = false;
                $('#others_subcategory').focus();
            }
            else
            {
                 $('#other_subcategory').css('border','1px solid #cccccc');   
                 $('#check_other_subcategory').text('');
            }

            if(($('#category_concern').val() != 0) && ($('#category_concern_sub').val() == 0))            {
                $('#category_concern_sub').css('border','1px solid red');
                $('#check_other_concern').text('Please choose an option ');
                $('#check_other_concern').addClass('error_label');
                valid = false;
                $('#category_concern_sub').focus();
            }
            else
            {
                 $('#category_concern_sub').css('border','1px solid #cccccc');   
                 $('#check_other_concern').text('');
            }

            if($('#colleague_complaint').val() == "") {
                $('#colleague_complaint').css('border','1px solid red');
                $('#check_colleague_complaint').text('Please choose an option ');
                $('#check_colleague_complaint').addClass('error_label');
                valid = false;
                $('#colleague_complaint').focus();
            }
            else {
                $('#colleague_complaint').css('border','1px solid #cccccc');
                $('#check_colleague_complaint').text('');
            }

            if(($('#colleague_complaint').val()=='No') && ($('#resolve_complaint').val() == '')) {
                $('#resolve_complaint').css('border','1px solid red');
                $('#check_resolve_complaint').text('Please choose an option ');
                $('#check_resolve_complaint').addClass('error_label');
                valid = false;
                $('#resolve_complaint').focus();

            }
            else {
                $('#resolve_complaint').css('border','1px solid #cccccc');
                $('#check_resolve_complaint').text('');
            }
            if(($('#colleague_complaint').val()=='Yes') && ($('#written_concent').val() == '')) {
                $('#written_concent').css('border','1px solid red');
                $('#check_written_concent').text('Please choose an option ');
                $('#check_written_concent').addClass('error_label');
                valid = false;
                $('#written_concent').focus();

            }
            else {
                $('#written_concent').css('border','1px solid #cccccc');
                $('#check_written_concent').text('');
            }
             var concentChecked = $('#confirm_concent').is(':checked');
            if(($('#written_concent').val()=='No') && (concentChecked == false)) {
                $('#confirm_concent').css('border','1px solid red');
                $('#check_confirm_concent').text('Please accept the Myvoice policy');
                $('#check_confirm_concent').addClass('error_label');
                valid = false;
                $('#written_concent').focus();

            }
            else {
                $('#written_concent').css('border','1px solid #cccccc');
                $('#check_concent_checked').text('');
            }

        }

        if(curSection == 2) {
            if($('#email').val() == "") {
                $('#email').css('border','1px solid red');
                $('#check_email').text('Please enter an email ');
                $('#check_email').addClass('error_label');
                valid = false;
                $('#email').focus();
            }
            else if(!checkEmail($('#email').val())) {
                $('#email').css('border','1px solid red');
                $('#check_email').text('Please enter a valid email address ');
                $('#check_email').addClass('error_label');
                valid = false;
            }
            else {
                $('#email').css('border','1px solid #cccccc');
                $('#check_email').text('');
            }
        }

        if(curSection == 3)
        {
          if($('#concern_details').val()=="")
          {
                $('#concern_details').css('border','1px solid red');
                $('#check_concern_details').text('Please explain concern ');
                $('#check_concern_details').addClass('error_label');
                valid = false;
                $('#concern_details').focus();
          }
          else
        {
                $('#concern_details').css('border','1px solid #cccccc');
                $('#check_concern_details').text('');
        }

        }
        if(currentCount==7){
            var check = ValidCaptcha();
           if(check != false)
           {
            $('#anonymus-formdata').submit();
           }
           else
           {
            return false;
           }  
           // var isChecked = $('#confirm_check').is(':checked');
           //  if(isChecked)
           //  { 
           //      $('#confirm_check').css('border','1px solid #cccccc');
                
           //  }
           //  else
           //  {
           //      $('#confirm_check').css('border','1px solid red');
           //      $('#check_confirm_check').text('Please check the checkbox !');
           //      $('#check_confirm_check').addClass('error_label');
           //      valid = false;
           //  }

        }
           

        if(valid) {
            $("#concern-form .concern-form-section").removeClass("active").addClass("hidden");
            $("#concern-form .concern-form-section[data-section-order='"+ (currentCount) +"']").removeClass("hidden").addClass("active");

            if(currentCount > 1 && currentCount < 6) {
                $("#btn-previous").removeClass("hidden");
                $("#btn-proceed").html('Proceed <i class="fa fa-angle-right fa-lg p-l-20"></i>');
            } else if (currentCount == 6) {
                $("#btn-proceed").html('Submit complaint ');
            }
            if(currentCount == 6) {
                $("#btn-proceed").addClass("show");
               
                $("#btn-download").removeClass("hidden");
                $("#btn-concerns").removeClass("hidden");
            }

            if(currentCount == 7) {
                $("#btn-proceed").addClass("hidden");
                $("#btn-previous").addClass("hidden");
                $("#btn-download").removeClass("hidden");
                $("#btn-concerns").removeClass("hidden");
            }

            $('html, body').animate({
                scrollTop: 0
            }, 0);
        }
function ValidCaptcha(){
        var str1 = removeSpaces(document.getElementById('txtCaptcha').value);
        var str2 = removeSpaces(document.getElementById('CaptchaInput').value);
        var isChecked = $('#confirm_check').is(':checked');
        if(($('#CaptchaInput').val()=='') && (isChecked == false))
        { 
                        $('#captcha').css('border','1px solid red');
                        $('#confirm_check').css('border','1px solid red');
                        $('#check_captcha').text('Please enter the captcha ');
                        $('#check_confirm_check').text('Please accept terms and conditions');
                         return false;
        }
        if(($('#CaptchaInput').val()=='') && (isChecked == true))
        { 
                        $('#captcha').css('border','1px solid red');
                        $('#confirm_check').css('border','1px solid red');
                        $('#check_confirm_check').text('');
                        return false;
        }
        if(($('#CaptchaInput').val()!='') && (isChecked == false))
        {                $('#confirm_check').css('border','1px solid red');
                        $('#check_confirm_check').text('Please accept terms and conditions');
                        $('#check_captcha').text('');
                        return false;
        }
        else{
            if (str1 != str2){
                        $('#check_captcha').text('Invalid Captcha');
                        $('#check_captcha').addClass('error_label');
                      return false;   
            }
            else
            {
                     $('#check_captcha').text('');
                      $('#check_confirm_check').text('');
            }
        }

}

    });
});