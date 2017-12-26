$(document).ready(function(){
	$('#manage-att').click(function(){
		$('#tbody').empty();
		attendants();
	});
	$('#addAtt').click(function(){
		// console.log('clicked');
		checkAttPass();
	});
});