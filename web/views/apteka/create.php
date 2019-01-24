<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Apteka */
$this->title = 'Create Apteka';
$this->params['breadcrumbs'][] = ['label' => 'Aptekas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apteka-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
