<?php
use yii\grid\GridView;
use yii\helpers\Url;
?>
<script>
    function selectLeague(id){
        //var urlTicket = "<?php //echo $this->createUrl('/admin/default/selectleague') ?>/?id="+id;
        var urlTicket = "<?php echo Url::to(['match/selectleague']); ?>?id="+id;
        $.ajax({
            type: "GET",
            url: urlTicket,
            cache: false,
            success: function(msg){
                if(msg==1)
                    window.location.reload();
            }
        });
    }
</script>

<section>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_league',
            'league_name_en',
            'league_name_th',
            //'api_get_match',
            //'api_get_scores',
            'link_get_odds:ntext',
            // 'link_get_topscore:ntext',
            // 'link_get_fixt:ntext',
            // 'link_get_result:ntext',
            // 'league_img',

            //['class' => 'yii\grid\ActionColumn'],
            [
            'class' => 'yii\grid\CheckboxColumn',
                'checkboxOptions' => function ($model, $key, $index, $column) {
                    if($model->active == 1){$check = 'checked';}else{$check = '';}
                    return [/*'value' => $model->active,*/ 'checked' => $check, "onchange"=>"selectLeague($model->id_league)"];
                }
            // you may configure additional properties here
            ],
        ],
    ]); ?>
</section>