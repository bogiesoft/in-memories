<?php

?>
<?php $this->beginContent('@app/views/layouts/_tab_personal.php', ['active' => 'gallery']); ?>
    <div class="col-md-4">
        <?= $this->render('_menu') ?>
    </div>
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">เพิ่มแกลอรี่</h3>
            </div>
            <div class="panel-body">
                <?php 
                if($initialPreview && $initialPreviewConfig){
                    echo $this->render('_step', [ 
                            'model' => $model, 
                            'initialPreview'=>$initialPreview, 
                            'initialPreviewConfig'=>$initialPreviewConfig,
                            'gallery' => $gallery,
                            'active' => $active,
                            'uploaded' => $uploaded,
                        ]);
                }else { ?>
                <div class="photo-library-manage">
                    <?= $this->render('_step', [
                        'model' => $model,
                        'initialPreview'=>[],
                        'initialPreviewConfig'=>[],
                        'gallery' => $gallery,
                        'active' => $active,
                        'uploaded' => $uploaded,
                    ]) ?>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php $this->endContent(); ?>
