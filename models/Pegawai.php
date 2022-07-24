<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pegawai".
 *
 * @property int $ID_pegawai
 * @property int $ID_personal
 * @property string $nama_lengkap
 * @property string $tempat_lahir
 * @property string $tgl_lahir
 * @property string $jk
 * @property string $tgl_masuk
 * @property string $pendidikan
 *
 * @property Personal $personal
 */
class Pegawai extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pegawai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_personal', 'nama_lengkap', 'tempat_lahir', 'tgl_lahir', 'jk', 'tgl_masuk', 'pendidikan'], 'required'],
            [['ID_personal'], 'integer'],
            [['tgl_lahir', 'tgl_masuk'], 'safe'],
            [['jk'], 'string'],
            [['nama_lengkap'], 'string', 'max' => 150],
            [['tempat_lahir'], 'string', 'max' => 40],
            [['pendidikan'], 'string', 'max' => 50],
            [['ID_personal'], 'exist', 'skipOnError' => true, 'targetClass' => Personal::className(), 'targetAttribute' => ['ID_personal' => 'ID_personal']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_pegawai' => 'Id Pegawai',
            'ID_personal' => 'Id Personal',
            'nama_lengkap' => 'Nama Lengkap',
            'tempat_lahir' => 'Tempat Lahir',
            'tgl_lahir' => 'Tgl Lahir',
            'jk' => 'Jk',
            'tgl_masuk' => 'Tgl Masuk',
            'pendidikan' => 'Pendidikan',
        ];
    }

    /**
     * Gets query for [[Personal]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersonal()
    {
        return $this->hasOne(Personal::className(), ['ID_personal' => 'ID_personal']);
    }
}
