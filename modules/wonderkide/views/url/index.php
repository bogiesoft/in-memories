<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UrlSearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'จัดการ Url และ meta tag';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="url-model-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เพิ่ม', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'realpath:ntext',
            'url:ntext',
            'pagetitle:ntext',
            'keywords:ntext',
            'description:ntext',
            // 'editable',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
            ],
        ],
    ]); ?>
</div>

<!--<div class="checkboxSlide">  
    <input type="checkbox" value="None" id="checkboxSlide" name="check" checked />
    <label for="checkboxSlide"></label>
</div>-->