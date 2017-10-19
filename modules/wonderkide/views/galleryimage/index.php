<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GalleryImagesSearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gallery Images';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-images-model-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php //echo Html::a('Create Gallery Images Model', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'id_gallery',
            'ref',
            'title',
            'detail',
            // 'file_name',
            // 'real_name',
             //'path',
            [
                'attribute' => 'path',

                'headerOptions' => ['class' => 'text-center'],
                'format' => 'html',
                'value' => function($data) {
                    return Html::img($data->path.$data->real_name, ['class' => 'img-responsive']);
                },
            ],
             'sorting',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>