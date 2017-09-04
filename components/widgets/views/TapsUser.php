<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\components\widgets\notify;
?>

<h2 class="hidden">Sidebar</h2>
                    <section class="widget wdg-tabs" data-showonscroll="true" data-animation="fadeIn">
                    <div class="widget-title clearfix">
                        <h3 class="hidden">Tabs Widget</h3>
                        <div class="sep-widget"></div>
                    </div>

                    <div class="widget-content paddingZero clearfix">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#user-data" data-toggle="tab">ข้อมูลสมาชิก</a></li>
                            <li><a href="#notify-list" data-toggle="tab">แจ้งเตือน <?= $notify != 0 ? '<span id="notify-badge" class="badge bg-red">'. $notify .'</span>':''?></a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            
                            <aside class="tab-pane animated fadeInRight" id="notify-list">
                                <?= notify::widget(['limit' => 5]) ?>
                            </aside>

                            <!--right-tab1-->

                            <aside class="tab-pane animated fadeInDown active" id="user-data">
                                <h4 class="hidden">user - Tab</h4>
                                
                                <div class="user-image">
                                    <?= Html::img(Yii::$app->user->identity->image_crop == '' ? Yii::$app->assetManager->getPublishedUrl('@WDAsset').'/images/df_profile.png': Yii::$app->user->identity->image_crop, ['class' => 'img-responsive show-profile-img','id' => 'profile-img-detail']) ?>
                                </div>
                                <label class="user-name"><?php echo Yii::$app->user->identity->username ?></label>
                                
                                <?= Html::a('ข้อมูลส่วนตัว', ['/personal'], ['class' => 'btn btn-default btn-xs']) ?>
                                <?= Html::a('ออกจากระบบ', ['/site/logout'], ['class' => 'btn btn-default btn-xs pull-right','data-method' => 'post']) ?>
                                <hr class="style13">
                            </aside>
                            <!--end right-tab1-->
                            <?php /*
                            <!--right-tab2-->
                            <aside class="tab-pane animated fadeInDown" id="search">
                                <h4 class="hidden">search - Tab</h4>
                                <div class="text-danger text-center"><label>ขออภัย! กำลังปรับปรุงระบบค้นหา</label></div>
                                    <!--<div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="res" checked>
                                            ค้นหาร้านอาหาร
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="travel">
                                            ค้นหาสถานที่ท่องเที่ยว
                                        </label>
                                    </div>

                                    <div class="input-group">
                                        <input type="text" class="form-control input-sm" placeholder="คำค้นหา...">
                                        <span class="input-group-btn">
                                            <button class="btn btn-md glyphicon glyphicon-search btn-default" type="submit"> ค้นหา</button>
                                        </span>
                                    </div>-->
                            </aside>
                            <!--end right-tab2-->
                             * 
                             */?>
                        </div>
                    </div>
                </section>