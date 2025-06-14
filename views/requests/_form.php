<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Requests $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="requests-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Имя') ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true])->label('Телефон') ?>

    <?= $form->field($model, 'message')->textarea(['rows' => 6])->label('Сообщение') ?>

    <?= $form->field($model, 'created_at')->textInput()->label('Дата заявки') ?>

     <!-- Новое поле для ответа администратора -->
    <?= $form->field($model, 'admin_reply')->textarea(['rows' => 4])->label('Ответ администратора') ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
