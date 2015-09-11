<?php
use yii\helpers\Url;

$request = Yii::$app->request;
$start = $request->get('start');
$end = $request->get('end');

$this->title = "Timeline";
if($start && $end)
    $this->title .= " $start-$end"
?>
<style>
    .table > thead > tr > th, .table > tbody > tr > td {
        line-height: 170%;
    }
</style>
<div class="row">
    <div class="col-md-10">
        <h1>Timeline<?=$start && $end ? " $start &ndash; $end" : ''?></h1>
    </div>
<div>
	<div class="col-md-10">
        <nav>
            <ul class="pagination">
                <li class="<?=$start==1935 && $end==1970 ? 'active' : ''?>"><a href="<?=Url::to(['site/timeline', 'start'=>1935, 'end'=>1970])?>">1935 &ndash; 1970</a></li>
                <li class="<?=$start==1970 && $end==1980 ? 'active' : ''?>"><a href="<?=Url::to(['site/timeline', 'start'=>1970, 'end'=>1980])?>">1970 &ndash; 1980</a></li>
                <li class="<?=$start==1980 && $end==1990 ? 'active' : ''?>"><a href="<?=Url::to(['site/timeline', 'start'=>1980, 'end'=>1990])?>">1980 &ndash; 1990</a></li>
                <li class="<?=$start==1990 && $end==2010 ? 'active' : ''?>"><a href="<?=Url::to(['site/timeline', 'start'=>1990, 'end'=>2010])?>">1990 &ndash; 2011</a></li>
                <li class="<?=!$start && !$end ? 'active' : ''?>"><a href="<?=Url::to(['site/timeline'])?>">All</a></li>
            </ul>
        </nav>
    </div>
</div>
<div class="">
	<div class="col-300 visible-md-block visible-lg-block">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <ins class="adsbygoogle" style="display:inline-block;width:300px;height:600px" data-ad-client="ca-pub-1786819164979340" data-ad-slot="8594776917"></ins>
        <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
    </div>
	<div class="col">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Year</th>
                    <th>Month</th>
                    <th>Date</th>
                    <th>Event</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($events as $event): ?>
                    <tr>
                        <td><?=$event->year?></td>
                        <td><?=$event->season ? $event->season : $event->getMonthAbbr()?></td>
                        <td><?=$event->date?></td>
                        <td>
                            <?php if($event->title):?>
                                <b><?=$event->title?></b><br/>
                            <?php endif;?>

                            <?=str_replace("\n", '<br/>', $event->text)?>
                            <?php if(count($event->refs) != 0):?>
                                [<?php for($i = 0; $i < count($event->refs); $i++): ?><?php if($i != 0) echo ', ';?><a href="<?=Url::to(['site/references'])?>#<?=$event->refs[$i]->refId?>"><?=$event->refs[$i]->refId?></a><?php endfor;?>]
                            <?php endif;?>
                        </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>

        <nav>
            <ul class="pagination">
                <li class="<?=$start==1935 && $end==1970 ? 'active' : ''?>"><a href="<?=Url::to(['site/timeline', 'start'=>1935, 'end'=>1970])?>">1935 &ndash; 1970</a></li>
                <li class="<?=$start==1970 && $end==1980 ? 'active' : ''?>"><a href="<?=Url::to(['site/timeline', 'start'=>1970, 'end'=>1980])?>">1970 &ndash; 1980</a></li>
                <li class="<?=$start==1980 && $end==1990 ? 'active' : ''?>"><a href="<?=Url::to(['site/timeline', 'start'=>1980, 'end'=>1990])?>">1980 &ndash; 1990</a></li>
                <li class="<?=$start==1990 && $end==2010 ? 'active' : ''?>"><a href="<?=Url::to(['site/timeline', 'start'=>1990, 'end'=>2010])?>">1990 &ndash; 2011</a></li>
                <li class="<?=!$start && !$end ? 'active' : ''?>"><a href="<?=Url::to(['site/timeline'])?>">All</a></li>
            </ul>
        </nav>

    </div>
</div>


<div>
    <div class="col-xs-12">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-1786819164979340" data-ad-slot="4622235716" data-ad-format="auto"></ins>
        <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
    </div>
</div>
