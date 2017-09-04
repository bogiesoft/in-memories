<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\GalleryImagesModel */

$this->title = 'Create Gallery Images';
$this->params['breadcrumbs'][] = ['label' => 'Gallery Images Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-images-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>