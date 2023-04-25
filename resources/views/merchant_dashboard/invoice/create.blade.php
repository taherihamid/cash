@extends('layouts.agent.layout')
@section('title', trans('ui.text.dashboard'))
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/jquery.Bootstrap-PersianDateTimePicker.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('product_assets/style.css') }}" media="screen"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('product_assets/css/custom.css') }}" media="screen"/>
    <link rel="stylesheet" href="{{ URL::asset('product_assets/css/colors.css') }}">
    <style>
        .popover-title {
            font-family: kara;
        }

        .table.table-striped {
            font-family: kara;
        }


        th {
            text-align: center;
        }


        .appointment-form {
            box-shadow: none;
        }

        .card {
            width: 20rem;
            border-top-right-radius: 10px 10px;
            border-top-left-radius: 50px 50px;
            border-bottom-left-radius: 5px 5px;
            border-bottom-right-radius: 50px 50px;
            box-shadow: 2px 2px 15px 2px #ccc;
        }

        .img {
            border-top-right-radius: 5px 5px;
            border-top-left-radius: 50px 50px;
        }

        .button {
            transition: 0.8s ease;
            background-color: #0082FE;
            color: #fff;
            font-size: 14px;
            border-radius: 2rem;
        }

        .button:hover {
            transition: 0.8s ease;
            border-color: #0082FE;
            background-color: #fff;
            color: #0082FE;
            font-size: 14px;
        }

        #new-search-area {
            width: 100%;
            clear: both;

            display: flex;
        }

        #new-search-area input {
            width: 600px;
            font-size: 20px;
            padding: 5px;
        }

        div.dt-buttons {
            float: right !important;
        }

        .filelabel {
            width: 120px;
            border: 2px dashed grey;
            border-radius: 5px;
            display: block;
            padding: 5px;
            transition: border 300ms ease;
            cursor: pointer;
            text-align: center;
            margin: 0;
        }

        .filelabel i {
            display: block;
            font-size: 30px;
            padding-bottom: 5px;
        }

        .filelabel i,
        .filelabel .title {
            color: grey;
            transition: 200ms color;
        }

        .filelabel:hover {
            border: 2px solid #1665c4;
        }

        .filelabel:hover i,
        .filelabel:hover .title {
            color: #1665c4;
        }

        #FileInput {
            display: none;
        }
    </style>
@stop
@section('content')
    <section>

        <div id="contact-modal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="appointment-form">
                        <div class="form">
                            <fieldset>
                                <div class="modal-header">
                                    <a class="close" data-dismiss="modal">×</a>
                                    <h3>افزودن پاکت</h3>
                                </div>
                                <form id="contactForm" name="contact" role="form"
                                      {{--                                      action="{{route('users.bider_document_temp')}}"--}}
                                      method="POST">
                                    @csrf

                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="filelabel">
                                                <i class="fa fa-paperclip">
                                                </i>
                                                <span class="title">
                                                      افزودن فایل</span>
                                                <input class="FileUpload1" id="FileInput" name="bider_temp_attachment"
                                                       type="file"/>
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">شرح فایل</label>
                                            <textarea name="description" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="bider_document_type">نوع پاکت</label>
                                            <select class="custom-select" name="bider_document_type"
                                                    id="bider_document_type">
                                                <option selected>انتخاب نمایید ...</option>
                                                <option value="1">الف</option>
                                                <option value="2">ب</option>
                                                <option value="3">ج</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">انصراف
                                        </button>
                                        <input type="submit" class="btn btn-success" id="submit" value="ثبت پاکت">
                                    </div>
                                </form>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="service" class="services wow fadeIn">
            <div class="container">
                <div class="row custom-row">
                    <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                        <div class="appointment-form">
                            <div class="form">
                                <fieldset>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <h3 style="margin-bottom: 25px;">ارسال پاکت های پیشنهاد مناقصه</h3>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div style="direction: ltr">
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                            data-target="#contact-modal">افزودن پاکت جدید
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">

                                            <table class="table"
                                                   style="text-align: center;margin-top:25px">
                                                <thead
                                                    style="color: #343a40;background: linear-gradient(to right, #39b49a 0%, #1d86df 100%)">
                                                <th style="text-align: center">ردیف</th>
                                                <th style="text-align: center">عنوان فایل</th>
                                                <th style="text-align: center">فرمت</th>
                                                <th style="text-align: center">حجم</th>
                                                <th style="text-align: center">شرح فایل</th>
                                                <th style="text-align: center">تاریخ ایجاد</th>
                                                <th style="text-align: center">عملیات</th>


                                                </thead>
                                                <tbody>
                                                <tr>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div style="margin-right: 20px">
                                            <p> توضیحات مربوط به فرمت ها و حجم فایل ها قابل پیوست در اینجا یادداشت می
                                                گردد</p>
                                        </div>
                                        <div style="text-align: center">
                                            <button type="button" class="btn btn-primary">بازگشت</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




@endsection

@section('js')
    <script>
        $(document).ready(function () {

            var table = $('#datatable-user-agent').DataTable({
                // "orderCellsTop": true,
                dom: 'Bfrtip',
                columnDefs: [
                    {
                        targets: 1,
                        className: 'noVis'
                    }
                ],
                buttons: [
                    {
                        extend: 'colvis',
                        columns: ':not(.noVis)'
                    }
                ],
                "responsive": true,
                initComplete: function () {
                    $("#datatable-user-profile_filter").detach().appendTo('#new-search-area');
                },
                "oLanguage": {
                    "sSearch": "جستجو",
                    sLengthMenu: "تعداد آیتم در صفحه _MENU_",
                    oPaginate: {
                        "sFirst": "First page", // This is the link to the first page
                        "sPrevious": "قبلی", // This is the link to the previous page
                        "sNext": "بعدی", // This is the link to the next page
                        "sLast": "Last page" // This is the link to the last page
                    }
                }
            });

            function runColvis() {
                table.column().visible();
            }

        });
        $("#FileInput").on('change', function (e) {
            var labelVal = $(".title").text();
            var oldfileName = $(this).val();
            fileName = e.target.value.split('\\').pop();

            if (oldfileName == fileName) {
                return false;
            }
            var extension = fileName.split('.').pop();

            if ($.inArray(extension, ['jpg', 'jpeg', 'png']) >= 0) {
                $(".filelabel i").removeClass().addClass('fa fa-file-image-o');
                $(".filelabel i, .filelabel .title").css({'color': '#208440'});
                $(".filelabel").css({'border': ' 2px solid #208440'});
            } else if (extension == 'pdf') {
                $(".filelabel i").removeClass().addClass('fa fa-file-pdf-o');
                $(".filelabel i, .filelabel .title").css({'color': 'red'});
                $(".filelabel").css({'border': ' 2px solid red'});

            } else if (extension == 'doc' || extension == 'docx') {
                $(".filelabel i").removeClass().addClass('fa fa-file-word-o');
                $(".filelabel i, .filelabel .title").css({'color': '#2388df'});
                $(".filelabel").css({'border': ' 2px solid #2388df'});
            } else {
                $(".filelabel i").removeClass().addClass('fa fa-file-o');
                $(".filelabel i, .filelabel .title").css({'color': 'black'});
                $(".filelabel").css({'border': ' 2px solid black'});
            }

            if (fileName) {
                if (fileName.length > 10) {
                    $(".filelabel .title").text(fileName.slice(0, 4) + '...' + extension);
                } else {
                    $(".filelabel .title").text(fileName);
                }
            } else {
                $(".filelabel .title").text(labelVal);
            }
        });
    </script>
@endsection


