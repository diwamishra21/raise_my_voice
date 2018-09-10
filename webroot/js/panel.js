$(document).ready(function () {
    $('#role').change(function () {
        var sel = $(this).val();
        var cid=$('#complaint_id').val();
        if(sel=='6'){
            $('#scribe').val('1');
        }else{
            $('#scribe').val('0');
        }
        if (sel != '0') {
            $.ajax({
                url: webroot + 'my-voice-control/getpanelinfo',
                data: {sel: sel,cid:cid},
                method: 'POST'
            }).done(function (data) {
                var user = $.parseJSON(data);
                $('#role_user').html(user.html);
                $('#email').val('');
                $('#empid').val('');
            });
        }
    });
    $('#role_user').change(function () {
        var selOpt = $('#role_user option:selected');
        var sel = selOpt.val();
        if (sel != '0') {
            $('#email').val(selOpt.attr('data-email'));
            $('#empid').val(selOpt.attr('data-eid'));
        } else {
            $('#email').val('');
            $('#empid').val('');
        }
    });

    $('#add-p-form').submit(function () {
        if ($('#role_user').val() == '0') {
            return false;
        }
    });

    $('#case_disposition').change(function () {
        var sel = $(this).val();
        var cid=$(this).attr('data-comp');
        
        if (sel != '0') {
            $.ajax({
                url: webroot + 'my-voice-control/change-dispostion',
                data: {sel:sel,cid:cid},
                method: 'POST'
            }).done(function (msg) {
                alert(msg);
            });
        }
    });
    
    $('#submit_complain').submit(function(){
        var role=$('#role').val();
        var u=$('#role_user').val();
        if((role==0)||(u==0)){
            alert('Pleasee select user.');
            return false;
        }
        
    });

});
