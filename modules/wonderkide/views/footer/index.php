<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FooterSearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Footer Models';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="footer-model-index">

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

            //'id_footer',
            'type',
            'title',
            'detail_1',
            //'detail_2',
            // 'detail_3',
            // 'url:url',
            //'active',
            [
                        'class' => 'yii\grid\DataColumn',
                        'attribute' => 'active',
                        'format' => 'text',
                        'value' => function ($data) {
                            return Yii::$app->params['active'][$data->active];
                        },
            ],

            //['class' => 'yii\grid\ActionColumn'],
            [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{up} {down} {update} {delete}',
                    'buttons' => [
                        'up' => function ($url, $model, $key) {
                            return Html::a('<span class="glyphicon glyphicon-arrow-up"></span>', '/wonderkide/footer/sorting/' . $model->id_footer .'?action=up');
                        },
                        'down' => function ($url, $model, $key) {
                            return Html::a('<span class="glyphicon glyphicon-arrow-down"></span>', '/wonderkide/footer/sorting/' . $model->id_footer .'?action=down');
                        },
                    ],
            ]
        ],
    ]); ?>

</div>