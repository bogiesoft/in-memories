<div id="menu">
    <ul class="menu">
        <?php if (Yii::app()->user->level == 5) { ?>
            <li><a href="/admin/system" class="parent"><span>จัดการระบบ</span></a>
                <div><ul>
                        <li><a href="/admin/user/manage"><span>ผู้ดูแล</span></a></li>
                        <li><a href="#"><span>ข้อความวิ่ง</span></a></li>
                    </ul></div>
            </li>
        <?php } ?>
        <li><a href="/admin/news" class="parent"><span>จัดการบทความ</span></a>
            <div><ul>
                    <li><a href="/admin/news/create"><span>เพิ่มข่าวและบทความ</span></a></li>
                    <li><a href="/admin/news"><span>จัดการข่าวและบทความ</span></a></li>
                </ul></div>
        </li>
        <li><a href="/admin/clip/manage" class="parent"><span>จัดการคลิป</span></a>
            <div><ul>
                    <li><a href="/admin/clip/create"><span>เพิ่มคลิป</span></a></li>
                    <li><a href="/admin/clip/manage"><span>จัดการคลิป</span></a></li>
                    <li><a href="/admin/clip/genhugball"><span>ดึงคลิปจาก hugball.com</span></a></li>
                </ul></div>
        </li>
        <li><a href="/admin/league/manage" class="parent"><span>จัดการลีก</span></a>
            <div><ul>
                    <li><a href="/admin/league/manage"><span>ข้อมูลลีก</span></a></li>
                    <li><a href="/admin/league/setscores"><span>อัพเดตคะแนนลีก</span></a></li>
                    <li><a href="/admin/league/settopscores"><span>อัพเดตดาวซัลโว</span></a></li>
                </ul></div>
        </li>
        <li><a href="/admin/match/manage" class="parent"><span>จัดการแมตช์</span></a>
            <div><ul>
                    <li><a href="/admin/match/manage"><span>ข้อมูลแมตช์</span></a></li>
                    <li><a href="/admin/match/setmatch"><span>อัพเดตแมตช์</span></a></li>
                    <li><a href="/admin/team/manage"><span>ข้อมูลทีม</span></a></li>
                    <li><a href="/admin/team/create"><span>เพิ่มทีม</span></a></li>
                </ul></div>
        </li>
        <li class="last"><a href="/admin/gallery/manage" class="parent"><span>จัดการแกลเลอรี่</span></a>
            <div><ul>
                    <li><a href="/admin/gallery/manage"><span>ข้อมูลแกลเลอรี่</span></a></li>
                    <li><a href="/admin/gallery/create"><span>เพิ่มภาพเข้าแกลเลอรี่</span></a></li>
                </ul></div>
        </li>
        <li class="last"><a href="/admin/contact"><span>ข้อความติดต่อ</span></a>
        </li>
        <li class="last">
            <a href="/admin/subscriber" class="parent"><span>Subscriber</span></a>
            <div>
                <ul>
                    <li><a href="/admin/subscriber/manage"><span>ข้อมูล Subscriber</span></a></li>
                    <li><a href="/admin/subscriber/create"><span>เพิ่ม Subscriber</span></a></li>
                </ul>
            </div>
        </li>
        <li class="last">
            <a href="/admin/service" class="parent"><span>Service</span></a>
            <div>
                <ul>
                    <li><a href="/admin/service/broadcast"><span>Broadcast Data</span></a></li>
                    <li><a href="/admin/service/history"><span>History</span></a></li>
                </ul>
            </div>
        </li>
    </ul>
</div>