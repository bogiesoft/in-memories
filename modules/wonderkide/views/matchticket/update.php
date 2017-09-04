<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MatchTicketModel */

$this->title = 'Update Match Ticket Model: ' . ' ' . $model->id_team_odds;
$this->params['breadcrumbs'][] = ['label' => 'Match Ticket Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_team_odds, 'url' => ['view', 'id' => $model->id_team_odds]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="match-ticket-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>