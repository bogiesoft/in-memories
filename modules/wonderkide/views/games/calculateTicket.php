<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\date\DatePicker;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel app\models\LogGameSearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'จัดการบอลสเต็ป';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-game-model-index">

    <h1><?= Html::encode($this->title) ?></h1>

        <?php //echo Html::a('คำนวณผลสเต็ป', ['calculateticket?update=update'], ['class' => 'btn btn-success','type' => 'submit','name' => 'submit','value' => 'submit']) ?>
        <?php $form = ActiveForm::begin(); ?>

        <?php /*echo $form->field($model, 'date')->widget(\yii\jui\DatePicker::classname(), [
            'dateFormat' => 'yyyy-MM-dd',
        ]) */?>
        <div class="row">
            
            <div class="col-md-3">
            <?php
                    // usage without model
            //echo '<label>วันที่รับสเต็ป</label>';
            echo DatePicker::widget([
                'name' => 'date', 
                'value' => date('Y-m-d', strtotime('-1 days')),
                'options' => ['placeholder' => 'Select issue date ...'],
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true
                ]
            ]);
            ?>
            </div>

            <div class="col-md-3">
                <?= Html::submitButton('คำนวณผลสเต็ป', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    <hr>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_game_log',
            'id_user',
            //'game_type',
            'play_count',
            'zeny',
            'play_date',
            // 'play_ip',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>