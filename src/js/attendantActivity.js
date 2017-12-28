$(document).ready(function(){
	$('#mark-att').click(function(){
		$('#tattendancebody').empty();
		getAttStudents();
	});

	
});

function markAttendance(id){
		$('#present').click(function(){
			$('#tattendancebody').empty();
			$.post('../controllers/markAttendance.php?id='+id+'&attendance=1',function(data,status){
				
				alert(data);
				getAttStudents();
			});
		});

		$('#absent').click(function(){
			$('#tattendancebody').empty();
			$.post('../controllers/markAttendance.php?id='+id+'&attendance=1',function(data,status){
				// $('#tattendancebody').empty();
				alert(data);
				getAttStudents();
			});
		});

	}

	function getAttStudents(){
		console.log("called");
		$('#tattendancebody').empty();
	$.post('../controllers/getStudents.php',function(data, status){
		var obj = $.parseJSON(data);
		if(data != 'No Students Found' && data != 'Something Went Wrong'){
			for(var i = 0 ; i < obj['Student'].length ; i++){
				
				$('#tattendancebody').append('<tr><td>'+obj['Student'][i].id+'</td><td>'+obj['Student'][i].name+'</td><td>'+obj['Student'][i].course+'</td><td>'+obj['Student'][i].class+'</td><td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mark-attendance" onclick="markAttendance('+obj['Student'][i].id+')">Mark</td></tr>');
			
			}
			
		}
	});
}