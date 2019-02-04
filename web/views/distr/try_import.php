<?php
/** @var $item \app\Component\ImportComponent\Classes\ImportRow */
?>
<tr>
    <td><?= \yii\helpers\Html::encode($item->getProductName()) ?></td>
    <td><?= \yii\helpers\Html::encode($item->getAptekaName()) ?></td>
    <td><?= \yii\helpers\Html::encode($item->getQuantity()) ?></td>
</tr>
