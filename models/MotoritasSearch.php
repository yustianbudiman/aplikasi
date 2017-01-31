<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Motoritas;
use app\models\Mrole;

/**
 * MotoritasSearch represents the model behind the search form about `app\models\Motoritas`.
 */
class MotoritasSearch extends Motoritas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'role', 'menu'], 'integer'],
            [['nama_role'], 'string'],
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
        $query = Mrole::findBySql('select distinct a.id,a.role from "user".t_role a inner join "user".t_otoritas b on a.id=b.role');
        // $query = Motoritas::find();

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
            'role' => $this->role,
            'menu' => $this->menu,
        ]);

        return $dataProvider;
    }
}
