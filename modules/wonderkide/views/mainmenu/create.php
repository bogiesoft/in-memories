<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MainMenuModel */

$this->title = 'Create Main Menu';
$this->params['breadcrumbs'][] = ['label' => 'Main Menu Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main-menu-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>