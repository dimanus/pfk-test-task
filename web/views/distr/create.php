<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Distr */

$this->title = 'Create Distr';
$this->params['breadcrumbs'][] = ['label' => 'Distrs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="distr-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
