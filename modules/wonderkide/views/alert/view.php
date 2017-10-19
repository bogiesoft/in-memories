<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AlertModel */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Alert Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alert-model-view">

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
            'title',
            'content',
            'theme',
            'show_date',
            'create_time',
            'update_time',
            'read',
        ],
    ]) ?>

</div>