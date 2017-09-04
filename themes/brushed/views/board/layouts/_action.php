<?php
?>
<div class="wb-action">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav-pills navbar-right">
                    <li><a class="btn btn-default btn-sm" href="/board/comment/<?= $model->id ?>">ตอบกลับ</a></li>
                    <?php 
                    if($model->id_user == Yii::$app->user->id){ ?>
                        <li><a class="btn btn-default btn-sm" href="/board/edittopic/<?= $model->id ?>"><span class="glyphicon glyphicon-pencil"></span> แก้ไข</a></li>
                    <?php } ?>
                </ul>
            </div>
                
        </div>
            
    </div>
        
</div>