/*
    Variables
 */

// ajax loading
$(document).ajaxSend(function (event, xhr, options) {
    if (options.func == 'mediapicker') {
        $("#mediapicker-loading").show();
    }
}).ajaxComplete(function (event, xhr, options) {
    if (options.func == 'mediapicker') {
        $("#mediapicker-loading").hide();
    }
});

function ajaxError(xmlHttpRequest, textStatus, errorThrown) {
    if (xmlHttpRequest.readyState == 0 || xmlHttpRequest.status == 0)
        return;  // it's not really an error
    else
        alert(errorThrown + "-" + textStatus);
}

/*************** dynamic row *******************************************************************************************/

let dynamicRow;

$(document).ready(function () {
    if ($('#dynamic-row-container .dynamic-row').length) {
        const last = $('#dynamic-row-container .dynamic-row').last();

        dynamicRow = last.clone(false);

        if (last.hasClass('edit')) {
            last.hide();
            last.find('input, textarea').prop('disabled', true);
        }
    }

    $('#dynamic-row-add').click(function () {
        $('#dynamic-row-container').append(dynamicRow.clone(false));

        let last = $('#dynamic-row-container .dynamic-row').last();

        const rowId = Date.now();

        last.find('.dynamic-group').each(function () {
            let group = $(this);
            const uniqueId = Date.now();
            const id = `dynamic-input-${uniqueId}`;

            let label = group.find('.form-label');
            let input = group.find('.form-control');

            label.attr('for', id);
            input.attr('id', id);

            const name = input.data('name');
            input.attr('name', `${name}[${rowId}]`);
        });

        last.find('input, textarea').val('');
    });

    $('body').on('click', '.dynamic-row-delete', function () {
        const btn = $(this);
        const length = $('#dynamic-row-container .dynamic-row').length;

        if (length > 1) {
            btn.closest('.dynamic-row').remove();
        }
    });
});

/******* custom select option ******************************************************************************************/

$(document).ready(function () {
    $(".custom-select-2").select2();
});

/******* left-to-right inputs ******************************************************************************************/

$(document).ready(function () {
    $(".auto-ltr-input").keyup(function () {
        if ($(this).val() != "")
            $(this).addClass('ltr');
        else
            $(this).removeClass('ltr');
    });
});

/*************** change modal id ***************************************************************************************/

var player = null;

$(document).ready(function () {
    $("body").on('click', '.change-modal-id', function () {
        var id = $(this).data('id');
        var target = $(this).data('target');
        var action = $(this).data('action');
        var edit = $(this).data('edit');

        $(target).find(".modal-id").val(id);
        $(target).find(".modal-edit-btn").attr('href', edit);
        $(target).find("form").attr('action', action);
    });

    $("body").on('click', '.media-modal', function () {
        var elem = $(this);
        var target = elem.data('target');
        var src = elem.data('src');
        var type = elem.data('type');

        $(target).find("#media-link code").text(src);
        if (type == 1) {
            $(target).find("#media-src").html("<img src='" + src + "'>");
        }
        else if (type == 2) {
            var poster = elem.data('poster');

            $(target).find("#media-src").html("<video poster='" + poster + "' controls><source src='" + src + "' type='video/mp4'></video>");
            player = plyr.setup('#media-src video');
        }
        else if (type == 3) {
            $(target).find("#media-src").html("<audio controls><source src='" + src + "' type='audio/mp3'></audio>");
            player = plyr.setup('#media-src audio');
        }
    });

    $('#media-modal').on('hide.bs.modal', function (e) {
        if (player)
            player[0].stop();
    });
});
/*************** edit force update *************************************************************************************/
$(document).ready(function () {
    // studentId = ;
    var studentId = $('#studentlist').val();
    var st_ar = JSON.parse(studentId);

    console.log(studentId);
    $('#student-list-btn').on('click',function() {
        $.ajax({
            url: '/dashboard/getUsers',
            type: 'get',
            dataType: 'json',

            success: function (data) {
                var html = '';
                $(data).each(function (key, value) {
                    html += '<tr><td>' + value.id + '</td><td>' + value.name + '</td><td>' + value.identification_number + '</td><td><div class="custom-control custom-switch "> <input  type="checkbox" class="search-add" id="' + value.id + '" name="example" > <label class="custom-control-label" value="false" for="switch1">افزودن</label> </div></td></tr> ';
                })

                $('#student-list').html('');
                $('#student-list').append(html);

                $('#student-modal').modal('show');

                $.each(JSON.parse(studentId), function( index, value ) {
                    document.getElementById(value).checked = true;

                });


                $('.search-add').on('click', function (e) {

                    if ($(this).prop('checked') === true) {

                        if(st_ar.includes(this.getAttribute('id'))){
                            return null;
                        }else
                            st_ar.push(this.getAttribute('id'));
                    }
                    else if (!$(this).prop('checked')) {
                        st_ar.splice( $.inArray(this.getAttribute('id'),st_ar) ,1 );
                    }
                })

            }
        });
    });

    $('#student-modal #savemodal').on('click', function (e) {
        $('#studentlist').val(st_ar);

    });


    $('#student-search').submit(function (e) {
        var keyword = $('#search-keyword').val();
        getUsers(keyword);
        return false;
    });

});

function getUsers(keyword) {
    $.ajax({
        url: '/dashboard/getUsers?keyword=' + keyword,
        type: 'get',
        dataType: 'json',
        success: function (data) {
            var html = '';
            $(data).each(function (key, value) {
                html += '<tr><td>' + value.id + '</td><td>' + value.name + '</td><td>' + value.identification_number + '</td><td><div class="custom-control custom-switch "> <input  type="checkbox" class="harchi custom-control-input" id="' + value.id + '" name="example" > <label class="custom-control-label" value="false" for="switch1">افزودن</label> </div></td></tr> ';
            })

            $('#student-list').html('');
            $('#student-list').append(html);
        }
    });
}

/*************** edit force update *************************************************************************************/

$(document).ready(function () {
    $(".edit-force-update").click(function () {
        var parent = $(this).closest('tr');
        var target = $("#force-update-modal");
        var name = parent.find('.name').text();
        var minimum = parent.find('.minimum').text();
        var latest = parent.find('.latest').text();

        target.find('#force-update-label').text(name);
        target.find('#minimum').val(minimum);
        target.find('#latest').val(latest);
    });
});

/*************** flash messages ****************************************************************************************/

Messenger.options = {
    extraClasses: 'messenger-fixed messenger-on-bottom messenger-on-left',
    theme: 'flat',
}

function showErrorMessage(msg) {
    Messenger().post({
        message: msg,
        type: 'error',
        showCloseButton: true
    });
}

function showSuccess(msg) {
    Messenger().post(msg);
}


/*************** radio button validator ********************************************************************************/

jQuery.validator.setDefaults({
    errorPlacement: function (error, element) {
        if (element.prop('type') === 'radio') {
            console.log('radio validation');
            error.appendTo('#genderErrorContainer');
        }
    }
});

$(document).ready(function () {
    $('radio').on('change', function () {
        console.log($(this).prop('name'));
        console.log('changed');
    });
});

/*************** validation ********************************************************************************************/

$(document).ready(function () {
    $('.select2', ".needs-validation").change(function () {
        $('.needs-validation').validate().element($(this));
    });

    // form condensed validation
    $('.form-condensed').validate({
        errorElement: 'span',
        errorClass: 'error',
        focusInvalid: false,
        ignore: "",

        invalidHandler: function (event, validator) {
            //display error alert on form submit
        },

        errorPlacement: function (label, element) {
            // render error placement for each input type
            $('<span class="error"></span>').insertAfter(element).append(label)
        },

        highlight: function (element) {
            // highlight error inputs
        },

        unhighlight: function (element) {
            // revert the change done by highlight
        },

        success: function (label, element) {
        },

        submitHandler: function (form) {
        }
    });

    // form Wizard Validations
    var $validator = $("#commentForm").validate({
        rules: {
            emailfield: {
                required: true,
                email: true,
                minlength: 3
            },
            txtFullName: {
                required: true,
                minlength: 3
            },
            txtFirstName: {
                required: true,
                minlength: 3
            },
            txtLastName: {
                required: true,
                minlength: 3
            },
            txtCountry: {
                required: true,
                minlength: 3
            },
            txtPostalCode: {
                required: true,
                minlength: 3
            },
            txtPhoneCode: {
                required: true,
                minlength: 3
            },
            txtPhoneNumber: {
                required: true,
                minlength: 3
            },
            urlfield: {
                required: true,
                minlength: 3,
                url: true
            }
        },
        errorPlacement: function (label, element) {
            $('<span class="arrow"></span>').insertBefore(element);
            $('<span class="error"></span>').insertAfter(element).append(label)
        }
    });

    if ($.isFunction($.fn.bootstrapWizard)) {
        $('#rootwizard').bootstrapWizard({
            'tabClass': 'form-wizard',
            'onNext': function (tab, navigation, index) {
                var $valid = $("#commentForm").valid();
                if (!$valid) {
                    $validator.focusInvalid();
                    return false;
                }
                else {
                    $('#rootwizard').find('.form-wizard').children('li').eq(index - 1).addClass('complete');
                    $('#rootwizard').find('.form-wizard').children('li').eq(index - 1).find('.step').html('<i class="fa fa-check"></i>');
                }
            }
        });
    }

});


/*************** colorpicker *******************************************************************************************/

$(document).ready(function () {
    color_picker(".hex-input");

    $(".gradient-input").each(function () {
        var id = $(this).attr('id');
        color_picker("#" + id);
    });

    $(".gradient-input").keyup(function () {
        var id = $(this).attr('id');
        var color = $(this).val();
        $("#" + id).ColorPickerSetColor(color);
    });
});

function color_picker(elem) {
    if ($.isFunction($.fn.ColorPicker)) {
        var color = $(elem).val();
        $(elem).ColorPicker({
            color: color,
            onChange: function (hsb, hex, rgb) {
                $(elem).val('#' + hex);
            }
        });
    }
}

/*************** admins ************************************************************************************************/

$(document).ready(function () {
    $("#generate-password").change(function () {
        var checked = $(this).prop('checked');
        if (checked) {
            $("#admin-password").prop('disabled', true).removeClass('error').attr('aria-invalid', 'false');
            $("#admin-password + .error").remove();
        }
        else
            $("#admin-password").prop('disabled', false);
    });
});

/*************** role management ***************************************************************************************/
var showUpdateRoleWarning = true;

$(document).ready(function () {
    $('.publish-role').change(function () {
        var row = $(this).closest('.role-row');

        if ($(this).is(':checked')) {
            row.find('.update-checkbox').prop('checked', true);
        }
    });

    $('.update-checkbox').change(function () {
        var row = $(this).closest('.role-row');

        if (!$(this).is(':checked') && row.find('.publish-role').is(':checked')) {
            $(this).prop('checked', true);

            if (showUpdateRoleWarning)
                alert('در صورتی که دسترسی انتشار فعال باشد، دسترسی بروز رسانی هم باید فعال باشد');
        }
    });

    $('#all-reads').change(function () {
        updateRoleCheckboxes('.read-checkbox', $(this));
    });

    $('#all-writes').change(function () {
        updateRoleCheckboxes('.write-checkbox', $(this));
    });

    $('#all-updates').change(function () {
        updateRoleCheckboxes('.update-checkbox', $(this));
    });

    $('#all-deletes').change(function () {
        updateRoleCheckboxes('.delete-checkbox', $(this));
    });

    $('#all-publishes').change(function () {
        updateRoleCheckboxes('.publish-checkbox', $(this));
    });
});

function updateRoleCheckboxes(elem, checkbox) {
    var checked = checkbox.prop('checked');

    showUpdateRoleWarning = false;
    $(elem).not(':disabled').prop('checked', checked).trigger('change');
    showUpdateRoleWarning = true;
}


/*********** alert before close window *********************************************************************************/

var inputChanged = false;
$(document).ready(function () {
    $("body").on('change keyup', 'input[type=text], input[type=checkbox], input[type=radio], input[type=email], input[type=file], textarea', function () {
        inputChanged = true;
        changeCloseFlag();
    });

    $("form").on('submit', function () {
        window.onbeforeunload = null;
    });


    handleBackFunctionality();
});

// show an alert when closing
function changeCloseFlag() {
    if (inputChanged) {
        window.onbeforeunload = function (e) {
            var message = "اطلاعات شما هنوز ذخیره نشده است، مطمئنید که میخواهید خارج شوید؟";
            return message;
        }
    }
}

// check refresh and back button
function handleBackFunctionality() {
    try {
        if (window.event) {
            if (window.event.clientX < 40 && window.event.clientY < 0)
                changeCloseFlag();
            else
                changeCloseFlag();
        }
        else if (event) {
            if (event.currentTarget.performance.navigation.type == 1)
                changeCloseFlag();
            if (event.currentTarget.performance.navigation.type == 2)
                changeCloseFlag();
        }
    }
    catch (err) {
        console.warn('detect back button is not supported in this browser');
    }
}

function showPickerSectionsByType(type) {
    var mediapicker = $("#mediapicker");
    var active = null;
    mediapicker.find('.mediapicker-list').removeClass('active').hide();


    if (type == image_type)
        active = mediapicker.find('.mediapicker-list a[href="#tabPickerImage"]');
    else if (type == video_type)
        active = mediapicker.find('.mediapicker-list a[href="#tabPickerVideo"]');
    else if (type == audio_type)
        active = mediapicker.find('.mediapicker-list a[href="#tabPickerAudio"]');

    active.trigger('click').show();
    active.closest('.mediapicker-list').show();
}

function deSelectPickerItems() {
    $('.mediapicker-item').removeClass('active');
}

function fetchPickerContent(active, force) {
    var link = active.data('url');
    var hasContent = active.data('content');

    if (force || !hasContent)
        mediaPickerAjax(link, active);
}

function mediaPickerPagination(url, tab) {
    var id = tab.attr('id');
    var active = $("#mediapicker li.mediapicker-list.active a[href=#" + id + "]");

    if (url && active) {
        deSelectPickerItems();
        mediaPickerAjax(url, active);
    }
}

function mediaPickerAjax(url, active) {
    var target = active.attr('href');

    $.ajax({
        url: url,
        type: "GET",
        func: 'mediapicker',
        dataType: 'html',
        success: function (result) {
            $(target).find('.mediapicker-content').html(result);
            active.data('content', true);
        },
        error: function (xmlHttpRequest, textStatus, errorThrown) {
            ajaxError(xmlHttpRequest, textStatus, errorThrown);
        }
    });
}

/*************** Sort **************************************************************************************************/

$(document).ready(function () {
    if ($('#sortable-container').length) {
        const sortableContainer = document.getElementById('sortable-container');

        var sortable = new Sortable(sortableContainer, {
            animation: 200,
            handle: ".sortable-rows",

            onEnd: function (evt) {
                const length = $("#sortable-container .sortable-rows").length - 1;
                const url = $("#sortable-container").data('target');

                if (evt.oldIndex != evt.newIndex) {
                    var row, swap, type;

                    if (evt.newIndex != length) {
                        row = $("#sortable-container .sortable-rows").eq(evt.newIndex).data('id');
                        swap = $("#sortable-container .sortable-rows").eq(evt.newIndex + 1).data('id');
                        type = 'moveBefore';
                    }
                    else {
                        row = $("#sortable-container .sortable-rows").eq(evt.newIndex).data('id');
                        swap = $("#sortable-container .sortable-rows").eq(evt.newIndex - 1).data('id');
                        type = 'moveAfter';
                    }

                    $.ajax({
                        url: url,
                        type: "POST",
                        data: ({model: row, swap: swap, type: type}),
                        dataType: 'json',
                        success: function (result) {
                            if (result.status)
                                alert(result.message);
                            else
                                alert(result.message);
                        },
                        error: function (xmlHttpRequest, textStatus, errorThrown) {
                            if (xmlHttpRequest.readyState == 0 || xmlHttpRequest.status == 0)
                                return;  // it's not really an error
                            else {
                                alert(errorThrown + "-" + textStatus);
                            }
                        }
                    });
                }
            }
        });
    }
});

/*************** products **********************************************************************************************/

$(document).ready(function () {
    $('#is-digital').change(function () {
        var elem = $(this);
        var target = $("#digital-file input");

        if (elem.prop('checked')) {
            target.prop('disabled', false);
        }
        else {
            target.prop('disabled', true);
        }
    });
});

/*************** date picker *******************************************************************************************/

$(document).ready(function () {
    if ($.isFunction($.fn.persianDatepicker)) {
        $('.persian-date-picker').persianDatepicker({
            format: "YYYY-MM-DD",
            navigator: {
                enabled: true,
                text: {
                    btnNextText: '',
                    btnPrevText: ''
                }
            },
        });
    }
});

/*************** posts *************************************************************************************************/


$(document).ready(function () {
    $('.post-type-toggle').change(function () {
        var type = $(this).attr('id');
        var show = $(this).prop('checked');

        toggle(type, show);
    });

    function toggle(type, show) {
        var video = $('#post-video-picker');
        var image = $('#post-image-picker');

        if (type === 'post-type-image') {
            if (show) {
                image.show();
                video.hide();
            }
            else {
                image.hide();
                video.show();
            }
        }
        else {
            if (show) {
                image.hide();
                video.show();
            }
            else {
                image.show();
                video.hide();
            }
        }
    }
});


/*************** selectable select *************************************************************************************/

$(document).ready(function () {
    $('.selectable-select select').change(function () {
        var elem = $(this);
        var val = elem.val();
        var target = elem.closest('.selectable-select').attr('data-target');

        window.location.replace(target + val);
    });
});

/****** Notification ***************************************************************************************************/

$(document).ready(function () {
    $('#send-notification-btn').click(function (event) {
        if ($('#notification-form').valid()) {
            let type = $('input[name=cast_type]:checked').val();

            if (type === UNICAST_NOTIFICATION_TYPE || type === MULTICAST_NOTIFICATION_TYPE) {
                $('#notification-modal-selective').modal('show');
                $('#notification-modal-all').modal('hide');
            }
            else if (type === ALL_NOTIFICATION_TYPE) {
                $('#notification-modal-selective').modal('hide');
                $('#notification-modal-all').modal('show');
            }
        } else {

        }
    });

    if ($('#notification-modal-selective').length || $('#notification-modal-all').length) {
        $('#notification-modal-selective, #notification-modal-all').find('form').submit(function (event) {
            $('#notification-form').submit();
            event.preventDefault();
        })
    }

    $('input[type=radio][name=cast_type]').change(function () {
        if ($(this).val() === UNICAST_NOTIFICATION_TYPE) {
            $('#unicast-mobile').removeClass('hide');
            $('#multicast-file').addClass('hide');
            $('#android-device').attr('disabled', true);
            $('#ios-device').attr('disabled', true);
        }
        else if ($(this).val() === MULTICAST_NOTIFICATION_TYPE) {
            $('#unicast-mobile').addClass('hide');
            $('#multicast-file').removeClass('hide');
            $('#android-device').attr('disabled', false);
            $('#ios-device').attr('disabled', false);
        }
        else if ($(this).val() === ALL_NOTIFICATION_TYPE) {
            $('#android-device').attr('disabled', false);
            $('#ios-device').attr('disabled', false);
            $('#unicast-mobile').addClass('hide');
            $('#multicast-file').addClass('hide');
        }
    });
});



/****** Date picker ***************************************************************************************************/
$(document).ready(function () {
    $('.persian-date-picker').persianDatepicker({
        format: "YYYY-MM-DD",
        navigator: {
            enabled: true,
            text: {
                btnNextText: '',
                btnPrevText: ''
            }
        }

    });
});

/****** Select2 ***************************************************************************************************/
$(document).ready(function () {
    $(".select2").select2().addClass('select2-class');
});

/****** add file *************************************************************************************************/

var add_file_counter = 1;
var limit = 10;

$("#add_file").click(function() {
    if(add_file_counter < limit ){
        $("<div />", { "class":"input-group control-group increment line w100", id:"well-"+add_file_counter })
            .append($("<input />", { class:'col-lg-6 col-xs-4 text-upload', type:'text', id:'file', placeholder:"عنوان فایل را مشخص نمایید", name:"title_file["+add_file_counter+"]" }))
            .append($("<input />", {class:'btn', type: "file", id:"upload"+add_file_counter, name:"fileToUpload"+add_file_counter }))
            .append($("<label>", { class:'t-10 text-center col-lg-6', for:"upload"+add_file_counter, id: 'label-id'+add_file_counter, onclick: "rename('"+add_file_counter+"')" }).html("انتخاب فایل"))
            .append($("<label>", { class:'label-text text-center upload-name'+add_file_counter }))
            .append($("<i>", { class:'pull-right m-t--15 col-lg-1 glyphicon glyphicon-remove remove-color remove'+add_file_counter}))
            .appendTo("#container-upload-div");

        for (number = 1;number<=limit;number++){
            eval("$('#upload" + number + "').change(function() { $('.upload-name" + number + "').html(this.files[0].name); });" +
                "$('.remove" + number + "').click( function() { $('#well-" + number + "').fadeOut();});");
        }

        add_file_counter++;
    }
});

/****** Search *********************************************************************************************************/
// $('input #search').on
