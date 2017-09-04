<?php
use app\models\UserAuth;
$user = app\models\UserModel::findOne(Yii::$app->user->id);
?>

<div id='cssmenu'>
    <?php if (!Yii::$app->user->isGuest) { ?>
        <ul>
            <li class='active'><a href='/wonderkide'><span>Admin</span></a></li>
            <li class='has-sub'><a href='/wonderkide/tags'><span>จัดการ Content</span></a>
                <ul>
                    <li><a href='/wonderkide/mainmenu'><span>จัดการเมนูหลัก</span></a></li>
                    <li><a href='/wonderkide/main/icon'><span>จัดการ Icon</span></a></li>
                    <li><a href='/wonderkide/main/logo'><span>จัดการ Logo</span></a></li>
                    <li><a href='/wonderkide/footer'><span>จัดการ Footer</span></a></li>
                    <li><a href='/wonderkide/feeling/icon'><span>จัดการ Icon Feeling</span></a></li>
                    <li><a href='/wonderkide/feeling/icon-active'><span>จัดการ Icon Feeling active</span></a></li>
                    <li><a href='/wonderkide/main/contact'><span>จัดการ Contact</span></a></li>
                    <li><a href='/wonderkide/main/allowuser'><span>จัดการ User ห้ามใช้</span></a></li>
                    <li><a href='/wonderkide/rules'><span>จัดการ Rules</span></a></li>
                    <li class='last'><a href='/wonderkide/content'><span>content อื่นๆ</span></a></li>
                </ul>
            </li>
            <li class='has-sub'><a href='/wonderkide/tags'><span>Comment</span></a>
                <ul>
                    <li class='last'><a href='/wonderkide/comment'><span>จัดการ comment</span></a></li>
                </ul>
            </li>
            <li class='has-sub'><a href='/wonderkide/tags'><span>Memo</span></a>
                <ul>
                    <li><a href='/wonderkide/memory'><span>Memory</span></a></li>
                    <li><a href='/wonderkide/gallery'><span>Gallery</span></a></li>
                    <li><a href='/wonderkide/galleryimage'><span>Gallery Images</span></a></li>
                    <li><a href='/wonderkide/alert'><span>Alert</span></a></li>
                    <li class='last'><a href='/wonderkide/expend'><span>Expend</span></a></li>
                    
                </ul>
            </li>
            <li class='has-sub'><a href='/wonderkide/tags'><span>Tags</span></a>
                <ul>
                    <li><a href='/wonderkide/tags'><span>จัดการ Tag</span></a></li>
                    <!--<li class='last'><a href='#'><span>เพิ่ม</span></a></li>-->
                </ul>
            </li>
            <!--<li class='has-sub'><a href='/wonderkide/review'><span>Review</span></a>
                <ul>
                    <li><a href='/wonderkide/travel'><span>Travel</span></a></li>
                    <li class='last'><a href='/wonderkide/restaurant'><span>Restaurant</span></a></li>
                </ul>
            </li>
            <li class='has-sub'><a href='/wonderkide/league'><span>League</span></a>
                <ul>
                    <li><a href='/wonderkide/league'><span>จัดการลีก</span></a></li>
                    <li class='last'><a href='/wonderkide/league/active'><span>สถานะ</span></a></li>
                </ul>
            </li>-->
            <li class='has-sub'><a href='/wonderkide/match'><span>Match</span></a>
                <ul>
                    <li><a href='/wonderkide/match'><span>รายการทั้งหมด</span></a></li>
                    <li><a href='/wonderkide/match/pull'><span>ดูดรายการและราคา</span></a></li>
                    <li class='last'><a href='/wonderkide/match/updateresult'><span>อัพเดทผลการแข่งขัน</span></a></li>
                </ul>
            </li>
            <li class='has-sub'><a href='/wonderkide/match'><span>Games</span></a>
                <ul>
                    <li><a href='/wonderkide/games/calculateticket'><span>จัดการบอลสเต็ป</span></a></li>
                </ul>
            </li>
            <li class='has-sub'><a href='/wonderkide/tags'><span>Message</span></a>
                <ul>
                    <li><a href='/wonderkide/contact?sort=-create_time'><span>จัดการข้อความ contact</span></a></li>
                    <li class='last'><a href='/wonderkide/report?sort=-create_time'><span>จัดการข้อความ report</span></a></li>
                </ul>
            </li>
            <li class='has-sub'><a href='/wonderkide/exp'><span>EXP.</span></a>
                <ul>
                    <li><a href='/wonderkide/like/check'><span>ตรวจสอบการ LIKE</span></a></li>
                    <li><a href='/wonderkide/feeling'><span>ตรวจสอบ Feeling</span></a></li>
                    <li><a href='/wonderkide/feeling/point'><span>เพิ่ม Point Feeling</span></a></li>
                    <li class='last'><a href='/wonderkide/exp'><span>ข้อมูล ค่าประสบการณ์</span></a></li>
                </ul>
            </li>
            <li class='has-sub'><a href='/wonderkide/rank'><span>ระบบยศ</span></a>
                <ul>
                    <li><a href='/wonderkide/logexp/check'><span>ตรวจสอบค่าประสบการณ์</span></a></li>
                    <li><a href='/wonderkide/rank/levelup'><span>ตรวจสอบการเพิ่มยศ</span></a></li>
                    <li><a href='/wonderkide/rank'><span>ข้อมูลยศ</span></a></li>
                    
                    <li><a href='/wonderkide/logexp'><span>ประวัติค่าประสบการณ์</span></a></li>
                    <li class='last'><a href='/wonderkide/log-rank'><span>ประวัติการเลื่อนยศ</span></a></li>
                </ul>
            </li>
            <li class='has-sub'><a href='/wonderkide/tags'><span>SEO</span></a>
                <ul>
                    <li class='last'><a href='/wonderkide/url'><span>จัดการ Url</span></a></li>
                </ul>
            </li>
            <?php 
            if(UserAuth::PERMISSION_DEVIL == $user->permission){
            ?>
            <li class='has-sub'><a href='/wonderkide/user'><span>Users</span></a>
                <ul>
                    <li><a href='/wonderkide/users'><span>จัดการ user</span></a></li>
                </ul>
            </li>
            
            <li class='has-sub'><a href='/wonderkide/setting'><span>Setting</span></a>
                <ul>
                    <li><a href='/wonderkide/setting'><span>การตั้งค่าระบบ</span></a></li>
                    <li class='last'><a href='/wonderkide/logdata'><span>ประวัติการทำงาน</span></a></li>
                </ul>
            </li>
            <?php } ?>
        </ul>

    <?php } else { ?>
        <ul>
            <li class='active'><a href='/wonderkide'><span>Admin</span></a></li>
            <li class='last'><a href='/wonderkide/auth/login'><span>Login</span></a></li>
        </ul>
    <?php } ?>
</div>
