<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RulesModel */

$this->title = 'Create Rules';
$this->params['breadcrumbs'][] = ['label' => 'Rules Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rules-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>