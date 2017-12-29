function deleteAtt(id){
	$.post('../controllers/deleteAttendant.php?id='+id,function(data,status){
		if(data == "Successfully Deleted"){
			alert(data);
			attendants();
		}
	});
}

function deleteStu(id){
	$.post('../controllers/deleteStudent.php?id='+id,function(data,status){
		if(data == "Successfully Deleted"){
			alert(data);
			getAdminStudents();
		}
	});
}

function viewBookings(id){
	$('#tviewstudentBokings').empty();
	$.post('../controllers/getStudentBooking.php?id='+id,function(data,status){
		// console.log(data);
		if(data != 'No Result found..' && data != 'Something went wrong..'){
			var obj = $.parseJSON(data);
			for( var i = 0 ; i < obj['bookings'].length ; i++){
				if( obj['bookings'][i].status == 0){
					obj['bookings'][i].status = 'Rejected'
				}else if (obj['bookings'][i].status == 1) {
					obj['bookings'][i].status = 'Booked';
				}else if (obj['bookings'][i].status == 2) {
					obj['bookings'][i].status = '-';
				}
				$('#tviewstudentBokings').append('<tr><td>'+obj['bookings'][i].booking_date+'</td><td>'+obj['bookings'][i].status+'</td></tr>');
			}
		}else{
			alert(data);
		}
	});
}

function getAdminStudents(){
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
				var address = obj['Student'][i].address;
				var course = obj['Student'][i].course;
				var clss = obj['Student'][i].class;
				$('#tstubody').append('<tr><td>'+id+'</td><td>'+name+'</td><td>'+email+'</td><td>'+phone_no+'</td><td>'+address+'</td><td>'+course+'</td><td>'+clss+'</td><td><a title="Book Studio" class="btn btn-primary" data-toggle="modal" data-target="#book-student-studio" onclick="attendantBookStudio('+id+')" style="margin-right: 2rem">Book Now</a><a title="Bookings" data-toggle="modal" data-target="#view-detail-bookings" onclick="viewBookings('+id+')" href="#"><span class="mdi mdi-eye" style="margin-right: 2rem"></span></a></td><td><a title="Mark Attendance" class="btn btn-primary" data-toggle="modal" data-target="#mark-attendance" onclick="markAttendance('+id+')" style="margin-right: 2rem">Mark</a><a title="Attendance" data-toggle="modal" data-target="#view-detail-attendance" onclick="viewAttendance('+id+')" href="#"><span class="mdi mdi-eye" style="margin-right: 2rem"></span></a></td><td><a title="Edit Details" data-toggle="modal" data-target="#editStudent" onclick="editStu('+id+',\''+name+'\',\''+email+'\','+phone_no+',\''+address+'\',\''+course+'\','+clss+')" href="#"><span class="mdi mdi-edit" style="margin-right: 2rem"></span></a><a title="Delete Profile" href="#" onclick="deleteStu('+obj['Student'][i].id+')" class="ml-4"><span class="mdi mdi-delete"></span></a></td></tr>');
			}
			
		}else{
			alert(data);
		}
	});
}

function editStu(id,name,email,phone_no,address,course,clss){
	// console.log(name);
	$('#edit-stu-name').val(name);
	$('#edit-stu-exampleInputEmail1').val(email);
	$('#edit-stu-phonenumber').val(phone_no);
	$('#edit-stu-address').val(address);
	$('#edit-stu-course').val(course);
	$('#edit-stu-class').val(clss);
	
	$('#editStu').click(function(){
		console.log
		var newname = $('#edit-stu-name').val();
		var newemail = $('#edit-stu-exampleInputEmail1').val();
		var newphone_no = $('#edit-stu-phonenumber').val();
		var newaddress = $('#edit-stu-address').val();
		var newcourse = $('#edit-stu-course').val();
		var newclass = $('#edit-stu-class').val();
		var newpassword = $('#edit-stu-exampleInputPassword1').val();
		var confnewpass = $('#edit-stu-exampleInputPassword2').val();
		if(newname != name || newemail != email || newphone_no != phone_no || newaddress != address || newcourse != course || newclass != clss){
			if(newpassword == confnewpass){
				$.post('../controllers/updateStudents.php?id='+id+'&name='+newname+'&email='+newemail+'&phone_no='+newphone_no+'&password='+newpassword,function(data,status){
					if(data == "Success"){
						alert(data);
						getAdminStudents();
						// test();
					}else{
						alert(data);
					}
				});
			}else{
				alert("Password Does not match...!");
			}
		}else{
			alert("Nothing to update..");
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