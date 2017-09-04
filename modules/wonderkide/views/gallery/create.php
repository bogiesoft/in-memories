<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\GalleryModel */

$this->title = 'Create Gallery Model';
$this->params['breadcrumbs'][] = ['label' => 'Gallery Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>