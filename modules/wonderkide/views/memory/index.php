<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\UserModel;
use app\models\MemoryModel;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MemorySearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Memory';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="memory-model-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php //echo Html::a('Create Memory Model', ['create'], ['class' => 'btn btn-success']) ?>
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
            'title:ntext',
            //'content:ntext',
                            [
                                    'headerOptions' => ['class' => 'text-center'],
                                    'attribute' => 'content',
                                    'format' => 'raw',
                                    'value' => function ($data) {

                                        return MemoryModel::filterContent($data->content,$length=280);
                                    }
                            ],
            'create_time:datetime',
            // 'update_time',
            // 'image_thumb',
            // 'gallery_tags',
            // 'video_tags',
             'read',
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

            ['class' => 'yii\grid\ActionColumn',
                //'template' => '{update}',
            ],
        ],
    ]); ?>
</div>