<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\pegawai */

$this->title = 'Update Pegawai: ' . $model->ID_pegawai;
$this->params['breadcrumbs'][] = ['label' => 'Pegawais', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_pegawai, 'url' => ['view', 'ID_pegawai' => $model->ID_pegawai]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pegawai-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
