<?php
$this->title = "References";
?>

<div class="row">
	<div class="col-300 visible-md-block visible-lg-block">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <ins class="adsbygoogle" style="display:inline-block;width:300px;height:600px" data-ad-client="ca-pub-1786819164979340" data-ad-slot="8594776917"></ins>
        <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
    </div>
    <div class="col">
        <h1>References</h1>
		<hr />
        <?php foreach($refs as $ref): ?>
            <p><a name="<?=$ref->refId?>"></a><?=$ref->refId?>. <?=$ref->title?>. <a href="<?=$ref->url?>" target="ref"><?=$ref->url?></a></p>
        <?php endforeach;?>
    </div>
</div>
<div class="row visible-xs-block visible-sm-block">
	<div class="col-xs-12">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-1786819164979340" data-ad-slot="4622235716" data-ad-format="auto"></ins>
        <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
    </div>
</div>

