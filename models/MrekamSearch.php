<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mrekam;

/**
 * MrekamSearch represents the model behind the search form about `app\models\Mrekam`.
 */
class MrekamSearch extends Mrekam
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_dokter'], 'integer'],
            [['id_order', 'keluhan', 'resep', 'tanggal', 'id_pasien'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Mrekam::find();

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
            'id' => $this->id,
            'tanggal' => $this->tanggal,
            'id_dokter' => $this->id_dokter,
        ]);

        $query->andFilterWhere(['like', 'id_order', $this->id_order])
            ->andFilterWhere(['like', 'keluhan', $this->keluhan])
            ->andFilterWhere(['like', 'resep', $this->resep])
            ->andFilterWhere(['like', 'id_pasien', $this->id_pasien]);

        return $dataProvider;
    }
}
