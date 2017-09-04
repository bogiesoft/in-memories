<?php

use yii\helpers\Html;
use app\models\LeagueModel;
use yii\grid\GridView;
use kartik\widgets\DatePicker;
?>
<div class="match-pull">

    <h1><?= Html::encode('อัพเดทผลการแข่งขัน') ?></h1>
    <?= Html::beginForm() ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="league">กรุณาเลือก league</label>
                    <?= Html::dropDownList('league', $this->params['league_selected'], LeagueModel::getLeagueSelected()) ?>
                </div>
                <div class="form-group">
                    <?php
                    $startDate = time();
                    echo '<label class="control-label">Date</label>';
                    echo DatePicker::widget([
                        'name' => 'date',
                        'type' => DatePicker::TYPE_COMPONENT_APPEND,
                        'value' => date('Y-m-d', strtotime('-1 day', $startDate)),
                        'pluginOptions' => [
                            'autoclose'=>true,
                            'format' => 'yyyy-mm-dd'
                        ]
                    ]);
                    ?>
                </div>

                <?= Html::submitButton('อัพเดท', ['class' => 'btn btn-warning']) ?>
            </div>
        </div>
    </div>
    <?= Html::endForm() ?>
                    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_match',
            //'id_league',
            [
                        'class' => 'yii\grid\DataColumn',
                        'attribute' => 'id_league',
                        'format' => 'text',
                        'value' => function ($data) {
                            return LeagueModel::findOne($data->id_league)->league_name_en;
                        },
            ],
            'home',
            'away',
            'play_time:datetime',
            // 'h_odds',
            // 'a_odds',
            // 'bet',
            // 'bet_team',
            'h_score',
            'a_score',
            // 'comment:ntext',
            //'active',
            [
                        'class' => 'yii\grid\DataColumn',
                        'attribute' => 'active',
                        'format' => 'text',
                        'value' => function ($data) {
                            return Yii::$app->params['matchActive'][$data->active];
                        },
            ],
            
            ['class' => 'yii\grid\ActionColumn',
                        'template' => '{close}{update}',
                        'buttons' => [
                            'close' => function ($url, $model) {
                                return Html::a('<span class="glyphicon glyphicon-remove" style="cursor: pointer" onclick = closeMatch('.$model->id_match.');></span>');
                            },
                    //'delete' => function ($url, $model) {
 //                       return Html::a('<span class="glyphicon glyphicon-trash"></span>', '/wonderkide/travel/delete/' . $model->id_travel);
 //                   }
                        ]
            ],
            
            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>