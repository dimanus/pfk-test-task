<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cross */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cross-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_distr')->dropDownList(\app\models\Distr::find()->indexBy('id_distr')->select('name')->column() ,['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->dropDownList(\app\models\Cross::getTypes()) ?>

    <?= $form->field($model, 'id_inital')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
