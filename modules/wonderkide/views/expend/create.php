<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ExpendModel */

$this->title = 'Create Expend Model';
$this->params['breadcrumbs'][] = ['label' => 'Expend Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expend-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>