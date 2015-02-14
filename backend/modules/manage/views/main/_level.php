<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="level">
    <?php $form = ActiveForm::begin(['id'=>'level-form']); ?>
        <input type="hidden" value="<?= $model->level_id ?>" id="courselevels-level_id"/>
        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'duration') ?>
        <?= $form->field($model, 'amount') ?>
    <?= Html::Button('Save Level',['class'=>'btn btn-danger btn-xs','id'=>'saveNewLevelButton'])?>
    <?php ActiveForm::end(); ?>

</div>