<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EventRef */

$this->title = 'Create Event Ref';
$this->params['breadcrumbs'][] = ['label' => 'Event Refs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-ref-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
