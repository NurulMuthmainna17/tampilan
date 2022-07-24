<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\personal */

$this->title = $model->ID_personal;
$this->params['breadcrumbs'][] = ['label' => 'Personals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="personal-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'ID_personal' => $model->ID_personal], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ID_personal' => $model->ID_personal], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_personal',
            'nama_lengkap',
            'jk',
            'no_hp',
            'alamat',
            'status',
            'tempat_lahir',
            'tgl_lhr',
        ],
    ]) ?>

</div>
