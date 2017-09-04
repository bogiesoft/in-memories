<?php
use yii\bootstrap\Modal;

Modal::begin([
    'header' => '<h3>'.$model->name.'</h3>',
    'id' => 'rules-modal',
    //'toggleButton' => ['label' => 'Close'],
]);

echo $model->content;

Modal::end();

$js = <<< JS
$('.rules-modal-button').click( function (e) {
    $('#rules-modal').modal('show');
});

JS;
 
// register your javascript
$this->registerJs($js);