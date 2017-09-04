<?php

use kartik\sortinput\SortableInput;
use app\models\GalleryImagesModel;
use yii\helpers\Html;

?>
<style>
    .gallery-sort .img{
        //width: 80%;
        //float: left;
    }
    .gallery-sort .caption{
        //margin-top: 2.5%;
        //vertical-align: central;
        padding: 10px 0;
    }
    .gallery-sort .action{
        margin-top: 2.5%;
    }
    .gallery-sort .sort{
        font-size: 2.5em;
        margin-top: 1.5%;
    }
    .gallery-sort .sort a{
        margin: 5px;
        color: #999999;
    }
    .gallery-sort .sort a:hover, .gallery-sort .sort a:focus{
        color: #333333;
    }
    
</style>
<?php

$image = GalleryImagesModel::find()->where(['ref' => $model->ref])->orderBy(['sorting'=>SORT_ASC])->all();
if(!$image){ ?>
<h1 class="text-center text-danger">ท่านยังไม่ได้อัพโหลดรูปภาพ</h1>
<a class="text-center text-danger">ท่านยังไม่ได้อัพโหลดรูปภาพ</a>
<?php }
else{
$item = [];
foreach ($image as $value) {
    array_push($item, ['content' => 
                            '<div class="row gallery-sort">'
                                    . '<div class="img col-md-2 col-xs-12">'.
                                    Html::img($value->path.'thumbnail/'.$value->real_name, ['min-width'=>'100', 'class' => 'img-responsive'])
                                    . '</div>'
                                . '<div class="col-md-5 col-xs-12 caption" id="caption-'.$value->id.'">'
                                    . '<p class="title text-center"><strong>'.$value->title.'</strong></p>'
                                    . '<p class="detail text-center">'.$value->detail.'</p>'
                                . '</div>'
                                . '<div class="col-md-3 col-xs-6 action">'
                                    . '<label class="btn btn-info edit-caption" data-selected="'.$value->id.'">แก้ไข Caption</label>'
                                    .'<input type="hidden" name="data-selected" value="'.$value->id.'">'
                                . '</div>'
                                . '<div class="col-md-2 col-xs-6 sort">'
                                    . '<a href="/gallery/sortable?data-selected='.$value->id.'&sort=up" class="" title="เลื่อนตำแหน่งขึ้นบน"><i class="fa fa-arrow-circle-o-up" aria-hidden="true"></i></a>'
                                    . '<a href="/gallery/sortable?data-selected='.$value->id.'&sort=down" class="" title="เลื่อนตำแหน่งลงล่าง"><i class="fa fa-arrow-circle-o-down" aria-hidden="true"></i></a>'
                                . '</div>'
                            .'</div>'
                            .'<div class="clearfix"></div>'
                        ]);
     
}

// Scenario # 1: Basic horizontal sortable-input with ActiveForm. Display
// the stored value of the delimited sort order and set it to readonly.
echo SortableInput::widget([
    'name'=> 'sort_list_1',
    'items' => $item,
    'hideInput' => true,
    'options' => ['class'=>'form-control','id'=>'update-drag-img', 'readonly'=>true]
]);
?>
<!-- Modal Caption -->
<div class="modal fade" id="CaptionModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title center">ข้อมูล Caption</h4>
      </div>
      <div class="modal-body">
            <input id="caption_selected" type="hidden">
            <table class="table table-hover">
                <tr>
                    <td>Title</td>
                    <td><input id="caption_title" type="text"></td>
                </tr>
                <tr>
                    <td>Detail</td>
                    <td><textarea id="caption_detail" rows="4"></textarea></td>
                </tr>
            </table>
      </div>
      <div class="modal-footer">
        <!--<button type="button" class="btn btn-success" data-dismiss="modal">ข้อมูลส่วนตัว</button>-->
        <button onclick="updateCaption()" type="button" class="btn btn-danger btn-sm">Save</button>
      </div>
    </div>
  </div>
</div>
<?php } ?>