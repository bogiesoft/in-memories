<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ContactModel */

$this->title = 'Create Contact';
$this->params['breadcrumbs'][] = ['label' => 'Contact Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>