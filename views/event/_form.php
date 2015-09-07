<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $event app\models\Event */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($event, 'year')->textInput() ?>

    <?= $form->field($event, 'month')->textInput() ?>

    <?= $form->field($event, 'date')->textInput() ?>

    <?= $form->field($event, 'season')->textInput() ?>

    <?= $form->field($event, 'title')->textInput() ?>

    <?= $form->field($event, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($event, 'refInput')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($event->isNewRecord ? 'Create' : 'Update', ['class' => $event->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
