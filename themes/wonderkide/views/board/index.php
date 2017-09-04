<?php
use yii\widgets\Breadcrumbs;

$this->title = 'Webboard';
$this->params['breadcrumbs'][] = ['label' => 'Webboard', 'url' => ['/board']];
$this->params['breadcrumbs'][] = ['label' => 'Sample Post', 'url' => ['post/edit', 'id' => 1]];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
    //echo Yii::$app->controller->renderPartial('layouts/_header',[]);
?>
<div class="wb-main-content">
        <div class="row">
            <div class="col-md-12">
                <table class="main-content table-border">
                    <thead>
                        <tr>
                            <th class="directory align-center">Directory</th>
                            <th class="topic align-center">Topics</th>
                            <th class="post align-center">Posts</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="firstcolumn"><label class="glyphicon glyphicon-comment"></label> wtf</td>
                            <td class="align-center">ggwp</td>
                            <td class="align-center">ggwp</td>
                        </tr>
                        <tr>
                            <td class="firstcolumn"><label class="glyphicon glyphicon-comment"></label> wtf</td>
                            <td class="align-center">ggwp</td>
                            <td class="align-center">ggwp</td>
                        </tr>
                        <tr>
                            <td class="firstcolumn"><label class="glyphicon glyphicon-comment"></label> wtf</td>
                            <td class="align-center">ggwp</td>
                            <td class="align-center">ggwp</td>
                        </tr>
                        <tr>
                            <td class="firstcolumn"><label class="glyphicon glyphicon-comment"></label> wtf</td>
                            <td class="align-center">ggwp</td>
                            <td class="align-center">ggwp</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</div>
<div class="list-page wb-footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <ul>
                    <li>1</li>
                    <li>2</li>
                    <li>3</li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>