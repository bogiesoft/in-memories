<?php
use yii\helpers\Html;
use yii\grid\GridView;

?>
<?php $this->beginContent('@app/views/layouts/_tab_personal.php', ['active' => 'alert']); ?>
    <div class="col-md-4">
        <?= $this->render('_menu') ?>
    </div>
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">ข้อความแจ้งเตือน</h3>
            </div>
            <div class="panel-body">
                <section class="memo-alert">
                        <p>
                            <?= Html::a('เพิ่ม', ['create'], ['class' => 'btn btn-default']) ?>
                        </p>
                        <div class="table-responsive">
                        <?php echo GridView::widget([
                            'dataProvider'=> $dataProvider,
                            'filterModel' => $searchModel,
                            //'responsive'=>true,
                            //'hover'=>true,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                                [
                                    'attribute' => 'title',
                                    'headerOptions' => ['class' => 'text-center']
                                ],
                                [
                                    'attribute' => 'content',
                                    //'contentOptions' => ['class' => 'text-center'],
                                    'headerOptions' => ['class' => 'text-center']
                                ],
                                [
                                    'attribute' => 'theme',

                                    'headerOptions' => ['class' => 'text-center'],
                                    'format' => 'html',
                                    'value' => function($data) {
                                        //return '<div class="alert-theme '.$data->theme.'" wtf="alert-theme '.$data->theme.'">'.$data->theme.'</div>';
                                        return Html::tag('div', Html::encode($data->theme), ['class' => 'alert-theme '.$data->theme]);
                                    },
                                ],
                                [
                                    'headerOptions' => ['class' => 'text-center'],
                                    'attribute' => 'show_date',
                                    'format' => ['date', 'php:d M Y']
                                ],


                                [
                                    'headerOptions' => ['class' => 'text-center'],
                                    'attribute' => 'read',
                                    'format' => 'raw',
                                    'value' => function ($data) {
                                        $checked = $data->read == 1 ? "checked":"";
                                        return '<div class="squaredThree'.$data->id.'">'
                                                    . '<input type="checkbox" value="None" id="squaredThree'.$data->id.'" name="check" '.$checked.' />'
                                                    . '<label title="ทำเครื่องหมายว่าอ่านแล้ว" class="read-checked" data-selected="'.$data->id.'" data-action="alert" for="squaredThree'.$data->id.'"></label>'

                                                . '</div>';
                                    }
                                ],
                                ['class' => 'yii\grid\ActionColumn',
                                        'template' => '{update} {delete}',
                                ],
                            ],
                        ]); ?>
                        </div>
                </section>
            </div>
        </div>
    </div>
<?php $this->endContent(); ?>

