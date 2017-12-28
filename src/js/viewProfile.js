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
	var newfield = $('#new-stu-email').val();
	if(newfield != null && newfield.length > 0){
		$.post('../controllers/changeProfile.php?id='+id+'&new='+newfield+'&field='+field,function(data,status){
			alert(data);
			getProfile(id);
		});	
	}else{
		alert("Empty Email");
	}
}