<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mrekam;
use yii\data\SqlDataProvider;
use yii\db\Query;
use yii\db\Command;

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
            [['id'], 'integer'],
            [['keluhan', 'resep', 'tanggal', 'id_pasien'], 'safe'],
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
        // $query = Mrekam::find();
        $query = new Query;
       
       $query="select a.id_rekam,a.id_order as id_pasien,b.nama,a.tanggal, a.keluhan_awal 
       from rumah_sakit.rekam a
       inner join rumah_sakit.pasien b on a.id_order=b.id_order
       left join rumah_sakit.rawat_jalan c on a.id_rekam=c.id_rekam
       left join rumah_sakit.rawat_inap d on a.id_rekam=d.id_rekam";
        $keyWord  = htmlspecialchars($_GET['MrekamSearch']['id_order'], ENT_QUOTES);
         if($_GET['MrekamSearch']['id_order']!=''){
          $query .=" where  a.id_order ='".strtoupper($keyWord)."'";
          $query .=" or  a.id_rekam ='".strtoupper($keyWord)."'";
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
