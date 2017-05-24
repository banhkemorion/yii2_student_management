<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserModel */
/* @var $form ActiveForm */
?>
<div class="user-add_new_user">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'user_name') ?>
        <?= $form->field($model, 'password') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Tao Moi', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- user-add_new_user -->
