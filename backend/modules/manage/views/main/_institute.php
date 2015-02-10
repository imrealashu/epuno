<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $model backend\modules\manage\models\InstituteDetails */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Add New Institute';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="institute-details-form">
<?php  Pjax::begin() ?>
    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'institute_id')->textInput(['disabled'=>'disabled']) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'contact_person')->textInput(['maxlength' => 32]) ?>

    <?= $form->field($model, 'landline_number')->textInput(['maxlength' => 32]) ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => 32]) ?>

    <?= $form->field($model, 'website')->textInput(['maxlength' => 32]) ?>

    <?= $form->field($model, 'affiliation')->textInput(['maxlength' => 32]) ?>

    <?= $form->field($model, 'awards')->textInput(['maxlength' => 32]) ?>

    <?= $form->field($model, 'estd')->textInput() ?>

    <?= Html::Button('Save Institute Details',['id'=>'w0-save','class'=>'btn btn-success'])?>
             
    <?php ActiveForm::end(); ?>
<?php Pjax::end() ?>
</div>