<?php

$this->title = 'สร้างกระทู้ใหม่';
$this->params['breadcrumbs'][] = ['label' => 'Webboard', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="board-model-create">

    <?= $this->render('layouts/_form_topic', [
        'model' => $model,
    ]) ?>

</div>