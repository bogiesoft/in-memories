<?php
use yii\helpers\Html;
use yii\grid\GridView;
?>
<?php $this->beginContent('@app/views/layouts/_tab_personal.php', ['active' => 'games']); ?>
        <div class="col-md-4">
            <?= $this->render('_menu') ?>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">ประวัติการเล่นเกม</h3>
                </div>
                <div class="panel-body">
                    <section class="games-history">
                        <div class="table-responsive">
                            <?= GridView::widget([
                                'dataProvider' => $dataProvider,
                                'filterModel' => $searchModel,
                                'columns' => [
                                    //['class' => 'yii\grid\SerialColumn'],

                                    //'game_type',
                                    'zeny',
                                    //'play_date',
                                    [
                                        'headerOptions' => ['class' => 'text-center'],
                                        'attribute' => 'play_date',
                                        'format' => ['date', 'php:d M Y']
                                    ],
                                    //'status',
                                    [
                                        'attribute' => 'status',

                                        'headerOptions' => ['class' => 'text-center'],
                                        'format' => 'html',
                                        'value' => function($data) {
                                            $label = 'default';
                                            $text = 'None';
                                            if($data->status==-1){
                                                $label = 'danger';
                                                $text = 'แพ้';
                                            }
                                            if($data->status==0){
                                                $label = 'info';
                                                $text = 'เดิมพัน';
                                            }
                                            if($data->status==1){
                                                $label = 'success';
                                                $text = 'ชนะ';
                                            }
                                            //return '<div class="alert-theme '.$data->theme.'" wtf="alert-theme '.$data->theme.'">'.$data->theme.'</div>';
                                            return Html::tag('div', '<span class="label label-'.$label.'">'.$text.'</span>', ['class' => 'status-theme text-center']);
                                        },
                                    ],

                                    ['class' => 'yii\grid\ActionColumn',
                                    'template' => '{view}',
                                    'buttons' => [
                                        'view' => function ($url, $model) {
                                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', '/games/ticket/' . $model->id_game_log);
                                        },
                                    ]
                            ],
                                ],
                            ]); ?>
                        </div>
                    </section>
                </div>
                
            </div>
        </div>
<?php $this->endContent(); ?>