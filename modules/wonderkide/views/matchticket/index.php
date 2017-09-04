<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MatchTicketSearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Match Ticket Models';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="match-ticket-model-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Match Ticket Model', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_team_odds',
            'id_match',
            'id_user',
            'team_selected',
            'update_time',
            // 'ip_address',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>