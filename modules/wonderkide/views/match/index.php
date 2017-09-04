<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MatchSearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Match Models';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="match-model-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Match Model', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_match',
            //'id_league',
            'home',
            'away',
            'play_time',
            // 'h_odds',
            // 'a_odds',
            // 'bet',
            // 'bet_team',
            'h_score',
            'a_score',
            // 'comment:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>