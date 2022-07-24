<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_diri".
 *
 * @property int $ID_personal
 * @property string $nama_lengkap
 * @property string $jk
 * @property int $no_hp
 * @property string $alamat
 * @property string $status
 * @property string $tempat_lahir
 * @property string $tgl_lhr
 *
 * @property DataPegawai[] $dataPegawais
 */
class DataDiri extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_diri';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_lengkap', 'jk', 'no_hp', 'alamat', 'status', 'tempat_lahir', 'tgl_lhr'], 'required'],
            [['jk'], 'string'],
            [['no_hp'], 'integer'],
            [['tgl_lhr'], 'safe'],
            [['nama_lengkap'], 'string', 'max' => 150],
            [['alamat'], 'string', 'max' => 60],
            [['status'], 'string', 'max' => 50],
            [['tempat_lahir'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_personal' => 'Id Personal',
            'nama_lengkap' => 'Nama Lengkap',
            'jk' => 'Jk',
            'no_hp' => 'No Hp',
            'alamat' => 'Alamat',
            'status' => 'Status',
            'tempat_lahir' => 'Tempat Lahir',
            'tgl_lhr' => 'Tgl Lhr',
        ];
    }

    /**
     * Gets query for [[DataPegawais]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDataPegawais()
    {
        return $this->hasMany(DataPegawai::className(), ['ID_personal' => 'ID_personal']);
    }
}
