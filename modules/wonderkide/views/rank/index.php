<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RankSearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rank';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rank-model-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <h4>ระดับ Rank ของสมาชิก</h4>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Rank', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'name_th',
            'detail',
            'exp',
            'icon',
            'permission',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>