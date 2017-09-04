<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\GalleryImagesModel */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Gallery Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-images-model-view">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <?php echo Html::img($image, ['class' => 'img-responsive','style' => 'max-width:300px;margin-bottom:20px']) ?>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_gallery',
            'ref',
            'title',
            'detail',
            'file_name',
            'real_name',
            'path',
            'sorting',
        ],
    ]) ?>

</div>