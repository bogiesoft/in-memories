<div class="page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="site-banned">

                    <h1>Banned</h1>

                    <div class="alert alert-danger">
                        <span class="<?= $content->name ?>"> </span>&nbsp;&nbsp;&nbsp;<?= $content->content ?>
                    </div>
                    <p>
                        Please contact <a href="<?= Yii::$app->seo->getUrl('personal/sent') ?>?to=1">Admin</a>. Thank you.
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>