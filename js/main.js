function searchProducts(){
 var pc = $('#productcode').val();
 var desc = $('#desc').val();
 
 console.log(pc);	
 $("#loadproducts").load("loadproducts.php?pr="+pc+"&desc="+desc);
}

function validateForm(){
	var firstname = $('#firstname').val();
	var pw = $('#password').val();
	var cpw = $('#confirmpassword').val();
	var checking = false;
	
	if (firstname == ""){
		$('#error').html('FIRstname is required');
		$('#errorf').html('FIRstname is required');
		$('#firstname').css("border", "1px solid red");	
		return false;
	}else{
		checking = true;
		$('#error').html('');
		$('#errorf').html('');
		$('#firstname').css("border", "1px solid black");
	}
	
	if (pw == ""){
		$('#error').append('Password is required');
		$('#errorp').html('Password is required');
		$('#password').css("border", "1px solid red");
		return false;
	}else{
		checking = true;
		$('#error').html('');
		$('#errorp').html('');
		$('#password').css("border", "1px solid black");
	}
	
	if (pw != cpw){
		checking = true;
		$('#error').append('Password hndi same sa cP');
	}
	
	if (checking){
		console.log('ok na');
	}
	
	
}

function statusUpdate(event,section, key){	
	var result = confirm("Are you sure you want to "+event+"?");
	if (!result) {
		return false;
	}
	
	$.get('actions/statusUpdate.php?event='+event+'&section='+section+'&id=' +  key, function(data) { 
        /*if (section == 'products'){
			$('tbody#resultstransactions').load("actions/loadproducts.php"); 
		}
		
		if (section == 'inventory'){		
			$('tbody#resultstransactions').load("actions/loadinventory.php"); 
		}
		
		if (section == 'supplier'){		
			$('tbody#resultstransactions').load("actions/loadsupplier.php"); 
		}
		
		if (section == 'product_unit'){		
			$('tbody#resultstransactions').load("actions/loadcategory.php"); 
		}
		
		if (section == 'officelab'){		
			$('tbody#resultstransactions').load("actions/loadoffice.php"); 
		}
		
		if (section == 'user_access_type'){		
			
		}*/
		
		
		if (section == 'users'){
			window.location.replace("users.php");
		}else{
			//var url = "actions/load"+section+".php";
			//$('tbody#resultstransactions').load(url); 
			window.location.replace(section+".php");
		}

    });
}

function addForm(){
    $('#regForm').toggle();
}

function cancelForm(event){        
    if (event=='add'){
        $('#regForm').hide();
    }else{
        $('#updateForm').hide();    
    }        
}
