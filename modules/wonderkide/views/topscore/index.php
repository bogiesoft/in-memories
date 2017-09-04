<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LeagueTopScoreSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'League Top Score';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="league-top-score-model-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('League Score', ['/wonderkide/leaguescores/'.$league->id_league], ['class' => 'btn btn-warning']) ?>
        <?php echo Html::a('Top Assist', ['/wonderkide/topassist/'.$league->id_league], ['class' => 'btn btn-warning']) ?>
    </p>
    <p>
        <?= Html::beginForm() ?>
        <label>Update Top score >>> </label>
        <?= Html::hiddenInput('league', $league->id_league) ?>
        <?= Html::submitButton('Update', ['class' => 'btn btn-success']) ?>
        <?= Html::endForm() ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_top_score',
            //'id_league',
            'rank',
            'player',
            'team',
            'goal',
            // 'season',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>