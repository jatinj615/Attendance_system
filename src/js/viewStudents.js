function markAttendance(id){
		$('#exampleModalLabel').html(id);
	}

	function getAttStudents(){
		// console.log("called");
		$('#tattendancebody').empty();
	$.post('../controllers/getStudents.php',function(data, status){
		var obj = $.parseJSON(data);
		if(data != 'No Students Found' && data != 'Something Went Wrong'){
			for(var i = 0 ; i < obj['Student'].length ; i++){
				
				$('#tattendancebody').append('<tr><td>'+obj['Student'][i].id+'</td><td>'+obj['Student'][i].name+'</td><td>'+obj['Student'][i].course+'</td><td>'+obj['Student'][i].class+'</td><td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mark-attendance" onclick="markAttendance('+obj['Student'][i].id+')">Mark</td></tr>');
			
			}
			
		}else{
			alert(data);
		}
	});
}

function viewAttendance(id){
	$('#tviewstuattendancebody').empty();
	$.post('../controllers/getAttendance.php?id='+id,function(data,status){
		if(data != 'No result found' && data != 'Something went wrong...'){
			var obj = $.parseJSON(data);
			// console.log(data);
			for( var i = 0 ; i < obj['Attendance'].length ; i++){
				if( obj['Attendance'][i].attendance == 1){
					obj['Attendance'][i].attendance = 'Present';
				}else if (obj['Attendance'][i].attendance == 0) {
					obj['Attendance'][i].attendance = 'Absent';
				}
				$('#tviewstuattendancebody').append('<tr><td>'+obj['Attendance'][i].date+'</td><td>'+obj['Attendance'][i].attendance+'</td></tr>')
			}
		}else{
			alert(data);
		}
	});
}