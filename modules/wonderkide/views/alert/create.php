<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AlertModel */

$this->title = 'Create Alert Model';
$this->params['breadcrumbs'][] = ['label' => 'Alert Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alert-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>