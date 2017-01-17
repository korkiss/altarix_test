<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CronResults */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cron-results-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'date_request')->textInput() ?>

    <?= $form->field($model, 'date_response')->textInput() ?>

    <?= $form->field($model, 'delay')->textInput() ?>

    <?= $form->field($model, 'result')->checkbox() ?>

    <?= $form->field($model, 'headers')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
