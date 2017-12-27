function deleteAtt(id){
	$.post('../controllers/deleteAttendant.php?id='+id,function(data,status){
		if(data == "Successfully Deleted"){
			alert(data);
			attendants();
		}
	});
}

function getStudents(){
	$.post('../controllers/getStudents.php',function(data,status){
		$('#tstubody').empty();
		if(data != "No Attendants Found" && data != "Something Went Wrong"){
			var obj = $.parseJSON(data);
			// console.log(data);
			for(var i = 0; i < obj['Student'].length; i++){
				// console.log(obj['Student'][i]);
				var id = obj['Student'][i].id;
				var name = obj['Student'][i].name;
				// console.letog(name);
				var email = obj['Student'][i].email;
				var phone_no = obj['Student'][i].phone_no;
				$('#tstubody').append('<tr><td>'+id+'</td><td>'+name+'</td><td>'+email+'</td><td>'+phone_no+'</td><td><a data-toggle="modal" data-target="#editAttendant" onclick="editAtt('+id+',\''+name+'\',\''+email+'\','+phone_no+')" href="#"><span class="mdi mdi-edit" style="margin-right: 2rem"></span></a><a href="#" onclick="deleteAtt('+obj['Student'][i].id+')" class="ml-4"><span class="mdi mdi-delete"></span></a></td></tr>');
			}
			
		}else{
			alert(data);
		}
	});
}

function editAtt(id,name,email,phone_no){
	// console.log(name);
	$('#edit-att-name').val(name);
	$('#edit-exampleInputEmail1').val(email);
	$('#edit-phonenumber').val(phone_no);
	$('#editAtt').click(function(){
		console.log
		var newname = $('#edit-att-name').val();
		var newemail = $('#edit-exampleInputEmail1').val();
		var newphone_no = $('#edit-phonenumber').val();
		var newpassword = $('#edit-exampleInputPassword1').val();
		var confnewpass = $('#edit-exampleInputPassword2').val();
		if(newname != name || newemail != email || newphone_no != phone_no){
			if(newpassword == confnewpass){
				$.post('../controllers/updateAttendants.php?id='+id+'&name='+newname+'&email='+newemail+'&phone_no='+newphone_no+'&password='+newpassword,function(data,status){
					if(data == "Success"){
						alert(data);
						attendants();
						// test();
					}else{
						alert(data);
					}
				});
			}else{
				alert("Something went wrong");
			}
		}
	});
}

function test(){
	console.log('works');
}

function attendants(){
	$.post('../controllers/getAttendants.php',function(data, status){
		$('#tbody').empty();
		if(data != "No Attendants Found" && data != "Something Went Wrong"){
			var obj = $.parseJSON(data);
			// console.log(data);
			for(var i = 0; i < obj['Attendant'].length; i++){
				// console.log(obj['Attendant'][i]);
				var id = obj['Attendant'][i].id;
				var name = obj['Attendant'][i].name;
				// console.letog(name);
				var email = obj['Attendant'][i].email;
				var phone_no = obj['Attendant'][i].phone_no;
				$('#tbody').append('<tr><td>'+id+'</td><td>'+name+'</td><td>'+email+'</td><td>'+phone_no+'</td><td><a data-toggle="modal" data-target="#editAttendant" onclick="editAtt('+id+',\''+name+'\',\''+email+'\','+phone_no+')" href="#"><span class="mdi mdi-edit" style="margin-right: 2rem"></span></a><a href="#" onclick="deleteAtt('+obj['Attendant'][i].id+')" class="ml-4"><span class="mdi mdi-delete"></span></a></td></tr>');
			}
			
		}else{
			alert(data);
		}
	});
}



function addAttendants(){
	var name = $('#att-name').val();
	var email = $('#exampleInputEmail1').val();
	var phone = $('#phonenumber').val();
	var pass = $('exampleInputPassword1').val();
	// console.log('at add att');
	// console.log('inside');	
		$.post('../controllers/addAttendants.php?name='+name+'&email='+email+'&phone='+phone+'&password='+pass,function(data,status){
			// console.log('works');
			alert(data);
			attendants();
		});
}

function checkAttPass(){
	var pass = $('#exampleInputPassword1').val();
	var confPass = $('#exampleInputPassword2').val();
	// console.log('at check pass');
	if(pass!=null && pass.length > 0 && confPass!=null && confPass.length > 0 ){
		if(pass == confPass ){
			addAttendants();
		}else{
			alert('Password doesn\'t match.!');
		}
	}
}