<?php
namespace app\components;
use Yii;
use yii\db\Query;
use yii\db\Command;
use yii\web\Session;
use yii\base\Widget;
use yii\helpers\ArrayHelper;

class Fungsi extends Widget{

    public function init(){
        parent::init();
    }


	public function getNomor(){
		$connection = \Yii::$app->db;
		$query=new Query();
        $sql="select lpad(trim(to_char(COALESCE(max(cast(ltrim(right(id_rekam,5),'0')as integer)),0)+1,'999999')),5,'0') as nomor
			from rumah_sakit.rekam where substring(id_rekam,4,8)='".date('Ymd')."'";
        $query= $connection->createCommand($sql)->queryOne();
		$nomor='REC'.date('Ymd').$query['nomor'];
		return $nomor;
	}

	public function getRanap(){
		$connection = \Yii::$app->db;
		$query=new Query();
        $sql="select lpad(trim(to_char(COALESCE(max(cast(ltrim(right(id_rawat_inap,5),'0')as integer)),0)+1,'999999')),5,'0') as nomor
			from rumah_sakit.rawat_inap where substring(id_rawat_inap,4,8)='".date('Ymd')."'";
        $query= $connection->createCommand($sql)->queryOne();
		$nomor='RNP'.date('Ymd').$query['nomor'];
		return $nomor;
	}

	public function getRajal(){
		$connection = \Yii::$app->db;
		$query=new Query();
        $sql="select lpad(trim(to_char(COALESCE(max(cast(ltrim(right(id_rawat_jalan,5),'0')as integer)),0)+1,'999999')),5,'0') as nomor
			from rumah_sakit.rawat_jalan where substring(id_rawat_jalan,4,8)='".date('Ymd')."'";
        $query= $connection->createCommand($sql)->queryOne();
		$nomor='RJL'.date('Ymd').$query['nomor'];
		return $nomor;
	}
}
