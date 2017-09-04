<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = $league->league_name_en;
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="league-scores-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'league_id',
            'no',
            'team_name',
            'play',
            [ 'attribute' => 'Win', 'format' => 'raw', 'value' => function($data){return $data->h_win+$data->a_win;}],
            [ 'attribute' => 'Draw', 'format' => 'raw', 'value' => function($data){return $data->h_draw+$data->a_draw;}],
            [ 'attribute' => 'Lost', 'format' => 'raw', 'value' => function($data){return $data->h_lost+$data->a_lost;}],
            [ 'attribute' => 'F', 'format' => 'raw', 'value' => function($data){return $data->h_gfor+$data->a_gfor;}],
            [ 'attribute' => 'A', 'format' => 'raw', 'value' => function($data){return $data->h_against+$data->a_against;}],
            // 'h_win',
            // 'h_draw',
            // 'h_lost',
            // 'h_gfor',
            // 'h_against',
            // 'a_win',
            // 'a_draw',
            // 'a_lost',
            // 'a_gfor',
            // 'a_against',
            'goal_dif',
            'point',
            // 'form',
            // 'type',
            // 'group_cup',
            // 'season',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>