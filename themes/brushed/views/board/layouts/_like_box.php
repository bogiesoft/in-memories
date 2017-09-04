<?php
use rmrevin\yii\fontawesome\FA;
rmrevin\yii\fontawesome\AssetBundle::register($this);

$path = str_replace("app\models\\","",get_class($model));
$model = str_replace("Model","",$path);
$cat = str_replace("Board","",$model);
var_dump(strtolower($cat));exit();

?>
<ul class="nav-pills navbar-right list-style-none">
    <li><a class="btn-like-style btn-like"><?= FA::i('thumbs-up') ?><span class="badge">49</span></a></li>
    <li><a class="btn-like-style btn-unlike"><?= FA::i('thumbs-down') ?><span class="badge">245</span></a></li>
</ul>

