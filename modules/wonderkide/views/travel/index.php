<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TravelSearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Travel Models';
$this->params['breadcrumbs'][] = $this->title;
var_dump(Yii::$app->params['groupMember']['100']);
?>
<div class="travel-model-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('Create Travel Model', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'image',
                'format' => 'html',
                'value' => function($data) {
                    return Html::img('/uploads/img/review/travel/' . $data->image, ['width' => '50']);
                },],
            //'id_travel',
            //'id_user',
            'title',
            'content',
            'rating',
            // 'update_post',
            // 'image',
            /*[
                        'class' => 'yii\grid\DataColumn',
                        'attribute' => 'active',
                        'format' => 'text',
                        'value' => function ($data) {
                            return Yii::$app->params['Active'][$data->active];
                        },
            ],*/
            ['class' => 'yii\grid\ActionColumn',
                        'template' => '{update} {delete}',
                        'buttons' => [
//                            'update' => function ($url, $model) {
 //                               return Html::a('<span class="glyphicon glyphicon-pencil"></span>', '/wonderkide/travel/update/' . $model->id_travel);
 //                           },
                    //'delete' => function ($url, $model) {
 //                       return Html::a('<span class="glyphicon glyphicon-trash"></span>', '/wonderkide/travel/delete/' . $model->id_travel);
 //                   }
                        ]
            ],
            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>