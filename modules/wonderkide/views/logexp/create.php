<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LogExpModel */

$this->title = 'Create Exp';
$this->params['breadcrumbs'][] = ['label' => 'Log Exp Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-exp-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>