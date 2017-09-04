<?php
use app\models\UserModel;
use app\components\helpFunction;

//$this->title = 'กระทู้หมวดทั่วไป';
//$this->params['breadcrumbs'][] = ['label' => 'Webboard', 'url' => ['/board']];
//$this->params['breadcrumbs'][] = ['label' => 'Sample Post', 'url' => ['post/edit', 'id' => 1]];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
    echo Yii::$app->controller->renderPartial('layouts/_header',[]);
    //echo Yii::$app->controller->renderPartial('layouts/_action',[]);
    //var_dump(Yii::$app->user->identity);
?>
<div class="wb-action">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav-pills navbar-right">
                    <li><a class="btn btn-default btn-sm" href="/board/newtopic">สร้างกระทู้ใหม่</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="wb-forum-content">
        <div class="row">
            <div class="col-md-12">
                <table class="main-content table-border hover-line">
                    <thead>
                        <tr>
                            <th class="directory align-center">หัวข้อ</th>
                            <th class="by align-center">โดย</th>
                            <th class="time align-center">เมื่อ</th>
                            <th class="post-reply align-center">ตอบ/อ่าน</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach ($model as $topic) { ?>
                            <tr>
                                <td class="firstcolumn"><label class="glyphicon glyphicon-comment"></label> <a href="/board/topic/<?= $topic->id ?>"><?= $topic->title ?></a></td>
                                <td class="align-center"><?= UserModel::getUsername($topic->id_user) ?></td>
                                <td class="align-center"><?= helpFunction::dateTime($topic->post_time) ?></td>
                                <td class="align-center"><?= $topic->reply."/".$topic->read ?></td>
                            </tr>

                        <?php } ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
</div>