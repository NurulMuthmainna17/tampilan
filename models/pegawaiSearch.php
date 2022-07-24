<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\pegawai;

/**
 * pegawaiSearch represents the model behind the search form of `app\models\pegawai`.
 */
class pegawaiSearch extends pegawai
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_pegawai', 'ID_personal'], 'integer'],
            [['nama_lengkap', 'tempat_lahir', 'tgl_lahir', 'jk', 'tgl_masuk', 'pendidikan'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = pegawai::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'ID_pegawai' => $this->ID_pegawai,
            'ID_personal' => $this->ID_personal,
            'tgl_lahir' => $this->tgl_lahir,
            'tgl_masuk' => $this->tgl_masuk,
        ]);

        $query->andFilterWhere(['like', 'nama_lengkap', $this->nama_lengkap])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'jk', $this->jk])
            ->andFilterWhere(['like', 'pendidikan', $this->pendidikan]);

        return $dataProvider;
    }
}
