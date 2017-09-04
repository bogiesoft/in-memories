<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LeagueSearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'จัดการ League';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="league-model-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create League Model', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_league',
            'league_name_en',
            'league_name_th',
            'api_get_match',
            'api_get_scores',
            // 'link_get_scores:ntext',
            // 'link_get_topscore:ntext',
            // 'link_get_fixt:ntext',
            // 'link_get_result:ntext',
            // 'league_img',

            //['class' => 'yii\grid\ActionColumn'],
            ['class' => 'yii\grid\ActionColumn',
                        'template' => '{child} {update} {delete}',
                        'buttons' => [
                            'child' => function ($url, $model) {
                                return Html::a('<span class="glyphicon glyphicon-list"></span>', '/wonderkide/leaguescores/' . $model->id_league, [ 'title' => Yii::t('app', 'League table')]);
                            },
                        ]
            ],
        ],
    ]); ?>

</div>