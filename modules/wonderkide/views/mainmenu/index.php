<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MainMenuSearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'จัดการ Main Menu';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main-menu-model-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เพิ่ม', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'label',
            'icon',
            'url',
            'type',
            [
                        'class' => 'yii\grid\DataColumn',
                        'attribute' => 'onMobile',
                        'format' => 'text',
                        'value' => function ($data) {
                            return Yii::$app->params['active'][$data->onMobile];
                        },
            ],
            //'sort',
            [
                        'class' => 'yii\grid\DataColumn',
                        'attribute' => 'active',
                        'format' => 'text',
                        'value' => function ($data) {
                            return Yii::$app->params['active'][$data->active];
                        },
            ],

            [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{up} {down} {update} {delete}',
                    'buttons' => [
                        'up' => function ($url, $model, $key) {
                            return Html::a('<span class="glyphicon glyphicon-arrow-up"></span>', '/wonderkide/mainmenu/sorting/' . $model->id . '?action=up');
                        },
                        'down' => function ($url, $model, $key) {
                            return Html::a('<span class="glyphicon glyphicon-arrow-down"></span>', '/wonderkide/mainmenu/sorting/' . $model->id . '?action=down');
                        },
                    ],
            ]
        ],
    ]); ?>
</div>