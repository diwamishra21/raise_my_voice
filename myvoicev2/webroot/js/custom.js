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

        if(currentCount < 6) {
            $("#btn-proceed").removeClass("hidden");
            $("#btn-download").addClass("hidden");
        }

        if(currentCount == 1) {
            $("#btn-previous").addClass("hidden");
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
    $("#concern_regarding").change(function(){
    if($('#concern_regarding').val() =='Others')
    {
      $('#other').show();
    }
    else
    {
     $('#other').hide();
    }
        
    });

    $("#btn-proceed").on("click", function () {
        var currentCount = parseInt($("#concern-form .concern-form-section.active").attr("data-section-order")) + 1;
        var curSection = parseInt(currentCount - 1);

        var valid = true;
        if(curSection == 1) {
            if($('#concern_regarding').val() == "") {
                $('#concern_regarding').css('border','1px solid red');
                $('#check_concern_regarding').text('Please select an option !');
                $('#check_concern_regarding').addClass('error_label');
                valid = false;
                $('#concern_regarding').focus();
            }
            else {
                $('#concern_regarding').css('border','1px solid #cccccc');
                $('#check_concern_regarding').text('');
            }

            if(($('#concern_regarding').val() =='Others') && ($('#other_concern').val()==''))
            {
                $('#other_concern').css('border','1px solid red');
                $('#check_other_concern').text('Please enter this field !');
                $('#check_other_concern').addClass('error_label');
                valid = false;
                $('#other_concern').focus();
            }
            else
            {
                 $('#other_concern').css('border','1px solid #cccccc');   
                 $('#check_other_concern').text('');
            }

            if($('#colleague_complaint').val() == "") {
                $('#colleague_complaint').css('border','1px solid red');
                $('#check_colleague_complaint').text('Please select an option !');
                $('#check_colleague_complaint').addClass('error_label');
                valid = false;
                $('#colleague_complaint').focus();
            }
            else {
                $('#colleague_complaint').css('border','1px solid #cccccc');
                $('#check_colleague_complaint').text('');
            }

            if($('#resolve_complaint').val() == "") {
                $('#resolve_complaint').css('border','1px solid red');
                $('#check_resolve_complaint').text('Please select an option !');
                $('#check_resolve_complaint').addClass('error_label');
                valid = false;
                $('#resolve_complaint').focus();
            }
            else {
                $('#resolve_complaint').css('border','1px solid #cccccc');
                $('#check_resolve_complaint').text('');
            }

        }

        if(curSection == 2) {
            if($('#email').val() == "") {
                $('#email').css('border','1px solid red');
                $('#check_email').text('Please enter an email !');
                $('#check_email').addClass('error_label');
                valid = false;
                $('#email').focus();
            }
            else if(!checkEmail($('#email').val())) {
                $('#email').css('border','1px solid red');
                $('#check_email').text('Please enter a valid email address !');
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
                $('#check_concern_details').text('Please Explain Concern !');
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
        
        if(curSection == 5) {
            if($('#captcha').val() == "") {
                $('#captcha').css('border','1px solid red');
                $('#check_captcha').text('Please enter the captcha !');
                $('#check_captcha').addClass('error_label');
                valid = false;
            }
            else {
                $('#captcha').css('border','1px solid #cccccc');
                $('#check_captcha').text('');
            }
            var isChecked = $('#confirm_check').is(':checked');
            if(isChecked)
            {
                $('#confirm_check').css('border','1px solid #cccccc');
                $('#check_confirm_check').text('');
            }
            else
            {
                $('#confirm_check').css('border','1px solid red');
                $('#check_confirm_check').text('Please check the checkbox !');
                $('#check_confirm_check').addClass('error_label');
                valid = false;
            }
        }

        if(valid) {
            $("#concern-form .concern-form-section").removeClass("active").addClass("hidden");
            $("#concern-form .concern-form-section[data-section-order='"+ (currentCount) +"']").removeClass("hidden").addClass("active");

            if(currentCount > 1 && currentCount < 5) {
                $("#btn-previous").removeClass("hidden");
                $("#btn-proceed").html('Proceed <i class="fa fa-angle-right fa-lg p-l-20"></i>');
            } else if (currentCount == 5) {
                $("#btn-proceed").html('Submit <i class="fa fa-angle-right fa-lg p-l-20"></i>');
            }

            if(currentCount == 6) {
                $("#btn-proceed").addClass("hidden");
                $("#btn-previous").addClass("hidden");
                $("#btn-download").removeClass("hidden");
                $("#btn-concerns").removeClass("hidden");
            }

            $('html, body').animate({
                scrollTop: 0
            }, 0);
        }

        
    });
});