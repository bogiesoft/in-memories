<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SettingModel */

$this->title = 'Create Setting Model';
$this->params['breadcrumbs'][] = ['label' => 'Setting Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setting-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>