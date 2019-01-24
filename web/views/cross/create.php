<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cross */

$this->title = 'Create Cross';
$this->params['breadcrumbs'][] = ['label' => 'Crosses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cross-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
