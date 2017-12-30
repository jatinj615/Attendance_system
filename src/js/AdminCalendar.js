

function getBookedDates(type){
	$.post('../controllers/getBookings.php',function(data,status){
		// if(data != 'No result found' && data != 'Something went wrong..'){
				
		// }
		setCalendar(type,data);
		});

}
function setCalendar(type,data){
	// console.log(type);
	// console.log(date);
	if( type == 'manage'){
		$("[data-handler='selectDay']").each(function(i,obj){
		var attr = $(this).attr('title');
			if( typeof attr !== typeof undefined && attr !== false ){
			$(this).removeAttr('title');
			$(this).removeAttr('class');
			$(this).attr('class','');
			// console.log("found");
		}
		$(this).removeAttr('data-handler');
		$(this).removeAttr('data-event');
		// $(this).children().removeAttr('class');
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
			$(this).addClass('disabled');
			$(this).off('click');
		}
		// console.log(data);
		if(data != 'No result found' && data != 'Something went wrong..'){
			// console.log('here');
			var obj = $.parseJSON(data);
			// console.log(obj);
			var count = 0;
			month = month+1;
			date = new Date(year+'-'+month+'-'+day);
			for( var i = 0 ; i < obj['bookings'].length ; i++){
				
				var booked_date = new Date(obj['bookings'][i].booking_date);
				// console.log(date);
				if(booked_date.getTime() == date.getTime()){
					// console.log('found')
					count++;
				} 
			}
			// console.log(count);
			if(count == 2){
				$(this).children().addClass('btn disabled');
				$(this).addClass('disabled');
				$(this).off('click');
			}
		}
		$(this).children().click(function(){
			var booking_day = $(this).text();
			var booking_month = parseInt($(this).parent().attr('data-month'))+1;
			var booking_year = $(this).parent().attr('data-year');
			var id = $('#stu-id').text();
			var date = booking_year+'-'+booking_month+'-'+booking_day;
			getAvailabilityStudio(date,id);
			// console.log(id);
			// console.log(booking_month);
			
			getBookedDates('manage');
		});
		
		});
	}
}

function bookStudio(date,id){
	$.post('../controllers/bookStudio.php?date='+date+'&id='+id,function(data,status){
		alert(data);
	});
	
}

function getAvailabilityStudio(date,id){
	$.post('../controllers/getAvailabilityStudio.php?date='+date,function(data,status){
		if( data != 'Something Went Wrong ...' && data != 0){
			$('#studio-availability').html('<strong>Available : </strong>'+data);
			$('#booking-form').removeClass('hidden');
			$('#studio-book-now').one('click',function(){
				// console.log('clicked');
				getBookedDates('manage');	
				bookStudio(date,id);
				$('#booking-form').addClass('hidden');
			});
			$('#stuio-book-cancel').click(function(){
				$('#booking-form').addClass('hidden');
			});
		}else if (data == 'Something Went Wrong ...') {
			alert(data);
		}
	});
}