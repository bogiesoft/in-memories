<?php
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\TagsModel;
?>
<?php $this->beginContent('@app/views/layouts/_tab_personal.php', ['active' => 'expend']); ?>
    <div class="col-md-4">
        <?= $this->render('_menu') ?>
    </div>
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">จัดการรายรับ-รายจ่าย</h3>
            </div>
            <div class="panel-body">
                <div class="note-model-index">
                <p>
                    <?= Html::a('เพิ่ม', ['create'], ['class' => 'btn btn-default']) ?>
                    <?php //echo Html::a('<i class="fa fa-chevron-circle-left" aria-hidden="true"></i> กลับไปหน้ารายละอียด', ['/expend'], ['class' => 'btn btn-warning']) ?>
                </p>
                <div class="table-responsive">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    //'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        /*[
                                    'class' => 'yii\grid\DataColumn',
                                    'attribute' => 'tag',
                                    'format' => 'text',
                                    'value' => function ($data) {
                                        return TagsModel::getTagName($data->tag);
                                    },
                        ],*/
                        'tag',
                        'price',
                        'list',
                        
                        //[ 'attribute' => 'Date', 'format' => 'date', 'value' => function($data){return $data->date;}],
                        [
                                    'class' => 'yii\grid\DataColumn',
                                    'attribute' => 'date',
                                    'format' => 'date',
                                    'value' => function ($data) {
                                        return $data->date;
                                    },
                        ],
                        //'status',
                        //[ 'attribute' => 'Status', 'format' => 'raw', 'value' => function($data){$data->status == 1 ? $stat = 'in come':$stat = 'out come'; return $stat;}],
                        [
                                    'class' => 'yii\grid\DataColumn',
                                    'attribute' => 'status',
                                    'format' => 'text',
                                    'value' => function ($data) {
                                        return Yii::$app->params['in-out'][$data->status];
                                    },
                        ],
                        //['class' => 'yii\grid\ActionColumn'],
                        //[ 'attribute' => 'Overall', 'format' => 'raw', 'value' => function($data){return $data->price*$data->amount;}],
                        ['class' => 'yii\grid\ActionColumn',
                                    'template' => '{update}{delete}',
                                    /*'buttons' => [
                                        'update' => function ($url, $model) {
                                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', '/wonder/editnote/' . $model->id_note);
                                        },
                                        'delete' => function ($url, $model) {
                                            return Html::a('<span class="glyphicon glyphicon-trash"></span>', '/wonder/deletenote/' . $model->id_note);
                                        },
                                    ]*/
                        ],
                    ],
                ]); ?>
                </div>
                </div>
            </div>
        </div>
        
    </div>
<?php $this->endContent(); ?>