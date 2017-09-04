<?php
use kartik\popover\PopoverX;
use app\models\BoardNotiCommentModel;

?>
<div class="main-noti-popup">
                        <?php 
                        //echo Html::a('<i class="fa fa-comments icon" aria-hidden="true"></i><span class="badge">245</span></a>', ['#'], ['class'=>'header', 'data-toggle'=>'popover-x', 'data-placement'=>'bottom bottom-right', 'data-target'=>'#w0']);
                        echo PopoverX::widget([
                            'header' => 'แจ้งเตือนการตอบกลับ',
                            'placement' => PopoverX::ALIGN_BOTTOM_RIGHT,
                            'size' => PopoverX::SIZE_LARGE,
                            'id' => 'popup-noti-all',
                            'content' => '<div class="list-group">'.
                                            BoardNotiCommentModel::gettest()
                                        .'<button href="/board/comment-history" class="list-group-item text-center">ดูการแจ้งเตือนทั้งหมด</button>
                                        </div>',
                            //'footer' => Html::button('Submit', ['class'=>'btn btn-sm btn-primary']),
                            'toggleButton' => ['label'=>BoardNotiCommentModel::getNotiBadge(), 'class'=>'btn-popover-style fa fa-bell fa-md','title'=>'การตอบกลับ'],
                        ]); 
                        ?>
</div>