
<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ExpSearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Exp';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exp-model-index">

    
    <h1><?= Html::encode($this->title) ?></h1>
    <h4>จัดการค่าประสบการณ์ที่จะเพิ่มให้จากการทำภารกิจต่างๆ</h4>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Exp', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'category',
            'exp',
            'count_bonus',
            'exp_bonus',
            // 'other',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>