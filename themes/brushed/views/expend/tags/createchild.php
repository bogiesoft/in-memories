<?php

use yii\helpers\Html;

?>
<?php $this->beginContent('@app/views/layouts/_tab_personal.php', ['active' => 'expend']); ?>
    <div class="col-md-4">
        <?= $this->render('../_menu') ?>
    </div>
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">เพิ่มรายการย่อย :: <?= $parent->name ?></h3>
            </div>
            <div class="panel-body">
                <div class="tags-custom-model-create">

                    <?= $this->render('_form', [
                        'model' => $model,
                    ]) ?>

                </div>
            </div>
        </div>
    </div>
<?php $this->endContent(); ?>