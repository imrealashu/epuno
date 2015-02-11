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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
