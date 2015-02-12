<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\manage\models\CourseCategories */
/* @var $form ActiveForm */
?>
<div class="categories">

    <?php $form = ActiveForm::begin(['id'=>'newCategoryForm']); ?>
		<input type="hidden" id="coursecategories-category_id" value="<?= $model->category_id?>" />
        <?= $form->field($model, 'name') ?>
		<?= Html::Button('Save Category',['id'=>'saveCategoryButton','class'=>'btn btn-xs btn-success'])?>
    <?php ActiveForm::end(); ?>

</div><!-- _categories -->