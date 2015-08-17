<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EventRef */

$this->title = 'Update Event Ref: ' . ' ' . $model->eventId;
$this->params['breadcrumbs'][] = ['label' => 'Event Refs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->eventId, 'url' => ['view', 'eventId' => $model->eventId, 'refId' => $model->refId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="event-ref-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
