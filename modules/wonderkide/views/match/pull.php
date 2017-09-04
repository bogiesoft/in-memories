<?php

use yii\helpers\Html;
use app\models\LeagueModel;

?>
<div class="match-pull">

    <h1><?= Html::encode('จัดการข้อมูลตารางการแข่งขันวันนี้') ?></h1>

    <p>

    </p>
    <?php /*
    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($leagueModel, 'status')->dropDownList(['1' => 'IN', '-1' => 'OUT']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Addnote' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
     * 
     */ ?>
    <?= Html::beginForm() ?>
                    <label>กรุณาเลือก league</label>
                    <?= Html::dropDownList('league', $this->params['league_selected'], LeagueModel::getLeagueSelected()) ?>
                    <?= Html::submitButton('ดึงข้อมูล', ['class' => 'btn btn-warning']) ?>
                    <?= Html::endForm() ?>
</div>