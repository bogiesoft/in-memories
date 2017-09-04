<?php
use app\components\widgets\LeagueScore;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\components\widgets\MatchOdds;
use app\components\widgets\Ticket;
use app\components\widgets\updateZeny;
use app\components\widgets\Honor;
use app\models\LogGameModel;
        
?>
<section id="game" class="page">
    <div class="container">
        <div class="row">
            <!-- Title Page -->
            <div class="col-md-12">
                <div class="gallery cat-widget animated fadeIn">
                    <div class="widget-title">
                                <h3><a href="<?= Yii::$app->seo->getUrl('games') ?>">GAMES</a></h3>
                                <span class="sub-title">เกมบอลสเต็ป</span>

                                <div class="sep-widget-tri"></div>
                                <div class="clearfix"></div>
                    </div>
                </div>
                <!--<div class="title-page">
                    <h2 class="title">Memory</h2>
                    <h3 class="title-description">บันทึกความทรงจำ</h3>
                </div>-->
            </div>
            <!-- End Title Page -->
            <div class="col-md-8">
                <section id="odds">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          <h3 class="panel-title">Play Game</h3>
                        </div>
                        <div class="panel-body">
                            <?php 

                            if(date("H") >= 12 && date("H") <= 23){
                            if($match){
                                $form = ActiveForm::begin(['action' => '/games/checkmatch']); ?>
                                <?php 
                                if($league){ 
                                    foreach ($league as $id) {
                                        echo MatchOdds::widget(['id_league' => $id->id_league]);
                                    }

                                } ?>
                                <?php 
                                $log = LogGameModel::checkLog(1);
                                if($log){ ?>
                                <div class="pull-right">
                                    <label>จำนวนเงินเดิมพัน</label>
                                    <?php echo Html::textInput('zeny','', ['id' => 'zenybet', 'placeholder' => 'Insert zeny ...','onchange' => 'checkZenyBet(this.value)']); ?>
                                    <?php echo Html::submitButton('Play', ['class' => 'btn btn-danger', /*'onclick' => 'confirmOdds('.json_encode($_POST).')'*/]); ?>
                                </div>
                                <?php } ?>
                                <?php ActiveForm::end(); ?>
                                <div class="clear-float"></div>
                            <?php }
                            else { ?>
                                <div class="no-content">ยังไม่มีโปรแกรมการแข่งขันของวันนี้</div>
                            <?php }

                            }else{ ?>
                                <div class="no-content">เกมเปิดให้เล่นช่วงเวลา 12.00-23.00</div>
                            <?php } ?>
                        </div>
                    </div>

                </section>
                <div class="divider"></div>
                <section id="game-history">

                    <div class="panel panel-default honor">
                        <div class="panel-heading">
                            <h3 class="panel-title">Honor</h3>
                        </div>
                        <div class="panel-body">
                            <article class="max-win">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">ชนะเยอะสุด</h3>
                                    </div>
                                    <div class="panel-body">
                                        <?= Honor::widget(['type' => 'game', 'status' => 'win']); ?>
                                    </div>
                                </div>
                            </article>
                            <article class="max-zeny-win">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">ได้รับเงินเยอะสุด</h3>
                                    </div>
                                    <div class="panel-body">
                                        <?= Honor::widget(['type' => 'zeny', 'status' => 'win']); ?>
                                    </div>
                                </div>
                            </article>
                            <article class="max-lost">
                                <div class="panel panel-danger">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">แพ้เยอะสุด</h3>
                                    </div>
                                    <div class="panel-body">
                                        <?= Honor::widget(['type' => 'game', 'status' => 'lost']); ?>
                                    </div>
                                </div>
                            </article>
                            <article class="max-zeny-lost">
                                <div class="panel panel-danger">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">เสียเงินเยอะสุด</h3>
                                    </div>
                                    <div class="panel-body">
                                        <?= Honor::widget(['type' => 'zeny', 'status' => 'lost']); ?>
                                    </div>
                                </div>
                            </article>
                        </div>
                      </div>
                </section>
            </div>
            <div class="col-md-4">
                <section id="update-zeny">
                    <?= updateZeny::widget(); ?>
                </section>
                <section id="odds-ticket">
                    <?php 
                        $played = LogGameModel::checkPlayed(1, null);
                        //var_dump($played);exit();
                        foreach ($played as $step) {
                            echo Ticket::widget(['log' => $step]);
                        }
                    ?>
                </section>
                <section id="game-rule">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <label>กฎกติกาและวิธีการเล่นเกม</label>
                        </div>
                        <div class="content">
                            <ul>
                                <li>1 IP ท่านสามารถเล่นได้ 3 accountเท่านั้น หากพบมากกว่านั้นจะทำการตัดสิทธิ์ทันที</li>
                                <li>ท่านสามารถเล่นได้ 2 ครั้งใน 1 วัน</li>
                                <li>สเต็ป 1 ใบ สามารถเล่นได้อย่างต่ำ 3 คู่ แต่ไม่เกิน 10 คู่</li>
                                <li>แทงขั้นต่ำ 50 zeny แต่ไม่เกิน 10,000 zeny</li>
                                <li>การคิดเงินจะคูณตามอัตราของทีมที่ชนะ</li>
                                <li>ได้ครึ่ง / เสียครึ่ง คิด 1.4 ทุกกรณี</li>
                                <li> คู่ไหนมีปัญหา ยกเลิกเฉพาะคู่นั้น</li>
                            </ul>
                        </div>
                    </div>
                </section>
                <section id="league-score">
                    <article class="EPL panel panel-info">
                        <div class="panel-heading">
                            <p>English Premier league</p>
                        </div>
                        <div class="content">
                            <?= LeagueScore::widget(['league' => 1]) ?>
                        </div>

                        <?php //echo Html::a('Update', ['test/wtf', 'id' => 0], ['class' => 'label label-default pull-right']) ?>
                    </article>
                    <div class="divider"></div>
                    <article class="LLS panel panel-info">
                        <div class="panel-heading">
                            <p>La Liga Spain</p>
                        </div>
                        <div class="content">
                            <?= LeagueScore::widget(['league' => 2]) ?>
                        </div>
                        <?php //echo Html::a('Update', ['test/wtf', 'id' => 0], ['class' => 'label btn-default btn-sm pull-right']) ?>
                    </article>
                    <div class="divider"></div>
                    <article class="BDL panel panel-info">
                        <div class="panel-heading">
                            <p>Bundes liga Germany</p>
                        </div>
                        <div class="content">
                            <?= LeagueScore::widget(['league' => 3]) ?>
                        </div>
                        <?php //echo Html::a('Update', ['test/wtf', 'id' => 0], ['class' => 'label btn-default btn-sm pull-right']) ?>
                    </article>
                    <div class="divider"></div>
                    <article class="CSA panel panel-info">
                        <div class="panel-heading">
                            <p>Calcio Serie A</p>
                        </div>
                        <div class="content">
                            <?= LeagueScore::widget(['league' => 4]) ?>
                        </div>
                        <?php //echo Html::a('Update', ['test/wtf', 'id' => 0], ['class' => 'label btn-default btn-sm pull-right']) ?>
                    </article>
                </section>
            </div>
        </div>
    </div>
</section>


<script>

    $('#odds').on('beforeSubmit', 'form#w0', function () {
            var form = $(this);
            var post = form.serialize();
            // return false if form still have some validation errors
            if (form.find('.has-error').length) {
                 return false;
            }
            // submit form
            $.ajax({
                 url: form.attr('action'),
                 type: 'post',
                 data: post,
                 success: function (team) {
                    if(!isNaN(team)){
                       alertMessege(team);
                    }
                    else{
                        if(confirm(team+" คลิก OK เพื่อยืนยันการเล่น หรือ Cancel เพื่อยกเลิกการเล่น")){
                            $.ajax({
                                    url: "/games/addmatch",
                                    type: 'post',
                                    data: post,
                                    success: function (status) {
                                       if(!isNaN(status)){
                                            alertMessege(status);
                                         }
                                       else{
                                            alertMessege(999);
                                            window.location.reload();
                                       }
                                    }
                               });
                        }
                    }
                 }
            });
            return false;
});
</script>