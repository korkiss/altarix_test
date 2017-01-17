<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CronResults */

$this->title = 'Update Cron Results: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cron Results', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cron-results-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
