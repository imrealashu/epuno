<?php
use backend\modules\manage\models\HeldOn;
use backend\modules\manage\models\CourseCategories;
use yii\helpers\Html;
foreach ($courses as $course):
	?>
<div class="panel panel-default">
	<div class="panel-heading"><?= ucfirst($course['name'])?>
		<div class="pull-right">
			<?= Html::Button('Edit',['class'=>'btn btn-success btn-xs','id'=>'editCourseButton','course-id'=>$course['course_id']])?>
			<?= Html::Button('Delete',['class'=>'btn btn-danger btn-xs','id'=>'deleteCourseButton','course-id'=>$course['course_id']])?>
		</div>
	</div>
	<div class="panel-body">
		<p><label>Course Name: &nbsp</label><?= $course['name']?></p>
		<p><label>Category:&nbsp</label><?= CourseCategories::findOne($course['category_id'])['name']?></p>
		<p><label>Held On:&nbsp</label><?= HeldOn::findOne($course['held_on'])['value']?></p>
		<div class="editCourseContainer"></div>		
	</div> 
	<div class="">
		<table class="table table-responsive table-hover">
			<tr>
				<th>Level Name</th>
				<th>Duration</th>
				<th>Price</th>
				<th>Operations</th>
			</tr>
		<?php
		foreach($levels as $level):
			if($level['course_id'] == $course['course_id']):
		?>
			<tr>
				<td><?= $level['name'] ?></td>
				<td><?= $level['duration'] ?></td>
				<td><?= $level['amount'] ?></td>
				<td>
					<?= Html::Button('Edit',['class'=>'btn btn-success btn-xs','id'=>'editLevelButton','level-id'=>$level['level_id']])?>
					<?= Html::Button('Delete',['class'=>'btn btn-danger btn-xs','id'=>'deleteLevelButton','level-id'=>$level['level_id']])?>
				</td>
			</tr>
		
	<?php endif; endforeach; ?>
	</table>
	<div class="editLevelContainer"></div>
	</div>
</div>
<?php endforeach; ?>
