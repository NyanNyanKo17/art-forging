<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Products $model */

$this->title = 'Редактирование данных: ' . $model->name;
 $this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
 $this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
 $this->params['breadcrumbs'][] = 'Update';
?>
<div class="products-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    

</div>
