<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LogGameSearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Log Game Models';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-game-model-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Log Game Model', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_game_log',
            'id_user',
            'game_type',
            'play_count',
            'zeny',
            // 'play_date',
            // 'play_ip',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>