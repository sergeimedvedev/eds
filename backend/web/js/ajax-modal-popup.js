$(function () {
    $(document).on('click', '.js-show-modal', function () {
        document.getElementById('modalHeader').innerHTML = '';
        $('#modal').find('#modalContent').html('');
        var err = '<button class="btn btn-basic btn-xs pull-right" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></button>';
        var str = $(this).attr('value');
        if ($('#modal').hasClass('in')) {
            $('#modal').find('#modalContent')
                .load($(this).attr('value'));
            document.getElementById('modalHeader').innerHTML = '<h4>' + $(this).attr('title') + '</h4>';
        } else {
            $('#modal').modal('show')
                .find('#modalContent')
                .load($(this).attr('value'));
            document.getElementById('modalHeader').innerHTML = '<h4>' + $(this).attr('title') + '</h4>';
        }

        $('#modal').find('#modalHeader').prepend(err);

    });

    $('.js-close').on('click', function () {
        var tmp = $('.textarea').val();
        $('iframe').contents().find('.wysihtml5-editor').html('');
        $('#text-editor-modal').css('display', 'none');
    })
});