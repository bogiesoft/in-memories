<?php 
use app\components\helpFunction;
if($ticket) { ?>

<div class="panel panel-default">
  <div class="panel-heading">
      <h3 class="panel-title">สเต็ปใบที่ <?= $log->play_count ?> ประจำวันที่ <?= helpFunction::datetime($log->play_date) ?></h3>
  </div>
  <div class="panel-body">
        <table class="table table-striped">
            <tr>
                <th></th>
                <th>home</th>
                <th>Bet</th>
                <th>Away</th>
                <th></th>
            </tr>
            <?php foreach ($ticket as $value) { 
                $team = app\components\widgets\Ticket::getTeam($value->id_match);
            ?>
            
                <tr>
                    <td class="selected-home"><span class="<?= $value->team_selected=='h' ? 'selected':''?>"></span></td>
                    <td class="team-home <?= $team->bet_team=='h' ? 'bet-team':''?>"><?= $team->home ?></td>
                    <td class="match-bet"><?= $team->bet ?></td>
                    <td class="team-away <?= $team->bet_team=='a' ? 'bet-team':''?>"><?= $team->away ?></td>
                    <td class="selected-away"><span class="<?= $value->team_selected=='a' ? 'selected':''?>"></span></td>
                </tr>
            <?php } ?>
                
        </table>
      <div class="ticket-footer">
          <label>Name : <span> <?= Yii::$app->user->identity->username ?></span></label>&nbsp;&nbsp;&nbsp;
          <label>จำนวนคู่ : <span> <?= count($ticket); ?></span></label>&nbsp;&nbsp;&nbsp;
          <label>จำนวนเงิน : <span> <?= $log->zeny ?></span></label>
      </div>
  </div>
</div>

<?php } ?>