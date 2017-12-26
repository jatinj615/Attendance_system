$(document).ready(function(){
	$('#manage-att').click(function(){
		attendants();
	});
	$('#addAtt').click(function(){
		// console.log('clicked');
		checkAttPass();
	});
});