<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\personal */

$this->title = 'Update Personal: ' . $model->ID_personal;
$this->params['breadcrumbs'][] = ['label' => 'Personals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_personal, 'url' => ['view', 'ID_personal' => $model->ID_personal]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="personal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
