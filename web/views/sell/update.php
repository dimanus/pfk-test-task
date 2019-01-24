<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sells */

$this->title = 'Update Sells: ' . $model->id_sell;
$this->params['breadcrumbs'][] = ['label' => 'Sells', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_sell, 'url' => ['view', 'id' => $model->id_sell]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sells-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
