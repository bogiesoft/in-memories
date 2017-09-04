<?php
use app\components\widgets\notify;

?>
<section class="notify-page">
    <div class="row">
        <div class="col-md-4">
            <?= $this->render('/layouts/_menu_personal') ?>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">การแจ้งเตือนทั้งหมด</h3>
                </div>
                <div class="panel-body">
                    <?php echo notify::widget([]); ?>
                </div>
                
            </div>
        </div>
    </div>
</section>