<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LogExpSearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Log Exp';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-exp-model-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Exp', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_user',
            //'id_admin',
            'id_cat',
            'category',
            // 'detail',
            'exp',
            'create_time',
            'active',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update}',
            ],
        ],
    ]); ?>
</div>