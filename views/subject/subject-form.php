<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Chairs */
/* @var $form ActiveForm */
?>
<div class="chair-chair-form">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'subject_name') ?>
        <?= Html::activeDropDownList($model, 'class_id', 
                    ArrayHelper::map($rooms, 'room_id', 'room_name'), 
                    ['class' => 'form-control']) ?>
        <br>
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- chair-chair-form -->
