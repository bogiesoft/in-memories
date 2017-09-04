<?php
use app\components\widgets\notify;
use yii\widgets\LinkPager;
?>
<?php $this->beginContent('@app/views/layouts/_tab_personal.php', ['active' => 'notify']); ?>
        <div class="col-md-4">
            <?= $this->render('_menu') ?>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">การแจ้งเตือนทั้งหมด</h3>
                </div>
                <div class="panel-body">
                    <?php echo notify::widget(['model'=>$model]); ?>
                    <?php
                        // display pagination
                        echo LinkPager::widget([
                        'pagination' => $pages,
                    ]); ?>
                </div>
                
            </div>
        </div>
<?php $this->endContent(); ?>