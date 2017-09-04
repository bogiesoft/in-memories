<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LeagueScoresModel */

$this->title = 'แก้ไขข้อมูลทีม: ' . ' ' . $model->team_name;
$this->params['breadcrumbs'][] = ['label' => 'League Scores Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<section class="container-fluid">
    <div class="row">
        <div class="col-md-3 col-sm-5 col-xs-12">
            <div class="league-scores-model-update">

                <h1><?= Html::encode($this->title) ?></h1>

                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>

            </div>
        </div>
    </div>
        
</section>