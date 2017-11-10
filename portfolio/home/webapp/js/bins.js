$("#form1").on("submit").submit(function (e) {
		
		var error = "";
		if ($("#name").val() == "") {
			error += "The study ID is required. <br>";
			}
		if ($("#description").val() == "") {
			error += "The description is required. <br>";
			}	
		if ($("#species").val() == "") {
			error += "The species/crop name is required.<br>";
			}
		if ($("#worktype").val() == "") {
			error += "The work type field is required.<br>";
			}	
		if ($("#collaborator").val() == "") {
			error += "The collaborator field is required.<br>";
			}
		if ($("#targetdelivery").val() == "") {
			error += "The target delivery date is required.";
			}		
			
		if (error != "") {
			$("#error").html('<div class="alert alert-danger" role="alert"><p><strong> New Study: There were error(s) in your form: </strong></p>'+ error + '</div>');
				return false;
			} else {
			return true;
			}
		});
		
$("#adduser").on("submit").submit(function (e) {
		
		var addusererror = "";
		if ($("#windowsId2").val() == "") {
			addusererror += "Please enter user Windows ID.<br>";
			}	
		if ($("#email2").val() == "") {
			addusererror += "Please enter email address.";
			}
			
		if (addusererror != "") {
			$("#addusererror").html('<div class="alert alert-danger" role="alert"><p><strong> Add User: There were error(s) in your form: </strong></p>'+ addusererror + '</div>');
				return false;
			} else {
			return true;
			}
		});
		
$("#login").on("submit").submit(function (e) {
	var loginerror = "";
	if ($("#windowsId").val() == "") {
			loginerror += "Please enter user Windows ID.<br>";
			}	
	if ($("#email1").val() == "") {
			loginerror += "Please enter email address.<br>";
			}
	if ($("#first").val() == "") {
			loginerror += "Please enter first name.<br>";
			}
	if ($("#last").val() == "") {
			loginerror += "Please enter last name.<br>";
			}
	if (loginerror != "") {
			$("#loginerror").html('<div class="alert alert-danger" role="alert"><p><strong> Login: There were error(s) in your form: </strong></p>'+ loginerror + '</div>');
				return false;
			} else {
			return true;
			}
		});		
			
			