<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MatchModel */

$this->title = $model->id_match;
$this->params['breadcrumbs'][] = ['label' => 'Match Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="match-model-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_match], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_match], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_match',
            'id_league',
            'home',
            'away',
            'play_time',
            'h_odds',
            'a_odds',
            'bet',
            'bet_team',
            'h_score',
            'a_score',
            'comment:ntext',
        ],
    ]) ?>

</div>