<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserModel */
/* @var $form ActiveForm */
?>
<div class="user-student">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'avatar') ?>
        <?= $form->field($model, 'notes') ?>
        <?= $form->field($model, 'class_id') ?>
        <?= $form->field($model, 'user_name') ?>
        <?= $form->field($model, 'firt_name') ?>
        <?= $form->field($model, 'last_name') ?>
        <?= $form->field($model, 'password') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- user-student -->
