
	
	function check_phone(parametr, len){
		var check_format_phone = new RegExp("^[0-9\b]+$");
		if(!parametr.val()){
			parametr.addClass("alertFilter");
			//parametr.attr("placeholder","این فیلد را کامل نمائید");
			return false;
		} else if(!check_format_phone.test(parametr.val()) || parametr.val().length != len){
			parametr.addClass("alertFilter");
			parametr.val("");
			parametr.attr("placeholder","شماره همراه صحیح نمیباشد نمونه (0915xxxxxxx)");
			return false;
		} else {
			parametr.attr("placeholder","");
			parametr.removeClass("alertFilter");
			return true;
		}
	}
	
	function check_empty(parametr){
		if(!parametr.val()){
			parametr.addClass("alertFilter");
			//parametr.attr("placeholder","این فیلد را کامل نمائید");
			return false;
		} else {
			parametr.removeClass("alertFilter");
			return true;
		}
	}
	
	function check_mail(parametr){
		var reg = new RegExp("^[_A-Za-z0-9-\\+]+(\\.[_A-Za-z0-9-]+)*@[A-Za-z0-9-]+(\\.[A-Za-z0-9]+)*(\\.[A-Za-z]{2,})$");
		if(parametr.val()){
			if(!reg.test(parametr.val())){
				parametr.addClass("alertFilter");
				parametr.val("");
				parametr.attr("placeholder","پست الکترونیکی فاقد اعتبار میباشد");
				return false;
			} else {
				parametr.attr("placeholder","پست الکترونیکی");
				parametr.removeClass("alertFilter");
				return true;
			}
		} else {
			//parametr.attr("placeholder","این فیلد را کامل نمائید");
			parametr.addClass("alertFilter");
			return false;
		}
	}
	
	function check_password(parametr){
  			if(!parametr.val()){
  				parametr.addClass("alertFilter");
				//parametr.attr("placeholder","این فیلد را کامل نمائید");
  				return false;
  			} else if(parametr.val().length < 6){
  				parametr.val("");
  				parametr.attr("placeholder","رمز عبور باید بیشتر از 6 کاراکتر باشد");
  				parametr.addClass("alertFilter");
  				return false;
  			} else {
  				parametr.attr("placeholder","رمز عبور");
  				parametr.removeClass("alertFilter");
  				return true;
  			}
  		}
		
		
      function check_repassword(parametr, pass){
		  if(parametr.val()){
				if(parametr.val() != pass.val()){
					parametr.val("");
					parametr.attr("placeholder","تکرار رمز عبور یکسان نیست");
					parametr.addClass("alertFilter");
					return false;
				} else {
					parametr.attr("placeholder","");
					parametr.removeClass("alertFilter");
					return true;
				}
		  } else {
			 parametr.addClass("alertFilter");
			 //parametr.attr("placeholder","این فیلد را کامل نمائید");
  			return false;
		  }
      }

	
