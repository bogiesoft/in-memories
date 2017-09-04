<?php

$this->title = 'แก้ไข Comment';
$this->params['breadcrumbs'][] = ['label' => 'Webboard', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $topic->title, 'url' => ['/board/topic/' . $topic->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="board-model-create">

    <?= $this->render('layouts/_form_comment', [
        'model' => $model,
    ]) ?>

</div>