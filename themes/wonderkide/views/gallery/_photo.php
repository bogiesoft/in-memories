<?php
use yii\helpers\Url;
use kartik\widgets\FileInput;
?>

<?=
FileInput::widget([
                   'name' => 'upload_ajax[]',
                   'options' => ['multiple' => true,'accept' => 'image/*'], //'accept' => 'image/*' หากต้องเฉพาะ image
                    'pluginOptions' => [
                        'overwriteInitial'=>false,
                        'initialPreviewShowDelete'=>true,
                        'initialPreview'=> $initialPreview,
                        'initialPreviewConfig'=> $initialPreviewConfig,
                        'uploadUrl' => Url::to(['/gallery/upload-ajax']),
                        'uploadExtraData' => [
                            'ref' => $model->ref,
                            'id' => $model->id,
                        ],
                        'maxFileCount' => 100,
                    ]
]);
?>