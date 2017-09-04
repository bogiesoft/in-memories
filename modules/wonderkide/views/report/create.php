<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ReportModel */

$this->title = 'Create Report';
$this->params['breadcrumbs'][] = ['label' => 'Report Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>