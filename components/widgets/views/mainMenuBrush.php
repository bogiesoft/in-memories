<?php

foreach ($model as $row) {
    echo $row;
}
?>
<?php
$js = <<< JS
$(".user-notify-badge").on("click", function() {
    if($(this).find('.notify-badge').length > 0){
        var id = $(this).attr('for');
        clearusernotify(id); //call in wd
    }
});

JS;
 
// register your javascript
$this->registerJs($js);