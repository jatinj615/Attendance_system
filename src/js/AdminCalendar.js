function getBookedDates(type){
	return $.post('../controllers/getBookings.php',function(data,status){
		// if(data != 'No result found' && data != 'Something went wrong..'){
				
		// }
		setCalendar(type,data);
		});

}
function setCalendar(type,date){
	// console.log(type);
	// console.log(date);
	if( type == 'manage'){
		$("[data-handler='selectDay']").each(function(i,obj){
		var attr = $(this).attr('title');
			if( typeof attr !== typeof undefined && attr !== false ){
			$(this).removeAttr('title');
			$(this).removeAttr('class');
			$(this).attr('class','');
			// $(this).children().addClass('btn disabled');
			// console.log("found");
		}
		var month = parseInt($(this).attr('data-month'));
		var year = parseInt($(this).attr('data-year'));
		var day = parseInt($(this).children().text());
		var p = new Date();
		var pd = parseInt(p.getDate());
		var pm = parseInt(p.getMonth());
		var py = parseInt(p.getFullYear());
		var date = new Date(month+'/'+day+'/'+year);
		var today = new Date(pm+'/'+pd+'/'+py);
		if( date.getTime() < today.getTime() ){
			$(this).children().addClass('btn disabled');
		}
		$(this).children().attr('onclick','showBookings()')
		// console.log($(this).children().text());
		});
		
	}else if (type == 'Book') {
		$("[data-handler='selectDay']").each(function(i,obj){
		var attr = $(this).attr('title');
			if( typeof attr !== typeof undefined && attr !== false ){
			$(this).removeAttr('title');
			$(this).removeAttr('class');
			$(this).attr('class','');
			// $(this).children().addClass('btn disabled');
			// console.log("found");
		}
		var month = parseInt($(this).attr('data-month'));
		var year = parseInt($(this).attr('data-year'));
		var day = parseInt($(this).children().text());
		var p = new Date();
		var pd = parseInt(p.getDate());
		var pm = parseInt(p.getMonth());
		var py = parseInt(p.getFullYear());
		var date = new Date(month+'/'+day+'/'+year);
		var today = new Date(pm+'/'+pd+'/'+py);
		if( date.getTime() < today.getTime() ){
			$(this).children().addClass('btn disabled');
		}
		$(this).children().attr('onclick','showBookings()')
		// console.log($(this).children().text());
		});
	}
}