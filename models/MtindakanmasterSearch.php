<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mtindakanmaster;
use yii\data\SqlDataProvider;
use yii\db\Query;
use yii\db\Command;

/**
 * MtindakanmasterSearch represents the model behind the search form about `app\models\Mtindakanmaster`.
 */
class MtindakanmasterSearch extends Mtindakanmaster
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tindakan'], 'integer'],
            [['nama_tindakan'], 'safe'],
            [['harga'], 'number'],
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
        $query = Mtindakanmaster::find();

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
            'id_tindakan' => $this->id_tindakan,
            'harga' => $this->harga,
        ]);

        $query->andFilterWhere(['like', 'nama_tindakan', $this->nama_tindakan]);

        return $dataProvider;
    }

    public function searchindex($params)
    {
        $query = new Query;
       
       $query="select*from master.tindakan_master";
        $keyWord  = htmlspecialchars($_GET['cari_tindakan'], ENT_QUOTES);
         if($_GET['cari_tindakan']!=''){
          $query .=" where  upper(nama_tindakan) like'%".strtoupper($keyWord)."%'";
         }

        // add conditions that should always apply here

        $jml = Yii::$app->db->createCommand(" select count(*) from (".$query.")a  ")->queryScalar();  
        $dataProvider = new SqlDataProvider([
            'sql' => $query,
            'totalCount' => (int)$jml,
            'pagination' => [
            'pageSize' => 10,
      ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        


        return $dataProvider;
    }
}
