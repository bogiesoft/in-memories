<?php
use app\components\helpFunction;

if($travel){ ?>
<div class="row">
    <?php foreach ($travel as $Ttop) { ?>
     
    <div class="col-sm-6 col-md-6">
      <div class="thumbnail">
        <img src="/uploads/img/review/travel/<?= $Ttop->image ?>" alt="<?= $Ttop->title ?>">
        <div class="caption">
          <h3><?= $Ttop->title ?></h3>
          <p><?= helpFunction::TopCutText($Ttop->content) ?></p>
          <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
        </div>
      </div>
    </div>
    
    <?php } ?>
</div>
<?php } ?>