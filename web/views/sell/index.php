<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sells';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sells-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Sells', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_sell',
            'id_distr',
            'id_product',
            'id_apteka',
            'quantity',
            //'dt_create',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
