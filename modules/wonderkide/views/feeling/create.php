<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\FeelingCommentModel */

$this->title = 'Create Feeling Comment Model';
$this->params['breadcrumbs'][] = ['label' => 'Feeling Comment Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feeling-comment-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>