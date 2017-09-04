<?php
if($model){
    $column = 12 / count($model);
    //var_dump($column);
?>

<div class="row">
    <?php    foreach ($model as $row) { ?>    
            <div class="col-md-<?= $column ?> column">
                <div class="<?= $row->type ?>">
                    <h3 class="title text-center"><?= $row->title ?></h3>
                    <div class="content"><?= $row->detail_1 ?></div>
                    <?php 
                    if($row->detail_2){ ?>
                        <div class="content"><?= $row->detail_2 ?></div>
                    <?php } ?>
                    <?php 
                    if($row->detail_3){ ?>
                        <div class="content"><?= $row->detail_3 ?></div>
                    <?php } ?>
                </div>
            </div>
    <?php } ?>
</div>
<?php } ?>
