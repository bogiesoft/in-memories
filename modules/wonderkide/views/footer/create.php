<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\FooterModel */

$this->title = 'เพิ่ม Footer ใหม่';
$this->params['breadcrumbs'][] = ['label' => 'Footer Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="footer-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>