$(document).ready(function(){
	$('#mark-att').click(function(){
		getAttStudents();
	});

	function getAttStudents(){
	$.post('../controllers/getStudents.php',function(data, status){
		var obj = $.parseJSON(data);
		if()
		$('#tattendancebody').append('<tr><td>'+obj['Student']+'</td></tr>');
	});

}
});