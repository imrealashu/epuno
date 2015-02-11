<?php
use yii\helpers\Html;
?>
<div class="col-lg-6">
<?= $this->render('_institute', [
        'model' => $model,
    ]) ?>	
</div>
<div class="col-lg-6">
	<div class="form-group field-institutedetails-institute_id">
		<label class="control-label">Add New Course</label><br/>
		<?= Html::Button('Add New Course',['class'=>'btn btn-success btn-sm', 'id'=>'addNewCourse']) ?>
	</div>
	<div id="newCourseContainer"></div>
	<div id="allCourseContainer">
		<?= $this->render('_ajaxCourses', [
        'courses' => $courses,
        'levels' => $levels,
    ]) ?>
	</div>
</div>
