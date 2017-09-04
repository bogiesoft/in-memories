<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ContactSearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-model-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php //echo Html::a('Create Contact Model', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'email:email',
            'other',
            'subject',
            'body:ntext',
            'create_time:datetime',
            //'ip',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {delete}'],
        ],
    ]); ?>
</div>