<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Distr */
/* @var $component \app\Component\ImportComponent\ImportComponent */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Distrs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="distr-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_distr], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_distr], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_distr',
            'name',
        ],
    ]) ?>
    <hr>
<h4>Шаблон импорта</h4>
    <?php echo Html::encode($model->distrTemplate->template) ?> <?= Html::a('Править',['distr-template/update','id'=>$model->distrTemplate->id]); ?>
    <?php $form = \yii\widgets\ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($upload_form, 'importFile')->fileInput() ?>

    <button>Submit</button>

    <?php \yii\widgets\ActiveForm::end() ?>
    <hr>
    <?php
    if($component->getImportObjects()->count()){
       ?><h2> imported <?= $component->getImportObjects()->count() ?> objects</h2> <?php
    }
    ?>
    <hr>
    <?php
    if($component->getErrorObjects()->count()){
        echo '<h2>Non imported objects</h2>';
        echo '<table>';
        foreach ($component->getErrorObjects()->getItems() as $item) {
            echo $this->render('try_import', ['item' => $item]);
        }
        echo '</table>';
    }
    ?>
</div>
