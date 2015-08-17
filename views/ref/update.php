<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ref */

$this->title = 'Update Ref: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Refs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->refId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ref-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>