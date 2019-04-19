var test = '';

function getDocumentFormsByType($obj) {
    $.get("/su/document-form/get-form-by-type/?type=" + $obj.val(), function (data) {
        var submitGroup = $('.js-add-new-doc-submit');
        var count = submitGroup.parent().siblings().length;
        if (count > 2) {
            $obj.parent().siblings().each(function (index) {
                if (index > 0 && $(this).attr('class') !== 'form-group') {
                    $(this).remove();
                }
            })
        }
        submitGroup.parent().before(data);
    });
}

function getDocumentParamsByForm($obj) {
    $.get("/su/document-param/get-params-by-form/?form=" + $obj.val(), function (data) {
        var submitGroup = $('.js-add-new-doc-submit');
        var count = submitGroup.parent().siblings().length;
        if (count > 3) {
            $obj.parent().siblings().each(function (index) {
                if (index > 6 && $(this).attr('class') !== 'form-group') {
                    $(this).remove();
                }
            })
        }
        submitGroup.parent().before(data);
    });
}

$(function () {
    $('.js-delete-block').on('click', function () {
        var bid = $(this).data('block-id');
        var div = $('[data-bid="' + bid + '"]');
        var bg = div.css('background');
        div.css('background', 'red');
        setTimeout(function () {
            if (confirm('Do you realy want to delete this?')) {
                $.ajax({
                    url: '../del',
                    method: 'POST',
                    dataType: 'JSON',
                    data: {
                        'id': bid
                    }
                }).done(function (data) {
                    console.log(data);
                    location.reload();
                });
            } else {
                div.css('background', bg);
            }
        }, 100);
    });

    $('.js-add-block').on('click', function () {
        console.log('hello');
    });
});