<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use kartik\file\FileInput;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model backend\modules\manage\models\InstituteDetails */
/* @var $form yii\widgets\ActiveForm */
//$this->title = 'Add New Institute';
//$this->params['breadcrumbs'][] = $this->title;
?>

<div class="institute-details-form">
<?php  Pjax::begin() ?>
<div id="institute-details-form-content">
    <?php $form = ActiveForm::begin(); ?>
    
    <input type="hidden" value="<?= $model->institute_id ?>" id="institutedetails-institute_id" />

    <?= $form->field($model, 'name')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'contact_person')->textInput(['maxlength' => 32]) ?>

    <?= $form->field($model, 'landline_number')->textInput(['maxlength' => 32]) ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => 32]) ?>

    <?= $form->field($model, 'website')->textInput(['maxlength' => 32]) ?>

    <?= $form->field($model, 'affiliation')->textInput(['maxlength' => 32]) ?>

    <?= $form->field($model, 'awards')->textInput(['maxlength' => 32]) ?>

    <?= $form->field($model, 'estd')->textInput() ?>

</div>
        <fieldset class="gllpLatlonPicker">
            <br/>
        <input type="text" class="form-control gllpSearchField" placeholder="Search location here...">
        <input type="button" class="btn btn-default gllpSearchButton" value="search">
        <br/>
        <div class="gllpMap" style="border:2px #999 solid; ">Google Maps</div>
        <?= $form->field($model, 'latitude')->textInput(['class'=>'form-control gllpLatitude']) ?>
        <?= $form->field($model, 'longitude')->textInput(['class'=>'form-control gllpLongitude']) ?>
        <?= $form->field($model, 'zoom')->textInput(['class'=>'form-control gllpZoom']) ?>
        <input type="button" class="gllpUpdateButton" value="update map">

        </fieldset><br/>
    <?= Html::Button('Save Institute Details',['id'=>'w0-save','class'=>'btn btn-success'])?>
             
    <?php ActiveForm::end(); ?>
<?php Pjax::end() ?>

</div>