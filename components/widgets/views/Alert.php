<?php

?>

<div class="memory cat-widget animated fadeInDown">
                <div class="widget-title">
                            <h4><a href="/alert">ALERT</a></h4>
                            <span class="sub-title">เตือนความทรงจำ</span>

                            <div class="sep-widget-dou"></div>
                            <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                    <?php 
                    if($model){
                        foreach ($model as $row) { ?>
                            <div class="alert alert-<?= $row->theme ?> alert-dismissible" role="alert">
                                <button type="button" class="close alert-checked" data-dismiss="alert" aria-label="Close" data-selected="<?= $row->id ?>"><span aria-hidden="true">&times;</span></button>
                                <p><strong><span class="glyphicon glyphicon-info-sign"></span> <?= $row->title ?></strong></p> <?= $row->content ?>
                            </div>

                    <?php
                        }
                    }else{ ?>
                    <p class="text-danger text-center"><strong>ไม่มีข้อความในวันนี้</strong></p>
                    <?php } ?>
                </div>
                
</div>