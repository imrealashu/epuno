$(document).ready(function() {
	$(document).on('click','#w0-save',function(){
		$('#loading').show();
		$.post('index.php?r=manage/main/update-institute',$('#w1').serialize()+'&institute_id='+$('#institutedetails-institute_id').val(),function(data){
		$('#loading').hide();
		if(data == 0){
			alert("Opps!! There's some errors!");
		}
		});
	});

	$(document).on('click','#addNewCourse',function(){
		$.post('index.php?r=manage/main/new-course-field',{'institute_id':$('#institutedetails-institute_id').val()},function(data){
			$('#newCourseContainer').html(data);
		});
	});

	$(document).on('click','#saveNewCourse',function() {
		$.post('index.php?r=manage/main/save-new-course',$('#course-form').serialize()+'&course_id='+$('#coursedetails-course_id').val(),function(data){
			$.post('index.php?r=manage/main/get-all-course',{'institute_id':$('#institutedetails-institute_id').val()},function(response){
				$('#allCourseContainer').html(response);
				});
			});
	});
	$(document).on('click','#addNewLevelButton',function(){
		$.post('index.php?r=manage/main/add-new-level',{'institute_id':$('#institutedetails-institute_id').val(),'course_id':$('#coursedetails-course_id').val()},function(data){
			$('#addNewLevelContainer').html(data).addClass('bg bg-danger');
		});
	});
	$(document).on('click','#saveNewLevelButton',function(){
		$.post('index.php?r=manage/main/save-new-level',$('#level-form').serialize()+'&level_id='+$('#courselevels-level_id').val(),function(){
			$('#addNewLevelContainer').html('');
		});
	});
});