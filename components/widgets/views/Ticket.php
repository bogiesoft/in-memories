<?php 
use app\components\helpFunction;
if($ticket) { ?>

<div class="panel panel-default">
  <div class="panel-heading">
      <h3 class="panel-title">สเต็ปใบที่ <?= $log->play_count ?> ประจำวันที่ <?= helpFunction::datetime($log->play_date) ?></h3>
  </div>
  <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped ticket">
                <tr>
                    <th></th>
                    <th>home</th>
                    <th>Bet</th>
                    <th>Away</th>
                    <th></th>
                    <?php if($history): ?>
                    <th>Score</th>
                    <?php endif; ?>
                </tr>
                <?php foreach ($ticket as $value) { 
                    $team = app\components\widgets\Ticket::getTeam($value->id_match);
                    if($history){
                        if($value->rate == -1){
                            $theme = 'ticket-danger';
                        }
                        else if($value->rate == -1.4){
                            $theme = 'ticket-warning';
                        }
                        else if($value->rate == 0 || $value->rate == 1){
                            $theme = 'ticket-none';
                        }
                        else if($value->rate == 1.4){
                            $theme = 'ticket-half-success';
                        }
                        else{
                            $theme = 'ticket-success';
                        }
                    }
                ?>

                    <tr <?php if(isset($theme)){echo 'class="'.$theme.'"';} ?>>
                        <td class="selected-home"><span class="<?= $value->team_selected=='h' ? 'selected':''?>"></span></td>
                        <td class="team-home <?= $team->bet_team=='h' ? 'bet-team':''?>"><?= $team->home ?></td>
                        <td class="match-bet"><?= $team->bet ?></td>
                        <td class="team-away <?= $team->bet_team=='a' ? 'bet-team':''?>"><?= $team->away ?></td>
                        <td class="selected-away"><span class="<?= $value->team_selected=='a' ? 'selected':''?>"></span></td>
                        <?php if($history): ?>
                        <td><?= $team->h_score ?> : <?= $team->a_score ?></td>
                        <?php endif; ?>
                    </tr>
                <?php } ?>

            </table>
        </div>
      <div class="ticket-footer">
            <label>Name : <span> <?= Yii::$app->user->identity->username ?></span></label>&nbsp;&nbsp;&nbsp;
            <label>จำนวนคู่ : <span> <?= count($ticket); ?></span></label>&nbsp;&nbsp;&nbsp;
            <label>จำนวนเงิน : <span> <?= $log->zeny ?></span></label>
            <?php if($history): ?>
            &nbsp;&nbsp;&nbsp;<label>สรุปผล : <?php if($log->status > 0){echo "ชนะ";}else if($log->status == 0){echo "ยังไม่ได้ตรวจสอบ";}else{echo "แพ้";} ?></label>
            &nbsp;&nbsp;&nbsp;<label>ได้รับเงิน : <?= $log->status == 1 ? app\components\widgets\Ticket::getZeny($log->id_game_log)." zeny":"0" ?></label>
            <?php endif; ?>
      </div>
  </div>
</div>

<?php } ?>