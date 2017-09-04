<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MatchTicketModel */

$this->title = $model->id_team_odds;
$this->params['breadcrumbs'][] = ['label' => 'Match Ticket Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="match-ticket-model-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_team_odds], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_team_odds], [
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
            'id_team_odds',
            'id_match',
            'id_user',
            'team_selected',
            'update_time',
            'ip_address',
        ],
    ]) ?>

</div>