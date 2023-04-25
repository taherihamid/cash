

$(document).ready( function () {
    var table = $('#table_id').DataTable({
        "lengthMenu": [100, 250, 500, "All"],
        dom: 'Bfrtip',
        "oLanguage": {

            "sSearch": "جستجو:"

        },
        buttons: [
            'excel','print'
        ],
        initComplete: function () {
            this.api().columns([5,6,7,8]).every(function () {
                var column = this;


                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );

                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );

                column.data().unique().sort().each(function (d, j) {
                    select.append('<option value="' + d + '">' + d + '</option>')
                });
            });
        }
    });
} );


$('.image_thum').on('click', function () {
    var img = $(this).find('img');
    var src = img.prop('src');
    var wid = img.width();
    var hie = img.height();
    window.open(src, 'no', 'scroll=yes,width=' + wid + ',height=' + hie);
});
$("#article #right #links a:nth-child(3) li").css({"background": "#AB171F", "color": "#FFF"});

$('#formtab #tabs a').click(function (e) {

    e.preventDefault();
    $('#formtab #tabs a').removeClass('active');
    $(this).addClass('active');

    let target = $(this).attr('targets');
    $('#formtab .indents').removeClass('active');
    $(target).addClass('active');
});
