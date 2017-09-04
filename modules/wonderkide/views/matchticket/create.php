<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MatchTicketModel */

$this->title = 'Create Match Ticket Model';
$this->params['breadcrumbs'][] = ['label' => 'Match Ticket Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="match-ticket-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>