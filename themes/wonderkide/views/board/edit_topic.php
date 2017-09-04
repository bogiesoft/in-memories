<?php

$this->title = 'แก้ไขข้อมูล "'. $model->title .'"';
$this->params['breadcrumbs'][] = ['label' => 'Webboard', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['/board/topic/' . $model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="board-model-create">

    <?= $this->render('layouts/_form_topic', [
        'model' => $model,
    ]) ?>

</div>