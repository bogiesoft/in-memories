<?php

?>
<?php $this->beginContent('@app/views/layouts/_tab_personal.php', ['active' => 'gallery']); ?>
    <div class="col-md-4">
        <?= $this->render('_menu') ?>
    </div>
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">จัดการแกลอรี่</h3>
            </div>
            <div class="panel-body">
                <?php 
                if($initialPreview && $initialPreviewConfig){
                    echo $this->render('_form', [ 
                            'model' => $model, 
                            'initialPreview'=>$initialPreview, 
                            'initialPreviewConfig'=>$initialPreviewConfig,
                            'gallery' => $gallery,
                            'active' => $active,
                        ]);
                }else { ?>
                <div class="photo-library-manage">
                    <?= $this->render('_form', [
                        'model' => $model,
                        'initialPreview'=>[],
                        'initialPreviewConfig'=>[],
                        'gallery' => $gallery,
                        'active' => $active,
                    ]) ?>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php $this->endContent(); ?>
