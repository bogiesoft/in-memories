<?php
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

?>
<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'WTF',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-default navbar-fixed-top',
        ],
    ]);
    /*echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/wonder/index']],
            ['label' => 'Home', 'url' => ['/country/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ?
                ['label' => 'Login', 'url' => ['/site/login']] :
                [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ],
        ],
    ]);*/
    $navItems=[
        ['label' => 'Home', 'url' => ['/wonder/index']],
        //['label' => 'TopScore', 'url' => ['/wonder/topscore']],
        /*['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Contact', 'url' => ['/site/contact']]*/
        
      ];
        if(!Yii::$app->user->isGuest && Yii::$app->user->getIdentity()["permission"] == 0){
          array_push($navItems,['label' => 'Admin', 'url' => ['/admin']]
          );
        }
        if (Yii::$app->user->isGuest) {
          array_push($navItems,['label' => 'Sign In', 'url' => ['/site/login']],
              ['label' => 'Sign Up', 'url' => ['/site/signup']]);
        } else {
          array_push($navItems,
              ['label' => 'Review',  
                  'url' => ['#'],
                  'template' => '<a href="{url}" >{label}<i class="fa fa-angle-left pull-right"></i></a>',
                  'items' => [
                      ['label' => 'Tralvel', 'url' => '/review/travel'],
                      ['label' => 'Restaurant', 'url' => '/review/restaurant'],
                      ['label' => 'Something else here', 'url' => '#'],
                  ],
              ],
              [
                  'label' => 'Sub menu',
                  'items' => [
                       ['label' => 'Level 1 - Dropdown A', 'url' => '#'],
                       '<li class="divider"></li>',
                       //'<li class="dropdown-header">Dropdown Header</li>',
                       ['label' => 'Level 1 - Dropdown B', 'url' => '#'],

                  ],

              ],

              ['label' => 'Notebook', 'url' => ['/wonder/notebook']],
              ['label' => 'league', 'url' => ['/wonder/league']],
              ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
              'url' => ['/site/logout'],
              'linkOptions' => ['data-method' => 'post']]
          );
        }
      
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $navItems,
    ]);
    NavBar::end();
    ?>

</div>
<?php /*
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>*/ ?>