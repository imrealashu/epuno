<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\manage\models\InstituteDetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Institute Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<p>
    <?= Html::a('Create Institute Details', ['create'], ['class' => 'btn btn-success']) ?>
</p>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
    'name',
    'address:ntext',
    'email:email',
    'contact_person',
            // 'landline_number',
            // 'phone_number',
            // 'website',
            // 'affiliation',
            // 'awards',
            // 'estd',
            // 'logo',
            // 'longitude',
            // 'latitude',
            // 'zoom',
            // 'created_at',
            // 'updated_at',
            // 'user_id',
            // 'status',

    ['class' => 'yii\grid\ActionColumn',
    'template' => '{new_action1}{new_action2}',
    'buttons' => [
    'new_action1' => function ($url, $model) {
        return Html::a('<span class="glyphicon glyphicon-edit"></span>', $url, [
            'title' => Yii::t('app', 'Edit Details'),
            ]);
    },
    'new_action2' => function ($url, $model) {
        return Html::a('&nbsp;<span class="glyphicon glyphicon-remove"></span>', $url, [
            'title' => Yii::t('app', 'Remove'),
            'data-confirm'=>'Are you sure want to delete this item?',
            //'data-method'=>'post',
            ]);
    }
    ],
    'urlCreator' => function ($action, $model, $key, $index) {
        if ($action === 'new_action1') {
            $url ='index.php?r=manage/main/update&i_id='.$model->institute_id;
            return $url;
        }
        if ($action === 'new_action2') {
            $url ='index.php?r=manage/main/delete&i_id='.$model->institute_id;
            return $url;
        }
    }],

    ],
    ]); ?>
