<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Distr Import Templates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="distr-import-template-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Distr Import Template', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_distr',
            'template',
            'split',
            'header',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
