<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RankModel */

$this->title = 'Create Rank';
$this->params['breadcrumbs'][] = ['label' => 'Rank', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rank-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>