function getProfile(id){
	$.post('../controllers/getProfile.php?id='+id,function(data,status){
		
		if(data != 'Not Found' && data != 'Something Went Wrong ...'){
			var obj = $.parseJSON(data);
			$('#current-phonenumber').val(obj['profile'][0].phone_no);
			$('#current-email').val(obj['profile'][0].email);
			$('#tprofilebody').html('<tr><th>ID</th><td>'+obj['profile'][0].id+'</td><td></td></tr><tr><th>NAME</th><td>'+obj['profile'][0].name+'</td><td></td></tr><tr><th>EMAIL</th><td>'+obj['profile'][0].email+'</td><td><a data-toggle="modal" data-target="#editEmail" href="#"><span class="mdi mdi-edit" style="margin-right: 2rem"></span></a></td></tr><tr><th>CONTACT</th><td>'+obj['profile'][0].phone_no+'</td><td><a data-toggle="modal" data-target="#editPhone" href="#"><span class="mdi mdi-edit" style="margin-right: 2rem"></span></a></td></tr><tr><th>COURSE</th><td>'+obj['profile'][0].course+'</td><td></td></tr><tr><th>CLASS</th><td>'+obj['profile'][0].class+'</td><td></td></tr><tr><th>ADDRESS</th><td>'+obj['profile'][0].address+'</td><td></td></tr>')
		}else{
			alert(data);
		}
	});
}

function changeStudentProfile(id,field){
	if(field == 'email'){
		var newfield = $('#new-stu-email').val();	
	}else if (field == 'phone_no') {
		var newfield = $('#new-stu-phone_no').val();
	}
	if(newfield != null && newfield.length > 0){
		$.post('../controllers/changeProfile.php?id='+id+'&new='+newfield+'&field='+field,function(data,status){
			alert(data);
			getProfile(id);
		});	
	}else{
		if(field == 'email'){
			alert("Empty Email");
		}else if (field == 'phone_no') {
			alert("Empty Phone");
		}
	}
}

function changeStudentPassword(id){
	var currentpass = $('#current-pass').val();
	var new_pass = $('#new-pass').val();
	var conf_newPass = $('#conf-new-pass').val();
	if(conf_newPass == new_pass && conf_newPass!= null && conf_newPass.length > 0){
		$.post('../controllers/changeStudentPasword.php?id='+id+'&current_pass='+currentpass+'&new_pass='+new_pass,function(data,status){
			alert(data);
		});
	}else{
		alert("Credentials Does Not match..");
	}
}