<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LogRankSearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Log Rank';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-rank-model-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <h4>ประวิติการปรับเลื่อนยศ</h4>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php //echo Html::a('Create Log Rank Model', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'id_user',
            'id_admin',
            'rank',
            'rank_up',
            'create_date',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>