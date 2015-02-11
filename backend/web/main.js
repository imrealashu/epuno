$(document).ready(function() {

	$(document).on('click','#w0-save',function(){
		$.post('index.php?r=manage/main/update-institute',$('#w1').serialize()+'&institute_id='+$('#institutedetails-institute_id').val(),function(data){
		if(data == 0){
			alert("Opps!! There's some errors!");
		}
		});
	});

	$(document).on('click','#addNewCourse',function(){
		$.post('index.php?r=manage/main/new-course-field',{'institute_id':$('#institutedetails-institute_id').val()},function(data){
			$('#newCourseContainer').html(data).fadeIn();
		});
	});

	$(document).on('click','#saveNewCourse',function() {
		$.post('index.php?r=manage/main/save-new-course',$('#course-form').serialize()+'&course_id='+$('#coursedetails-course_id').val(),function(data){
			$.post('index.php?r=manage/main/get-all-course',{'institute_id':$('#institutedetails-institute_id').val()},function(response){
				$('#allCourseContainer').html(response).fadeIn();
				$('.editCourseContainer').html('');
				});
			});
	});

	$(document).on('click','#editCourseButton',function(){
		$that = $(this);
		$.post('index.php?r=manage/main/edit-course',{'course_id':$(this).attr('course-id')},function(data){
			//$('#newCourseContainer').html(data).fadeIn();
			$that.parent().parent().parent().find('.editCourseContainer').html(data);
		});
	});
	
	$(document).on('click','#deleteCourseButton',function(){
		var ans = confirm('Are you sure want to delete this course?');
		if(ans){
				$.post('index.php?r=manage/main/delete-course',{'course_id':$(this).attr('course-id'),'institute_id':$('#institutedetails-institute_id').val()},function(data){
				$('#allCourseContainer').html(data).fadeIn();
			});
		}

	});

	$(document).on('click','#addNewLevelButton',function(){
		$.post('index.php?r=manage/main/add-new-level',{'institute_id':$('#institutedetails-institute_id').val(),'course_id':$('#coursedetails-course_id').val()},function(data){
			$('#addNewLevelContainer').slideDown('slow').html(data).addClass('bg bg-danger');
		});
	});
	$(document).on('click','#saveNewLevelButton',function(){
		$.post('index.php?r=manage/main/save-new-level',$('#level-form').serialize()+'&level_id='+$('#courselevels-level_id').val(),function(){
			$('#addNewLevelContainer').slideUp('slow');
			$.post('index.php?r=manage/main/get-all-course',{'institute_id':$('#institutedetails-institute_id').val()},function(response){
				$('#allCourseContainer').fadeIn().html(response);
				});
		});
	});
	$(document).on('click','#editLevelButton',function(){
		$that = $(this);
		$.post('index.php?r=manage/main/edit-level',{'level_id':$(this).attr('level-id')},function(data){
			$that.parent().parent().parent().parent().parent().find('.editLevelContainer').html(data);
		});
	});
	$(document).on('click','#deleteLevelButton',function(){
		var ans = confirm('Are you sure want to delete this course?');
		if(ans){
				$.post('index.php?r=manage/main/delete-level',{'level_id':$(this).attr('level-id'),'institute_id':$('#institutedetails-institute_id').val()},function(data){
				$('#allCourseContainer').html(data).fadeIn();
			});
		}

	});
});