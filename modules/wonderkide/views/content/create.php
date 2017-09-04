<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ContentModel */

$this->title = 'Create Content';
$this->params['breadcrumbs'][] = ['label' => 'Content Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>