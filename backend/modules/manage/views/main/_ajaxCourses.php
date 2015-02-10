<?php
use backend\modules\manage\models\HeldOn;
use yii\helpers\Html;
foreach ($courses as $course):
	?>
<div class="panel panel-default">
	<div class="panel-heading"><?= ucfirst($course['name'])?>
		<div class="pull-right">
			<?= Html::Button('Edit',['class'=>'btn btn-success btn-xs'])?>
			<?= Html::Button('Delete',['class'=>'btn btn-danger btn-xs'])?>
		</div>
	</div>
	<div class="panel-body">
		<p><label>Course Name: &nbsp</label><?= $course['name']?></p>
		<p><label>Held On:&nbsp</label><?= HeldOn::findOne($course['held_on'])['value']?></p>
	</div>
	<div class="panel-footer">
		
	</div>
</div>
<!--
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        levels and forms will be here
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->
<?php endforeach; ?>
