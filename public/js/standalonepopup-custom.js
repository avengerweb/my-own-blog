var modal = $(".mediaUpload-modal-lg");

$(document).on('click','.action-open-media-library',function (event) {
    event.preventDefault();
    var updateID = $(this).attr('data-inputid'); // Btn id clicked
    var elfinderUrl = '/admin/images/';
    modal.modal();
    // trigger the reveal modal with elfinder inside
    var triggerUrl = elfinderUrl + updateID;
    modal.find("iframe").attr("src", triggerUrl);

});
// function to update the file selected by elfinder
function processSelectedFile(filePath, requestingField) {
    $('#' + requestingField).val("/" + filePath);
}
