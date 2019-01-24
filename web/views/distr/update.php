<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Distr */

$this->title = 'Update Distr: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Distrs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id_distr]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="distr-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
