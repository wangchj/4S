<?php
$this->title = "Timeline";
?>
<style>
    .table > thead > tr > th, .table > tbody > tr > td {
        line-height: 170%;
    }
</style>
<div class="row">
    <div class="col-sm-10">
        <h1>Timeline from 1955-2011</h1>

        <hr />
        
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
                        <td><?=str_replace("\n", '<br/>', $event->text)?></td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
    <div class="col-sm-12">
    </div>
</div>

