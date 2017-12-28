$(document).ready(function(){
	$("[data-handler='selectDay']").each(function(i,obj){
		var attr = $(this).attr('title');

		if( typeof attr !== typeof undefined && attr !== false ){
			$(this).removeAttr('title');
			$(this).removeAttr('class');
			$(this).attr('class','');
			// $(this).children().addClass('btn disabled');
			// console.log("found");
		}
		var month = $(this).attr('data-month');
		var year = $(this).attr('data-year');
		console.log(month);
		// console.log($(this).children().text());
	});
});