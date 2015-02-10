<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use backend\modules\manage\models\HeldOn;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model backend\modules\manage\models\CourseDetails */
/* @var $form ActiveForm */
?>
<div class="course">

    <?php $form = ActiveForm::begin(['id'=>'course-form']); ?>
		<?= $form->field($model, 'course_id')->textInput(['disabled'=>'disabled']) ?>
        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'category_id') ?>
        <?= $form->field($model, 'held_on')->dropDownList(
        	ArrayHelper::map(HeldOn::find()->all(),'id','value'),
        	['prompt','Select Held On']
        ) ?>
        
		<?php
		/* echo $form->field($model, 'held_on')->widget(Select2::classname(), [
		    'data' => ArrayHelper::map(HeldOn::find()->all(),'id','value'),
		    'language' => 'en',
		    'options' => ['placeholder' => 'Select a Held on'],
		    'pluginOptions' => [
		        'allowClear' => true
		    ],
		]); */
		?>
		
        <div class="form-group">
            <?= Html::Button('Save Course', ['class' => 'btn btn-success btn-xs','id'=>'saveNewCourse']) ?>
        </div>
    <?php ActiveForm::end(); ?>
	<div class="form-group">
            <?= Html::Button('Add Level', ['class' => 'btn btn-success btn-xs','id'=>'addNewLevelButton']) ?>
        </div>
        <div id="addNewLevelContainer"class="" style="padding:20px;">
        	
        </div>
</div><!-- _course -->