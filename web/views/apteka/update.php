<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Apteka */
$this->title = 'Update Apteka: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Aptekas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id_apteka]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="apteka-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
