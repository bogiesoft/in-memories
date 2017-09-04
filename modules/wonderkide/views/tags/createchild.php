<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TagsModel */

$this->title = 'เพิ่ม Tags';
$this->params['breadcrumbs'][] = ['label' => 'Tags Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tags-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formchild', [
        'model' => $model,
    ]) ?>

</div>