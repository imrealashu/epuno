<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="level">

    <?php $form = ActiveForm::begin(['id'=>'level-form','enableAjaxValidation'=>true]); ?>
        <?= $form->field($model,'level_id')->textInput(['disabled'=>'disabled'])?>
        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'duration') ?>
        <?= $form->field($model, 'amount') ?>
    <?= Html::Button('Seve Level',['class'=>'btn btn-danger btn-xs','id'=>'saveNewLevelButton'])?>
    <?php ActiveForm::end(); ?>

</div><!-- _level -->