

<div id="demoModal" class="modal fade" role="dialog">
    <div id="content" class="centerPos clearfix">
        <div id="headModal" class="clearfix">
            <i class="ti-close" data-dismiss="modal" ></i>
            <span>درخواست جلسه نمایش نرم افزارها</span>
        </div>
        <div class="cl"></div>
        <div id="body" class="clearfix">
            <p>لطفا برای در خواست جلسه نمایش نرم افزارهای طرح اندیشان پویا اطلاعات فرم زیر را تكمیل كنید تا در اسرع وقت جهت هماهنگی های بعدی با شما تماس گرفته شود.</p>
            <ul class="clearfix">
                <form action="" method="post">
                    <li>
                        <div class="col-sm-6 pull-right no-padding-right">
                            <span>نام</span> <span class="red">*</span>
                            <div class="form-input form-rtl">
                                <i class="material-icons">personal</i>
                                <input type="text" name="name" class="text-style" id="" require />
                            </div>
                        </div>
                        <div class="col-sm-6 pull-left no-padding-left">
                            <span>نام خانوادگی</span> <span class="red">*</span>
                            <div class="form-input form-rtl">
                                <i class="material-icons">personal</i>
                                <input type="text" name="lastname" class="text-style" id="" require />
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="col-sm-6 pull-right no-padding-right">
                            <span>نام شرکت</span> <span class="red">*</span>
                            <div class="form-input form-rtl">
                                <i class="material-icons">next_week</i>
                                <input type="text" name="name_company" class="text-style" id="" require />
                            </div>
                        </div>
                        <div class="col-sm-6 pull-left no-padding-left">
                            <span>پست الکترونیکی</span> <span class="red">*</span>
                            <div class="form-input form-rtl">
                                <i class="material-icons">email</i>
                                <input type="text" name="mail" class="text-style" id="" require />
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="col-sm-6 pull-right no-padding-right">
                            <span>تلفن ثابت</span> <span class="red">*</span>
                            <div class="form-input form-rtl">
                                <i class="material-icons">phone</i>
                                <input type="text" name="phone" class="text-style" id="" require />
                            </div>
                        </div>
                        <div class="col-sm-6 pull-left no-padding-left">
                            <span>تلفن همراه</span> <span class="red">*</span>
                            <div class="form-input form-rtl">
                                <i class="material-icons">phone</i>
                                <input type="text" name="mobile" class="text-style" id="" require />
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="col-sm-6 pull-right no-padding-right">
                            <span>شهر</span> <span class="red">*</span>
                            <div class="form-input form-rtl">
                                <i class="material-icons">place</i>
                                <input type="text" name="city" class="text-style" id="" require />
                            </div>
                        </div>
                    </li>
                    <li>
                        <input id="check" type="checkbox" /><span class="para">تماس كارشناسان فروش شركت طرح اندیشان پویا بابت هماهنگی جلسه دمو بلامانع می باشد.</span> <span class="red">*</span>
                    </li>
                    <li id="cpatcha">
                        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                        <div class="g-recaptcha" data-sitekey="6LeCrc8UAAAAABe4EdbcqCDyEZt4RBfEnOS51O07"></div>
                    </li>
                </form>
                <div class="cl"></div>
                <button id="btn-demo-send" type="button">ارسال</button>
            </ul>
        </div>
    </div>
</div>

<script>
    $(window).ready(function(){
        $('#btn-demo-send').click(function () {
            const count = $('[require]').length;
            $('[require]').each(function (index, element) {
                if(!$(this).val()){
                    $(this).closest('.form-input').find('.alertSpan').remove();
                    $(this).closest('.form-input').append(`
                    <div class="alertSpan"><i class="arrow"></i> <span>فیلد الزامی</span></div>
                `);
                } else {
                    $(this).closest('.form-input').find('.alertSpan').remove();
                }
            });
            let success = $('[require]').filter(function(){ return $(this).val(); }).length;
            if(success == count && grecaptcha.getResponse().length > 0){
                if($('#demoModal #check').is(':checked')){
                    $('#demoModal form').submit();
                } else {
                    alert('لطفا تماس کارشناسان را تایید نمائید');
                }
            }
        });
    });
</script>
