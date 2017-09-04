<?php 
use kartik\select2\Select2;
use app\models\LogGameModel;
use app\components\helpFunction;

$log = LogGameModel::checkLog(1);

if($match) { ?>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><?= $league->league_name_en ?></h3>
  </div>
  <div class="panel-body">

        <table class="table table-striped">
            <tr>
                <th>Home</th>
                <th class="hidden-xs">home odds</th>
                <th>Bet</th>
                <th class="hidden-xs">Away odds</th>
                <th>Away</th>
                <?php if($log){ ?>
                <th>Play game</th>
                <?php } ?>
            </tr>
            <?php foreach ($match as $value) { 
                ?>
                
                <tr>

                    <td class="team-home <?= $value->bet_team=='h' ? 'bet-team':''?>"><?= $value->home ?></td>
                    <td class="odds-home hidden-xs"><?= $value->h_odds ?></td>
                    <td class="match-bet"><?= helpFunction::convertBet($value->bet) ?></td>
                    <td class="odds-away hidden-xs"><?= $value->a_odds ?></td>
                    <td class="team-away <?= $value->bet_team=='a' ? 'bet-team':''?>"><?= $value->away ?></td>

                    <?php if($log){ ?>
                    <td class="team-selected">
                        <?php $data = [$value->id_match.'_h' => $value->home, $value->id_match.'_a' => $value->away];
                            echo Select2::widget([
                            'name' => $value->id_match,
                            //'value' => '',
                            'data' => $data,
                            'options' => ['placeholder' => 'Selected'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]); ?>
                    </td>
                    <?php } ?>
                </tr>
            <?php }?>
        </table>

  </div>
</div>

<?php } 
else{ /* ?>
    <div class="no-content">ยังไม่มีแมตช์การแข่งขันของวันนี้ โปรดลองตรวจสอบใหม่ภายหลัง</div>
<?php */}  ?>