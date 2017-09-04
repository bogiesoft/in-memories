<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\LeagueModel */

$this->title = $model->league_name_en;
$this->params['breadcrumbs'][] = ['label' => 'League Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="league-model-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_league], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_league], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_league',
            'league_name_en',
            'league_name_th',
            'api_get_match',
            'api_get_scores',
            'link_get_odds:ntext',
            'link_get_scores:ntext',
            'link_get_topscore:ntext',
            'link_get_fixt:ntext',
            'link_get_result:ntext',
            'league_img',
        ],
    ]) ?>

</div>