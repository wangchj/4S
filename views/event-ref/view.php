<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EventRef */

$this->title = $model->eventId;
$this->params['breadcrumbs'][] = ['label' => 'Event Refs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-ref-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'eventId' => $model->eventId, 'refId' => $model->refId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'eventId' => $model->eventId, 'refId' => $model->refId], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'eventId',
            'refId',
        ],
    ]) ?>

</div>
