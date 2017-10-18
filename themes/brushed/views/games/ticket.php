<?php
use app\components\widgets\Ticket;
?>
<?php $this->beginContent('@app/views/layouts/_tab_personal.php', ['active' => 'games']); ?>
        <div class="col-md-4">
            <?= $this->render('_menu') ?>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">สเต็ป ID ::: <?= $log->id_game_log ?></h3>
                </div>
                <div class="panel-body">
                    <section class="games-ticket">
                        <div class="table-responsive">
                            <?= Ticket::widget(['log' => $log, 'history' => true]); ?>
                        </div>
                    </section>
                </div>
                
            </div>
        </div>
<?php $this->endContent(); ?>