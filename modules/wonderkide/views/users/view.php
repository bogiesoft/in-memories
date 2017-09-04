<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\components\helpFunction;

/* @var $this yii\web\View */
/* @var $model app\models\MatchModel */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Match Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="match-model-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['editusr', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
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
            'id_rank',
            'username',
            'email',
            'nickname',
            'status',
            [
                'format'=>'text',
                //'label' => 'color',
                'attribute' => 'created_at',
                'value' => helpFunction::dateTimeMinute(date("Y-m-d h:i:s",$model->created_at))
            ],
            [
                'format'=>'text',
                //'label' => 'color',
                'attribute' => 'updated_at',
                'value' => helpFunction::dateTimeMinute(date("Y-m-d h:i:s",$model->updated_at))
            ],
            'post_point',
            'permission',
            'zeny',
            'ip',
        ],
    ]) ?>

</div>