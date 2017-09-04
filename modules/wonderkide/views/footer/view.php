<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\FooterModel */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Footer Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="footer-model-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_footer], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_footer], [
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
            'id_footer',
            'type',
            'title',
            'detail_1',
            'detail_2',
            'detail_3',
            'url:url',
            'active',
        ],
    ]) ?>

</div>