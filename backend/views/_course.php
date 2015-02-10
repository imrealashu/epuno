<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\manage\models\CourseDetails */
/* @var $form ActiveForm */
?>
<div class="course">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'category_id') ?>
        <?= $form->field($model, 'institute_id') ?>
        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'held_on') ?>
        <?= $form->field($model, 'created_at') ?>
        <?= $form->field($model, 'updated_at') ?>
        <?= $form->field($model, 'user_id') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- _course -->
