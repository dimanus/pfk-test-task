<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Crosses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cross-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Cross', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_cross',
            'id_distr'=>'distr.name',
            'name',
            'type'=>['label'=>'Type','value'=>function($data){return \app\models\Cross::getTypes($data->type);}],
            'id_inital'=>['label'=>'Соответствие','filter'=>'id_inital','value'=>function($data){return $data->type==\app\models\Cross::APTEKA ? $data->apteka->name:$data->product->name;}],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
