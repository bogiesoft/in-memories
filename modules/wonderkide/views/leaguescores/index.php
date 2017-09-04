<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'จัดการตารางคะแนน '.$league->league_name_th;
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    th a{
        //color: #fff;
    }
    tbody{
        color: #000;
    }
    .table-striped > tbody > tr:nth-of-type(2n) {
        background-color: #cccccc;
    }
</style>
<section class="container-fluid">
<div class="league-scores-model-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?php echo Html::a('Top Score', ['/wonderkide/topscore/'.$league->id_league], ['class' => 'btn btn-warning']) ?>
        <?php echo Html::a('Top Assist', ['/wonderkide/topassist/'.$league->id_league], ['class' => 'btn btn-warning']) ?>
    </p>
    <p>
        <?= Html::beginForm() ?>
        <label>Update score league >>> </label>
        <?php //echo Html::dropDownList('league', $this->params['league_selected'], LeagueModel::getLeagueSelected()) ?>
        <?= Html::hiddenInput('league', $league->id_league) ?>
        <?= Html::submitButton('Update', ['class' => 'btn btn-success']) ?>
        <?= Html::endForm() ?>
        <?php //echo Html::a('Update League Scores', ['/wonderkide/leaguescores/upscore/'.$league->id_league], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'league_id',
            //'no',
            'team_name:ntext',
            'play',
             'h_win',
             'h_draw',
             'h_lost',
             'h_gfor',
             'h_against',
             'a_win',
             'a_draw',
             'a_lost',
             'a_gfor',
             'a_against',
             'goal_dif',
             'point',
            // 'form',
            // 'type',
            // 'group_cup',
            // 'season',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
</section>