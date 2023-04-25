
/****** file upload ***************************************************************************************************/
$(document).ready(function () {
    $(".add-file-upload").click(function () {
        var html = $(".clone").html();
        $(".increment").after(html);

    });

    $("body").on("click", ".remove-file-upload", function () {
        $(this).parents(".control-group").remove();
    });


    var input = document.getElementById('file-upload');
    var infoArea = document.getElementById('file-upload-filename');

    input.addEventListener('change', showFileName);

    function showFileName(event) {
        // the change event gives us the input it occurred in
        var input = event.srcElement;

        // the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
        var fileName = input.files[0].name;

        // use fileName however fits your app best, i.e. add it into a div
        infoArea.textContent = fileName;

    }
});
/****** rename ***************************************************************************************************/
function rename(id){
    var label_id = $('#label-id'+id);


    $("#upload"+id).change(function(){
        label_id.css({'height':'25px', 'z-index':'99'});
        label_id.html('');
    });
}

/****** tooltip ***************************************************************************************************/
$(document).ready(function () {
    $('tooltip').tooltip({trigger: 'click'});
});
/****** Editable inputs ***************************************************************************************************/

var defaultText = '-';

function endEdit(e) {
    var input = $(e.target), label = input && input.prev();

    label.text(input.val() === '' ? defaultText : input.val());
    input.hide();
    label.show();
}

$('.clickedit').hide()
    .focusout(endEdit)
    .keyup(function (e) {
        if ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)) {
            endEdit(e);
            return false;
        } else {
            return true;
        }
    })

    .prev().click(function () {
    $(this).hide();
    $(this).next().show().focus();

    $('.submit').show();

});
/****** set placeholder for a select2 input ***************************************************************************************************/

$(document).ready(function () {
    $("#select2-one").select2({
        placeholder: "Select a State",
        allowClear: true
    });
});

/****** sidebar toggle ***************************************************************************************************/
$(function () {
    $('.toggle').on('click', function () {
        $('.myside').slideToggle();
    })
});
