<?php
use app\models\BoardNotiCommentModel;

$this->params['breadcrumbs'][] = ['label' => 'Webboard', 'url' => ['/board']];
$this->params['breadcrumbs'][] = 'ประวัติการแจ้งเตือน';
?>
<?php
    echo Yii::$app->controller->renderPartial('layouts/_header',[]);
?>
<div class="wb-action">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3>ประวัติการแจ้งเตือน</h3>
            </div>
        </div>
    </div>
</div>
<div class="wb-comment-history">
        <div class="row">
            <div class="col-md-12">
                <div class="list-group">
                    <?= BoardNotiCommentModel::genNotiComment(); ?>
                </div>
            </div>
        </div>
</div>