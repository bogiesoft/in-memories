<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SettingModel */

$this->title = 'Update Setting Model: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Setting Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="setting-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>