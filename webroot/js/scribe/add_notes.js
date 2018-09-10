$(document).ready(function () {
    $('#add_files').click(function () {
        var btn = $(this);
        var indx = btn.attr('data-input-next');
        console.log(indx);
        var currentInput = $('#chooseFile' + indx);
        indx = parseInt(indx);
        indx++;
        currentInput.trigger('click');
    });

    $(document).on('change', '.hidden_file', function (e) {
        var inpt = $(this);
        var file = inpt.val();
        var indx = $('#add_files').attr('data-input-next');
        if (file != '') {
            indx = parseInt(indx);
            indx++;
            inpt.after(function () {
                return '<input class="hidden hidden_file" id="chooseFile' + indx + '" name="scribe_file' + indx + '" type="file">';
            });
            $('#add_files').attr('data-input-next', indx);

            // show files
            var filename = e.target.files[0].name;
            var html = '';
            html = html + '<li class="list-group-item border-none p-a-20">';
            html = html + '<div class="row">';
            html = html + '<div class="col-md-3 p-t-5">' + filename + '</div>';
            html = html + '<div class="col-md-3"><button class="btn btn-default status-retracted" data-rel="' + (indx - 1) + '">Delete</button></div>';
            html = html + '<div class="col-md-6 p-t-5">&nbsp;</div>';
            html = html + '</div>';
            html = html + '</li>';
            $('.files_info').append(html);
        }
    });
    $(document).on('click', '.status-retracted', function () {
        var seq = $('#add_files').attr('data-input-next');
        var btn = $(this);
        var indx = btn.attr('data-rel');
        $('#chooseFile' + indx).remove();
        btn.parent().parent().parent().remove();
        if (seq == indx) {

        }
    });

    $('#meeting_date').datetimepicker({
        //endDate: "0d",
        format: "DD MM YYYY, h:mm A",
        useCurrent: true
    });
//    /.datetimepicker();
    $('#next_meeting').datetimepicker({
       // startDate: "1d",
        format: "DD MM YYYY, h:mm A",
        useCurrent: true
    });
    var sel = $('#meeting_attendees').select2();
    $('.select2-selection').addClass('form-control');
    sel.on('select2:select', function (e) {
        var opt_html = $('#hidden_opt').html();
        $('#first_sec_atten').html(opt_html);
        update_attendee(sel);
    });
    sel.on('select2:unselect', function (e) {
        var opt_html = $('#hidden_opt').html();
        $('#first_sec_atten').html(opt_html);
        update_attendee(sel);
    });

    $('#add_comment_box').click(function () {
        var opt_html = $('#hidden_opt').html();
        var sec = '\
        <div><div class="col-md-5 sec">\n\
            <div class="form-group">\n\
               <label for="comment_attendee_user">Chose  Attendee</label>\n\
               <select class="form-control comment_attendee_user"  name="comment_attendee_user[]">\n\
                    <option value="0">Select Attendee</option>' + opt_html + '\n\
               </select>\n\
            </div>\n\
        </div>\n\
        <div class="col-md-5 sec">\n\
            <div class="form-group">\n\
                <label for="personal_notes">Comments</label>\n\
                <textarea class="form-control" name="attendee_comment_sec[]" id="personal_notes" rows="3"></textarea>\n\
            </div>\n\
        </div>\n\
        <div class="col-md-1">\n\
            <i class="fa fa-trash-o fa-lg pointer margin-top-60 rmv_cmnt_sec" style="color:#f04e58;"></i>\n\
        </div></div>';
        $('#more_comment_section').append(sec);
        update_attendee(sel);
    });
    $(document).on('click', '.rmv_cmnt_sec', function () {
        $(this).parent().siblings().remove();
        $(this).remove();
    });
    function update_attendee(select2) {
        var sel = select2.val();
        $('.comment_attendee_user option').hide();
        $(sel).each(function (i, u) {
            $('.comment_attendee_user option[value=' + u + ']').show();
        });
    }

});