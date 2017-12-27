$(document).ready(function(){

	getStudents();
	$('#manage-stu').click(function(){
		getStudents();
	});
	$('#manage-att').click(function(){
		attendants();
	});
	$('#addAtt').click(function(){
		// console.log('clicked');
		checkAttPass();
	});
	$('#addStu').click(function(){
		var name = $('#stu-name').val();
		var email = $('#stu-exampleInputEmail1').val();
		var phone_no = $('#stu-phonenumber').val();
		var pass = $('#stu-exampleInputPassword1').val();
		var confpass = $('#stu-exampleInputPassword2').val();
		var address = $('#stu-address').val();
		var course;
		var clss;
		if(pass == confpass){
			if(name && email && phone_no && pass && address){
				$('#assignCourse').click(function(){
					this.course = $('#course-name').val();
					this.clss = $('#class').val();
					this.name = $('#stu-name').val();
					this.email = $('#stu-exampleInputEmail1').val();
					this.phone_no = $('#stu-phonenumber').val();
					this.pass = $('#stu-exampleInputPassword1').val();
					this.address = $('#stu-address').val();
					// console.log(this.name);
					$.post('../controllers/addStudent.php?name='+this.name+'&email='+this.email+'&phone_no='+this.phone_no+'&password='+this.pass+'&course='+this.course+'&class='+this.clss+'&address='+this.address, function(data,status){
						// console.log(data);
						if(data == 'Success'){
							alert("Successfully Added");
						}else{
							alert(data);
						}
					});
				});
				
			}else{
				alert("All fields are required");
			}
		}else{
			alert("Password Doesn't match ..!");
		}
	});
});