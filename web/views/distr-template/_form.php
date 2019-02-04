<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DistrImportTemplate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="distr-import-template-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_distr')->dropDownList(\app\models\Distr::find()->indexBy('id_distr')->select('name')->column())?>

    <?= $form->field($model, 'template')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'split')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'header')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
