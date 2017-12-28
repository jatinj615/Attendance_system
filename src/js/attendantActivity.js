$(document).ready(function(){
	$('#mark-att').click(function(){
		$('#tattendancebody').empty();
		getAttStudents();
	});
	$('#present').click(function(){
		var id = $('#exampleModalLabel').html();
		// $('#tattendancebody').empty();
		// console.log("present");
		$.post('../controllers/markAttendance.php?id='+id+'&attendance=1',function(data,status){
			
			alert(data);
			getAttStudents();
		});
	});

	$('#absent').click(function(){
		var id = $('#exampleModalLabel').html();
		// console.log('absent');
		// $('#tattendancebody').empty();
		$.post('../controllers/markAttendance.php?id='+id+'&attendance=1',function(data,status){
			// $('#tattendancebody').empty();
			alert(data);
			getAttStudents();
		});
	});
	
	$('#view-attendance').click(function(){
		$('#tviewattendancebody').empty();
	$.post('../controllers/getStudents.php',function(data, status){
		var obj = $.parseJSON(data);
		if(data != 'No Students Found' && data != 'Something Went Wrong'){
			for(var i = 0 ; i < obj['Student'].length ; i++){
				
				$('#tviewattendancebody').append('<tr><td>'+obj['Student'][i].id+'</td><td>'+obj['Student'][i].name+'</td><td>'+obj['Student'][i].course+'</td><td>'+obj['Student'][i].class+'</td><td><a data-toggle="modal" data-target="#view-detail-attendance" onclick="viewAttendance('+obj['Student'][i].id+')" href="#"><span class="mdi mdi-eye"></span></a></td></tr>');
			
			}
			
		}else{
			alert(data);
		}
	});
	});

});

