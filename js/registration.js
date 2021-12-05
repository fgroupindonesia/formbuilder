$( document ).ready(function() {
    
	/* default hidden part from login UI */
	$(".log").hide();
	$(".reg-input").hide();
	$("#reg-button").hide();
	
	/* default clicking actions from login UI */
	$(".reg a").click(function(){
		showReg(true);
	});
	
	$(".log a").click(function(){
		showReg(false);
	});
	
	
	/* email validation */
	$('#email').on('input', function() {
    
		var n = $('#email').val();
		if(!validateEmail(n) || (n == '') ){
			$('#reg-button').attr('disabled', 'disabled');
		}else{
			$('#reg-button').removeAttr('disabled');
		}
	
	});
	
	
});

 function validateEmail($email) {
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  return emailReg.test( $email );
}

function showReg(b){
	
	if(b == true){
		$(".log").show();
		$(".reg").hide();
		
		$("#submit-button").hide();
		$("#reg-button").show();
		$(".reg-input").show();
		
		$('form').attr('action', '/register');
	} else {
		$(".reg").show();
		$(".log").hide();
		
		$("#submit-button").show();
		$("#reg-button").hide();
		$(".reg-input").hide();
		
		$('form').attr('action', '/login/verify');
	}
	
}