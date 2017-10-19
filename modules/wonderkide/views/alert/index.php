<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NewsSearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Alert Models';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alert-model-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Alert Model', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_user',
            'title',
            'content',
            'theme',
            // 'show_date',
            // 'create_time',
            // 'update_time',
            // 'read',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>