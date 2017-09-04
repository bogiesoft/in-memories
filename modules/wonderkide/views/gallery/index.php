<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\UserModel;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GallerySearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gallery';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-model-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php //echo Html::a('Create Gallery Model', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            //'id_user',
            [
                        'class' => 'yii\grid\DataColumn',
                        'attribute' => 'id_user',
                        'format' => 'text',
                        'value' => function ($data) {
                            return UserModel::getUsername($data->id_user);
                        },
            ],
            'ref',
            'name',
            'title',
            'read',
            //'detail',
            // 'create_date',
            // 'update_date',
            [
                        'class' => 'yii\grid\DataColumn',
                        'attribute' => 'show',
                        'format' => 'text',
                        'value' => function ($data) {
                            return Yii::$app->params['show'][$data->show];
                        },
            ],
            [
                        'class' => 'yii\grid\DataColumn',
                        'attribute' => 'banned',
                        'format' => 'text',
                        'value' => function ($data) {
                            return Yii::$app->params['show'][$data->banned];
                        },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>