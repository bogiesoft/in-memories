<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LeagueSearchModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="league-model-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_league') ?>

    <?= $form->field($model, 'league_name_en') ?>

    <?= $form->field($model, 'league_name_th') ?>

    <?= $form->field($model, 'api_get_match') ?>

    <?= $form->field($model, 'api_get_scores') ?>

    <?php // echo $form->field($model, 'link_get_scores') ?>

    <?php // echo $form->field($model, 'link_get_topscore') ?>

    <?php // echo $form->field($model, 'link_get_fixt') ?>

    <?php // echo $form->field($model, 'link_get_result') ?>

    <?php // echo $form->field($model, 'league_img') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>