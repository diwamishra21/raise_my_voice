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
});