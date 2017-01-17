<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CronResultsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cron-results-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'body') ?>

    <?= $form->field($model, 'date_request') ?>

    <?= $form->field($model, 'date_response') ?>

    <?= $form->field($model, 'delay') ?>

    <?= $form->field($model, 'result')->checkbox() ?>

    <?php // echo $form->field($model, 'headers') ?>

    <?php // echo $form->field($model, 'id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
