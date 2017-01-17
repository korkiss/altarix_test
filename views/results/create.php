<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CronResults */

$this->title = 'Create Cron Results';
$this->params['breadcrumbs'][] = ['label' => 'Cron Results', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cron-results-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
