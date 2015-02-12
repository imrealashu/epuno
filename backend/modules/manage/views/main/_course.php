<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use backend\modules\manage\models\HeldOn;
use yii\helpers\ArrayHelper;
use backend\modules\manage\models\CourseCategories;
/* @var $this yii\web\View */
/* @var $model backend\modules\manage\models\CourseDetails */
/* @var $form ActiveForm */
?>
<div class="course">

    <?php $form = ActiveForm::begin(['enableAjaxValidation' => true,'id'=>'course-form']); ?>
        <input type="hidden" value="<?= $model->course_id ?>" id="coursedetails-course_id"/>
        <?= Html::Button('Add New Category',['class'=>'btn btn-danger btn-xs pull-right', 'id'=>'addNewCategoryButton']) ?>
        <div id="addNewCategoryContainer"></div>
        <?php echo $form->field($model, 'category_id')->widget(Select2::classname(), [
            'language' => 'en',
            'data' => ArrayHelper::map(CourseCategories::find()->where(['status'=>1])->all(),'category_id','name'),
            'options' => ['prompt' => 'Plsease Select a Category'],
            'pluginOptions' => [
                'allowClear' => true,
            ],

        ]);
        ?>
        <?= $form->field($model, 'name') ?>
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
            <?= Html::Button('Close', ['class' => 'btn btn-danger btn-xs','id'=>'closeCourseButton']) ?>
        </div>
    <?php ActiveForm::end(); ?>
	<div class="form-group">
            <?= Html::Button('Add Level', ['class' => 'btn btn-success btn-xs','id'=>'addNewLevelButton']) ?>
        </div>
        <div id="addNewLevelContainer">
        	
        </div>
</div><!-- _course -->