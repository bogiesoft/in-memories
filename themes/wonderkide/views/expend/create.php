<?php


?>
<div class="row">
    <div class="col-md-4">
        <?= $this->render('/layouts/_menu_personal') ?>
    </div>
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">เพิ่มบัญชีรายรับ-รายจ่าย</h3>
            </div>
            <div class="panel-body">

                <div class="note-model-create">

                    <?= $this->render('_form', [
                        'model' => $model,
                        'tags' => $tags,
                    ]) ?>

                </div>
            </div>
        </div>
    </div>
</div>