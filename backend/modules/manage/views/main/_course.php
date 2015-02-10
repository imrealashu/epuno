<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\manage\models\CourseDetails */
/* @var $form ActiveForm */
?>
<div class="course">

    <?php $form = ActiveForm::begin(['id'=>'course-form']); ?>
		<?= $form->field($model, 'course_id')->textInput(['disabled'=>'disabled']) ?>
        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'held_on') ?>

        <div class="form-group">
            <?= Html::Button('Save Course', ['class' => 'btn btn-success','id'=>'saveNewCourse']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- _course -->