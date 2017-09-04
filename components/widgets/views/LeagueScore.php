<?php
use yii\bootstrap\Tabs;
use yii\helpers\Html;
if($model){
    $template_head = '';
    $template_foot = '';
    
    $template_EPL = '';
    
    $template_head .= '<table class="table table-bordered league-score-table league-'.$league.'">
    <thead>
        <tr>
            <th>No</th>
            <th>Team</th>
            <th>Play</th>
            <th>Win</th>
            <th>Draw</th>
            <th>Lost</th>
            <th>Point</th>
        </tr>
    </thead>
    <tbody>';
    
    $demode = end($model);
    
    foreach ($model as $score) {
        if($score->no == 1 || $score->no == 2 || $score->no == 3 || $score->no == 4){
            $template_EPL .= '<tr class="league-top4 active">';
        }
        else if($score->no == 5 || $score->no == 6){
            $template_EPL .= '<tr class="league-top56 info">';
        }
        else if($score->no >= ($demode->no -2)){
            $template_EPL .= '<tr class="league-danger danger">';
        }
        else{
            $template_EPL .= '<tr class="league-normal">';
        }
        
        $template_EPL .=       '<td>'.$score->no.'</td>
                        <td>'.$score->team_name.'</td>
                        <td>'.$score->play.'</td>
                        <td>'.($score->h_win+$score->a_win).'</td>
                        <td>'.($score->h_draw+$score->a_draw).'</td>
                        <td>'.($score->h_lost+$score->a_lost).'</td>
                        <td>'.$score->point.'</td>
                   </tr>';
    }
    $template_foot .= '</tbody></table>';
    $template_foot .= '<div class="link-more">';
    $template_foot .= Html::a(" -- More -- ", ["games/league", "id" => $league], ["class" => "label btn-warning pull-right"]);
    $template_foot .= '</div>';
    $template_foot .= '<div class="clear-float"></div>';
    
    $content_EPL = $template_head.$template_EPL.$template_foot;
    
echo Tabs::widget([
    'items' => [
        [
            'label' => 'Tables',
            'content' => $content_EPL,
            'active' => true,
            //'options' => ['class' => 'eng-epl'],
        ],
        [
            'label' => 'Top Scores',
            'content' => $topScore,
            //'options' => ['id' => 'myveryownID'],
        ],
        [
            'label' => 'Top Assists',
            'content' => $topAssist,
            //'options' => ['id' => 'myveryownID'],
        ],
        /*[
            'label' => 'Example',
            'url' => 'http://www.example.com',
        ],*/
        /*[
            'label' => 'Dropdown',
            'items' => [
                 [
                     'label' => 'DropdownA',
                     'content' => 'DropdownA, Anim pariatur cliche...',
                 ],
                 [
                     'label' => 'DropdownB',
                     'content' => 'DropdownB, Anim pariatur cliche...',
                 ],
            ],
        ],*/
    ],
]); 
}
else{
    echo 'No Data';
}
?>