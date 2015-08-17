<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $event app\models\Event */

$this->title = 'Update Event: ' . ' ' . $event->eventId;
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $event->eventId, 'url' => ['view', 'id' => $event->eventId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="event-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'event' => $event,
    ]) ?>

</div>
