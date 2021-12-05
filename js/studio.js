$( document ).ready(function() {
	
	var fbOptions = {
      showActionButtons: false
    };
	
	var fBuilder = $('#canvas').formBuilder(fbOptions);
	
	 $("#saveData").on("click", function(){ 
		var result = fBuilder.actions.save();
		//alert(result);
		result = fBuilder.actions.getData('xml');
		
		// we try to pass into CI controller 
		var fName = $('#form-name').val();
		var codeIn = result;
		
		var usIn = $('#hidden-username').val();
		
		sendData(codeIn, fName, usIn);
		
	 });
	 
	  $("#clearData").on("click", function(){ 
		fBuilder.actions.clearFields();
	 });
	
// end of jquery	
});

function sendData(dataIn, formName, usIn){
	
	var arrayMade = {code: dataIn, username:usIn, name:formName};
	console.log( JSON.stringify(arrayMade) );

	$.ajax({
		type: "POST",
		url: "/form/save",
		data: arrayMade,
		success: function(data) {
			alert(data);
		},
		error: function(data){
			alert("fail");
		}
	});
	
}