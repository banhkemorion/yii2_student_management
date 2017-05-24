<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClassModel */
/* @var $form ActiveForm */
?>
<div class="class-room-form">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'room_name') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- class-room-form -->
