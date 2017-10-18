<?php
use yii\helpers\Html;
use app\components\widgets\updateZeny;
use karpoff\icrop\CropImageUpload;
use yii\widgets\ActiveForm;
use yii\imagine\Image;
/*Image::crop('@webroot/uploads/img/profile/'.$image->image, 200, 200, [100,100,300,400])
        ->save(Yii::getAlias('@webroot/uploads/img/profile/wtf.jpg'), ['quality' => 80]);*/
     //var_dump($image->image);exit();
/*Image::thumbnail('@webroot/uploads/img/profile/'.$image->image, 120, 120)
    ->save(Yii::getAlias('@webroot/uploads/img/profile/thumb.jpg'), ['quality' => 80]);*/
if($modelUser){
?>
<div class="page">
    <div class="container">
<div class="row">
    <div class="col-md-8">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
            <?= $form->field($image, 'image')->widget(CropImageUpload::className()) ?>
            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
            </div>
        <?php ActiveForm::end(); ?>
        <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Personal information</h3>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <tr>
                        <th>Username :</th>
                        <td><?= $modelUser->username ?></td>
                    </tr>
                    <tr>
                        <th>Email :</th>
                        <td><?= $modelUser->email ?></td>
                    </tr>
                    <tr>
                        <th>Create date :</th>
                        <td><?= $modelUser->created_at ?></td>
                    </tr>
                    <tr>
                        <th>Update date :</th>
                        <td><?= $modelUser->updated_at ?></td>
                    </tr>
                    <!--<tr>
                        <th>Rank :</th>
                        <td><?= Yii::$app->params['groupMember'][$modelUser->permission] ?></td>
                    </tr>-->
                    <tr>
                        <th>Money :</th>
                        <td><?= $modelUser->zeny ?></td>
                    </tr>
                </table>
                <?php //echo Html::a('ข้อมูลส่วนตัว', ['/site/personal'], ['class' => 'btn btn-primary btn-sm pull-left']) ?>
                <?= Html::a('แก้ไขข้อมูล', ['/site/personal?edit=true'], ['class' => 'btn btn-warning btn-sm pull-right']) ?>
            </div>
        </div>
        <?php if($modelZeny){ ?>
        <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Zeny</h3>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Detail</th>
                            <th>Zeny</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php                        
                        foreach ($modelZeny as $row) { ?>
                        <tr>
                            <td><?= $row->update_time ?></td>
                            <td><?= $row->text ?></td>
                            <td><?= $row->zeny ?></td>
                        </tr>

                        <?php } ?>
                    </tbody>
                </table>
                <?php //echo Html::a('ข้อมูลส่วนตัว', ['/site/personal'], ['class' => 'btn btn-primary btn-sm pull-left']) ?>
                <?= Html::a('แก้ไขข้อมูล', ['/site/personal?edit=true'], ['class' => 'btn btn-warning btn-sm pull-right']) ?>
            </div>
        </div>
        <?php } ?>
        <?php if($modelGame){ ?>
        <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Zeny</h3>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Zeny</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php                        
                        foreach ($modelGame as $row) { ?>
                        <tr>
                            <td><?= $row->play_date ?></td>
                            <td><?= $row->zeny ?></td>
                            <td><?= $row->status ?></td>
                        </tr>

                        <?php } ?>
                    </tbody>
                </table>
                <?php //echo Html::a('ข้อมูลส่วนตัว', ['/site/personal'], ['class' => 'btn btn-primary btn-sm pull-left']) ?>
                <?= Html::a('แก้ไขข้อมูล', ['/site/personal?edit=true'], ['class' => 'btn btn-warning btn-sm pull-right']) ?>
            </div>
        </div>
        <?php } ?>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Profile Menu</h3>
            </div>
            <div class="panel-body">
                <div class="list-group">
                    <a href="#" class="list-group-item disabled">
                      Cras justo odio
                    </a>
                    <a href="/site/profile" class="list-group-item">Profile</a>
                    <a href="#" class="list-group-item">Morbi leo risus</a>
                    <a href="#" class="list-group-item">Porta ac consectetur ac</a>
                    <a href="#" class="list-group-item">Vestibulum at eros</a>
                </div>
            </div>
        </div>
        <?php /*
        if(!Yii::$app->user->isGuest){ ?>
        <section class="profile">
            <h3 class="text-center">Member group : <small><?= Yii::$app->params['groupMember'][$modelUser->permission] ?></small></h3>
                <div class="user-image">
                    <?= Html::img(Yii::$app->user->identity->image == '' ? Yii::$app->assetManager->getPublishedUrl('@WDAsset').'/images/df_profile.png':'/uploads/img/profile/'.Yii::$app->user->identity->image, ['class' => 'img-responsive','id' => 'show-profile-img']) ?>
                </div>
                <div class="user-image-button">
                    <?= Html::a('อัพโหลดรูป', ['#'], ['class' => 'btn btn-default btn-xs','data-toggle' => 'modal','data-target' => '#ProfileImg','id' => 'modal-user-img']) ?>
                </div>
            
        </section>
        <?php } */?>
        <section id="update-zeny">
            <?= updateZeny::widget(); ?>
        </section>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="ProfileImg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
            <?php
            if(!Yii::$app->user->isGuest){ ?>
            
            <div class="modal-user-image">
                <?= Html::img(Yii::$app->user->identity->image == '' ? Yii::$app->assetManager->getPublishedUrl('@WDAsset').'/images/df_profile.png':'/uploads/img/profile/'.Yii::$app->user->identity->image, ['class' => 'img-responsive','id' => 'profile-img']) ?>
            </div>
            <form enctype="multipart/form-data" action="uploadprofile" method="POST" name="FileUploader" id="FileUploader">
                <div class="button-upload" id="uploadButton">
                    <!--<input id="photoimg" name="photoimg" type="file" onchange="$('#FileUploader').submit()"/>-->
                    <input id="photoimg" name="photoimg" type="file" onchange="wtf()" />
                    <?php echo Html::submitButton('Upload', ['class' => 'btn btn-danger', /*'onclick' => 'confirmOdds('.json_encode($_POST).')'*/]); ?>
                </div>
                <span style="color: red;font-weight: bold;">เลือกภาพขนาดไม่เกิน 1 Mb.</span>
            </form>
            <div id="output"></div>
            <div class="modal-user-image-button">
                <input type="hidden" name="x1" id="x1" value="" />
                <input type="hidden" name="y1" id="y1" value="" />
                <input type="hidden" name="x2" id="x2" value="" />
                <input type="hidden" name="y2" id="y2" value="" />
                <input type="hidden" name="mem_id" id="mem_id" value="<?php echo Yii::$app->user->identity->id; ?>" /><br />
                <input type="button" value="" class="button-crop" onclick="imageCrop()" style="display: none" id="CropButton">
                <?php echo Html::button('เปลี่ยนรูป', ['class' => 'btn btn-default btn-xs']) ?>
                <?php echo Html::button('อัพโหลดรูป', ['class' => 'btn btn-default btn-xs','onclick' => 'imageCrop()']) ?>
            </div>
            <?php } ?>


      </div>
    </div>
  </div>
</div>
    </div>
</div>
<?php } 
else{
     echo 'WTF';
} ?>
<script>
    /*$('#ProfileImg').on('beforeSubmit', 'form#FileUploader', function () {
            var form = $(this);
            var post = form.serialize();
            // return false if form still have some validation errors
            if (form.find('.has-error').length) {
                 return false;
            }
            // submit form
            $.ajax({
                 url: form.attr('action'),
                 type: 'post',
                 data: post,
                 success: function (team) {
                    if(!isNaN(team)){
                       alertMessege(team);
                    }
                    else{

                    }
                 }
            });
            return false;
});*/
    function wtf(){
        //alert();

        var url = "/site/uploadprofile";


        alert($("#ProfileImg").serialize());
        //$("#FileUploader").submit();
        $.ajax({
           type: "POST",
           url: url,
           data: $("#FileUploader").serialize(), // serializes the form's elements.
           success: function(data)
           {
                if(data == 1){
                    hideFormUpload();
                }else{
                    bootboxalert("small", "<i class='fa fa-times-circle' aria-hidden='true'></i> มีบางอย่างผิดพลาด", "กรุณาลองใหม่ภายหลัง", null);
                }
           }
         });


    }
    function hideFormUpload() {
        $("#output").html('<img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/images/icon/ajax-loader.gif" alt="Please Wait"/></div>');
        $("#profile-img").hide();
        $("div.modal-user-image").hide();
    }
    function showCropimg(img) {
        $("#output").html('');
        $("#preprofile").attr('src', '<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/uploads/profile/' + img);
        $("#curent-pic").html('');
        $(".text-crop").show();
        $("#preprofile").show();
        $("#CropButton").show();
    }

//    $("#uploadButton").click(function(){
//        $("#photoimg").trigger('click');
//        return false;
//    });

</script>