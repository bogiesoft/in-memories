<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserModel */

/*$this->title = 'Update User : ' . ' ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'User Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';*/
?>


<div class="row">
    <div class="col-md-12">
        <div class="user-model-update">
            

            <h1>แก้ไขข้อมูล user</h1>

            <?= $this->render('_edit', [
                'model' => $model,
                'rank' => $rank,
            ]) ?>

        </div>
    </div>
    
</div>