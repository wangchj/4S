<?php
$this->title = "References";
?>

<div class="row">
    <div class="col-sm-10">
        <h1>References</h1>

        <hr />
        
        <?php foreach($refs as $ref): ?>
            <p><a name="<?=$ref->refId?>"></a><?=$ref->refId?>. <?=$ref->title?>. <a href="<?=$ref->url?>" target="ref"><?=$ref->url?></a></p>
        <?php endforeach;?>
    </div>
    <div class="col-sm-12">
    </div>
</div>

