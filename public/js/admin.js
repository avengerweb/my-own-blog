/**
 * Created by avengerweb on 23.06.15.
 */

$.put = function(url, data, success, dataType) {
    if ( $.isFunction(data) ){
        dataType = dataType || success;
            success = data;
            data = {};
    }

    $.ajax({
        url: url,
        type: "PUT",
        data: data,
        success: success,
        dataType: dataType
    });
};

$.delete = function(url, data, success, dataType) {
    if ( $.isFunction(data) ){
        dataType = dataType || success;
            success = data;
            data = {};
    }

    $.ajax({
        url: url,
        type: "DELETE",
        data: data,
        success: success,
        dataType: dataType
    });
};

function elFinderBrowser (field_name, url, type, win) {
    tinymce.activeEditor.windowManager.open({
        file: '/elfinder/tinymce4',// use an absolute path!
        title: 'elFinder 2.0',
        width: 900,
        height: 450,
        resizable: 'yes'
    }, {
        setUrl: function (url) {
            win.document.getElementById(field_name).value = url;
        }
    });
    return false;
}

$(document).ready(function() {
    var csrftoken = $('meta[name=_token]').attr('content');
    $.ajaxSetup({
        beforeSend: function (xhr, settings) {
            if (!/^(GET|HEAD|OPTIONS|TRACE)$/i.test(settings.type)) {
                xhr.setRequestHeader("X-XSRF-TOKEN", csrftoken)
            }
        }
    });

    $('.datepicker').datepicker({
        format: "yyyy-mm-dd 00:00:00"
    });

    tinymce.init({
        selector: "textarea.html",
        theme: "modern",
        file_browser_callback : elFinderBrowser,
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern imagetools"
        ],
        toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
        toolbar2: "print preview media | forecolor backcolor emoticons",
        image_advtab: true,
        templates: [
            {title: 'Test template 1', content: 'Test 1'},
            {title: 'Test template 2', content: 'Test 2'}
        ]
    });

    $(".js-uploader").on('click', function (e)
    {
        e.preventDefault();
        uploadInput = $($(this).data('input'));
        uploadModal.modal('show');
    });

    /**
     * Hack for elfinder
     */
    var uploadInput = null;
    var uploadModal = $('#uploadModal');
    uploadModal.on('shown.bs.modal', function (e)
    {
        var t = $(this);
        var iframe = t.find('iframe');
        if (!iframe.length)
        {
            t.find('.modal-body').append('<iframe src="/admin/upload/no1"></iframe>');
            parent.jQuery.colorbox =
            {
                close: function ()
                {
                    t.modal('hide');
                    uploadInput = null;
                }
            };

            window.parent.processSelectedFile = function(path)
            {
                if (uploadInput)
                    uploadInput.val('/' + path.replace('\\', '/'));
            }
        }
    })
});