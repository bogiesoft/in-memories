<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SettingSearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Setting Models';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setting-model-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'type',
            'name',
            'data',
            [
                        'class' => 'yii\grid\DataColumn',
                        'attribute' => 'setting',
                        'format' => 'text',
                        'value' => function ($data) {
                            return Yii::$app->params['setting'][$data->setting];
                        },
            ],

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',],
        ],
    ]); ?>
</div>