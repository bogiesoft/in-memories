<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\LikeDataModel */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Like Data Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="like-data-model-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
            'id_user',
            'id_like_cat',
            'like_value',
            'main_category',
            'sub_category',
            'create_date',
        ],
    ]) ?>

</div>