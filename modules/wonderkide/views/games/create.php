<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LogGameModel */

$this->title = 'Create Log Game Model';
$this->params['breadcrumbs'][] = ['label' => 'Log Game Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-game-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>