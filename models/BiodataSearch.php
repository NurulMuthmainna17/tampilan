<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Biodata;

/**
 * BiodataSearch represents the model behind the search form of `app\models\Biodata`.
 */
class BiodataSearch extends Biodata
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nim'], 'integer'],
            [['nama_lengkap', 'nama_panggilan', 'kelas', 'jk', 'semester'], 'safe'],
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
        $query = Biodata::find();

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
            'nim' => $this->nim,
        ]);

        $query->andFilterWhere(['like', 'nama_lengkap', $this->nama_lengkap])
            ->andFilterWhere(['like', 'nama_panggilan', $this->nama_panggilan])
            ->andFilterWhere(['like', 'kelas', $this->kelas])
            ->andFilterWhere(['like', 'jk', $this->jk])
            ->andFilterWhere(['like', 'semester', $this->semester]);

        return $dataProvider;
    }
}
