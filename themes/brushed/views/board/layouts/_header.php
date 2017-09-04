<?php
use yii\widgets\Breadcrumbs;
rmrevin\yii\fontawesome\AssetBundle::register($this);
use kartik\popover\PopoverX;
use app\models\BoardNotiCommentModel;

use kartik\dialog\Dialog;
 
// widget with default options
echo Dialog::widget([
    
    'libName' => 'krajeeDialogDanger', // a custom lib name
    'options' => [  // customized BootstrapDialog options
        'size' => Dialog::SIZE_SMALL, // large dialog text
        'type' => Dialog::TYPE_DANGER, // bootstrap contextual color
        'title' => 'ผิดพลาด!',
    ]
    
]);

// regist style all header & content
use app\assets\WBAsset;
WBAsset::register($this);

?>

<div class="wb-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="header-content">
                    <?php echo Breadcrumbs::widget([
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                            'homeLink'=>false, // add this line
                    ]) ?>
                </div>
            </div>
            <div class="col-md-3">
                <div class="search-box">
                        <form id="search-box">
                            <div class="input-group">
                              <label class="sr-only" for="search">Input text</label>
                              <input type="text" class="form-control" id="data-search" placeholder="Search...." value="<?= isset($this->params['search-data']) ? $this->params['search-data']:'' ?>">
                              <span class="input-group-btn">
                                <button type="submit" class="btn glyphicon glyphicon-search"></button>
                              </span>
                            </div>
                        </form>
                </div>
            </div>
            <div class="col-md-3">
                <div class="member-top-right">
                    <div class="reply-report-box text-right float-right">
                        <?php 
                        //echo Html::a('<i class="fa fa-comments icon" aria-hidden="true"></i><span class="badge">245</span></a>', ['#'], ['class'=>'header', 'data-toggle'=>'popover-x', 'data-placement'=>'bottom bottom-right', 'data-target'=>'#w0']);
                        echo PopoverX::widget([
                            'header' => 'แจ้งเตือนการตอบกลับ',
                            'placement' => PopoverX::ALIGN_BOTTOM_RIGHT,
                            'size' => PopoverX::SIZE_LARGE,
                            'id' => 'popup-noti-comment',
                            'content' => '<div class="list-group">'.
                                            BoardNotiCommentModel::genNotiComment()
                                        .'<a href="/board/comment-history" class="list-group-item text-center">ดูการแจ้งเตือนทั้งหมด</a>
                                        </div>',
                            //'footer' => Html::button('Submit', ['class'=>'btn btn-sm btn-primary']),
                            'toggleButton' => ['label'=>BoardNotiCommentModel::getNotiBadge(), 'class'=>'btn-popover-style fa fa-comments','title'=>'การตอบกลับ'],
                        ]); 
                        ?>
                    </div>
                    <div class="reply-report-box text-right float-right">
                        <?php 
                        //echo Html::a('<i class="fa fa-comments icon" aria-hidden="true"></i><span class="badge">245</span></a>', ['#'], ['class'=>'header', 'data-toggle'=>'popover-x', 'data-placement'=>'bottom bottom-right', 'data-target'=>'#w0']);
                        echo PopoverX::widget([
                            'header' => 'แจ้งเตือนข้อความส่วนตัว',
                            'placement' => PopoverX::ALIGN_BOTTOM_RIGHT,
                            'size' => PopoverX::SIZE_LARGE,
                            'content' => '<div class="list-group">
                                            <a href="" class="list-group-item">ยังไม่มีข้อมูลในส่วนนี้</a>
                                        </div>',
                            //'footer' => Html::button('Submit', ['class'=>'btn btn-sm btn-primary']),
                            'toggleButton' => ['label'=>'<!--<span class="badge">245</span>-->', 'class'=>'btn-popover-style fa fa-envelope','title'=>'ข้อความส่วนตัว'],
                        ]); 
                        ?>
                    </div>
                    
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>
