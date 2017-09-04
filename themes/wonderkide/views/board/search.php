<?php
use app\models\UserModel;

$this->title = 'ค้นหา';
$this->params['breadcrumbs'][] = ['label' => 'Webboard', 'url' => ['/board']];
//$this->params['breadcrumbs'][] = ['label' => 'Sample Post', 'url' => ['post/edit', 'id' => 1]];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
    echo Yii::$app->controller->renderPartial('layouts/_header',[]);
?>
<div class="serach-result">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?php if($data){ ?>
                <table class="main-content table-border hover-line">
                    <thead>
                        <tr>
                            <th class="directory align-center">หัวข้อ</th>
                            <th class="by align-center">โดย</th>
                            <th class="post-reply align-center">ตอบ/อ่าน</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach ($data as $topic) { ?>
                            <tr>
                                <td class="firstcolumn"><label class="glyphicon glyphicon-comment"></label> <a href="/board/topic/<?= $topic->id ?>"><?= $topic->title ?></a></td>
                                <td class="align-center"><?= UserModel::getUsername($topic->id_user) ?></td>
                                <td class="align-center"><?= $topic->reply."/".$topic->read ?></td>
                            </tr>

                        <?php } ?>
                        
                    </tbody>
                </table>
                <?php }else{ ?>
                <h3 class="align-center text-danger">ไม่พบสิ่งที่คุณค้นหา</h3>
                <?php } ?>
            </div>
        </div>
    </div>
</div>