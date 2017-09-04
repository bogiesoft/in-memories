<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ExpModel */

$this->title = 'Create Exp';
$this->params['breadcrumbs'][] = ['label' => 'Exp Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exp-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>