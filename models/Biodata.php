<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "biodata".
 *
 * @property string $nama_lengkap
 * @property string $nama_panggilan
 * @property int $nim
 * @property string $kelas
 * @property string $jk
 * @property string $semester
 */
class Biodata extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'biodata';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_lengkap', 'nama_panggilan', 'nim', 'kelas', 'jk', 'semester'], 'required'],
            [['nim'], 'integer'],
            [['jk'], 'string'],
            [['nama_lengkap'], 'string', 'max' => 100],
            [['nama_panggilan'], 'string', 'max' => 40],
            [['kelas'], 'string', 'max' => 20],
            [['semester'], 'string', 'max' => 11],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nama_lengkap' => 'Nama Lengkap',
            'nama_panggilan' => 'Nama Panggilan',
            'nim' => 'Nim',
            'kelas' => 'Kelas',
            'jk' => 'Jk',
            'semester' => 'Semester',
        ];
    }
}
