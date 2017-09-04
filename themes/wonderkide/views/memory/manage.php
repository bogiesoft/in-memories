<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\GalleryModel;
use app\models\MemoryModel;

?>
<div class="row">
    <div class="col-md-4">
        <?= $this->render('/layouts/_menu_personal') ?>
    </div>
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">กล่องความทรงจำ</h3>
            </div>
            <div class="panel-body">
                <div class="memory-model-index">

                    <!--<h2>กล่องความทรงจำ</h2>-->

                    <p>
                        <?= Html::a('เพิ่ม', ['create'], ['class' => 'btn btn-default']) ?>
                    </p>
                    <div class="table-responsive">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'title:ntext',
                            //'content:html',
                            /*[
                                    'headerOptions' => ['class' => 'text-center'],
                                    'attribute' => 'content',
                                    'format' => 'raw',
                                    'value' => function ($data) {

                                        return MemoryModel::filterContent($data->content,$length=280);
                                    }
                            ],*/
                            'create_time:datetime',

                            /*[
                                    'headerOptions' => ['class' => 'text-center'],
                                    'attribute' => 'gallery_tags',
                                    'format' => 'raw',
                                    'value' => function ($data) {

                                        return GalleryModel::getNameByTags($data->gallery_tags);
                                    }
                            ],*/
                            // 'video_tags',
                            'read',
                            //'show',

                            ['class' => 'yii\grid\ActionColumn',
                                'template' => '{update} {delete}',
                            ],
                        ],
                    ]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>