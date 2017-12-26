function deleteAtt(id){
	$.post('../controllers/deleteAttendant?id='+id,function(data,status){
		
	});
}

function editAtt(id){
	console.log(id);
}

function attendants(){
	$.post('../controllers/getAttendants.php',function(data, status){
		
		var obj = $.parseJSON(data);
		// console.log(obj);
		for(var i = 0; i < obj['Attendant'].length; i++){
			// console.log(obj['Attendant'][i]);
			$('#tbody').append('<tr><td>'+obj['Attendant'][i].id+'</td><td>'+obj['Attendant'][i].name+'</td><td>'+obj['Attendant'][i].email+'</td><td>'+obj['Attendant'][i].phone_no+'</td><td><a data-toggle="modal" data-target="#editAttendant" onclick=editAtt('+obj['Attendant'][i].id+') href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a><a href="#" onclick="deleteAtt('+obj['Attendant'][i].id+')" class="ml-4"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td></tr>');
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