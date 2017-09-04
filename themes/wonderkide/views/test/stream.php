<div id="content-admin">
    <div class="head-table"><?php echo isset($titlePage) ? $titlePage : $this->module->defaultTitlePage; ?></div>
    <div id="content-admin-block">
        <?php echo CHtml::textField('facebook_url', ''); ?><br>
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'label' => 'Gen VDO From Facebook',
            'type' => 'primary',
            'htmlOptions' => array('onclick' => 'genClipHugball();', 'style' => '',),
        ));
        ?>
        <div class="form-actions">
            <img id="status-load" style="display: none;" src="<?php echo Yii::app()->theme->baseUrl; ?>/views/layouts/images/loading-small.gif">
            <img id="status-success" style="display: none;" src="<?php echo Yii::app()->theme->baseUrl; ?>/views/layouts/images/success.png">
            <img id="status-fail" style="display: none;" src="<?php echo Yii::app()->theme->baseUrl; ?>/views/layouts/images/fail.png">
        </div>
    </div>

        <!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your embedded video player code -->
      <div class="fb-video" data-href="https://www.facebook.com/HighlightsHD.tv/videos/1049444998481586/" data-width="500" data-show-text="false">
        <div class="fb-xfbml-parse-ignore">
          <blockquote cite="https://www.facebook.com/HighlightsHD.tv/videos/1049444998481586/">
            <a href="https://www.facebook.com/HighlightsHD.tv/videos/1049444998481586/">Title</a>
        </div>
      </div>

      

    <br>
        
        <!--<a
    style="display:block;width:480px;height:270px"
    id="menu">
</a>-->
</div>

<script>
    



flowplayer("menu", "/flowplayer/flowplayer-3.2.18.swf", {
    clip: {
        autoPlay: false,
        //provider: 'rtmp',
        // urlResolvers is needed here to point to the bitrate select plugin
        urlResolvers: 'brselect',
        
        bitrates: [
            { url: "/uploads/clip/blur.mp4", bitrate: 800, isDefault: true,
                // label used to populate the selection items
                label: "800 k"
            },
            { url: "/uploads/clip/sub.mp4", bitrate: 1200, label: "1200 k" },
            { url: "/uploads/clip/fast.mp4", bitrate: 1600, label: "1600 k" }
        ],
         /*onStart: function () {
        this.seek(30);
        console.log('content');
    },*/
        
        
    },
    plugins: {
        menu: {
            url: "flowplayer.menu-3.2.13.swf",
            items: [
                // you can have an optional label as the first item
                // the bitrate specific items are filled here based on the clip's bitrates
                { label: "select bitrate:", enabled: false }
            ]
        },
        brselect: {
            url: "flowplayer.bitrateselect-3.2.14.swf",
 
            // enable the bitrate menu
            menu: true,
            //this.seek(30),
            
            // show the selected file in the content box. These functions are
            // here just for demonstartion purposes.
            onStreamSwitchBegin: function(newItem, currentItem) {
                //alert($f().getTime());
                setSeek($f().getTime());
                //newItem.seek(60);
                console.log($f().getTime());
                $f().getPlugin('content').setHtml(
                        "Will switch to: " + newItem.streamName +
                                " from " + currentItem.streamName);
            },
            onStreamSwitch: function(newItem) {
                //newItem.seek(60);
                //alert(newItem);
                
                $f().getPlugin('content').setHtml(
                        "Switched to: " + newItem.streamName);
                
            }
        },
        // RTMP streaming plugin
        rtmp: {
            url: "flowplayer.rtmp-3.2.11.swf",
            netConnectionUrl: 'rtmp://s3b78u0kbtx79q.cloudfront.net/cfx/st'
        },
        // a content box so that we can see the selected bitrate. (for demonstation
        // purposes only)
        content: {
            url: "flowplayer.content-3.2.9.swf",
            top: 0,
            left: 0,
            width: 400,
            height: 150,
            backgroundColor: 'transparent',
            backgroundGradient: 'none',
            border: 0,
            textDecoration: 'outline',
            style: {
                body: {
                    fontSize: 14,
                    fontFamily: 'Arial',
                    textAlign: 'center',
                    color: '#ffffff'
                }
            }
        },
        controls: {
            tooltips: { buttons: true }
        }
    }
    
});
function setSeek(time){
    console.log(time);
    $f().close();
    if($f().play()){
        //setTimeout('$f(0).seek('+time+')',200);
        function initiateTimeOut(i) {
        setTimeout(function() { doStuff(i); }, 5*i);
    }
    function doStuff(i) {
        console.log(i);
        i++;
        if ($f(0).getTime()>=0.0001) {
            console.log($f(0).getTime());
            $f(0).seek(time);
        }
        else{
            initiateTimeOut(i);
        }
    }

    initiateTimeOut(1);
    }
}
/*$f().onLoad(function() {
    console.log($f().play());
});*/
</script>