<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\User;

/**
 * UserSearch represents the model behind the search form about `common\models\User`.
 */
class UserSearch extends User
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'username', 'auth_key', 'password_hash', 'password_reset_token', 'email', 'nama', 'nrp', 'alamat_asal', 'alamat_sby', 'tanggal_lahir', 'jenis_kelamin', 'nomor_telp', 'photo'], 'safe'],
            [['angkatan', 'status_user', 'status', 'updated_at'], 'integer'],
			[['departemen_id', 'status_legal'], 'safe'],
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
        $query = User::find();
		
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
		
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
		
		$dataProvider->query->joinWith([
			'departemen'=> function ($q){
				$q->from('departemen');  // join with tabel alias
			}
		]);
		
        $query->andFilterWhere([
            'angkatan' => $this->angkatan,
            'status_legal' => $this->status_legal,
            'status_user' => $this->status_user,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'departemen.nama', $this->departemen_id])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'nrp', $this->nrp])
            ->andFilterWhere(['like', 'alamat_asal', $this->alamat_asal])
            ->andFilterWhere(['like', 'alamat_sby', $this->alamat_sby])
            ->andFilterWhere(['like', 'tanggal_lahir', $this->tanggal_lahir])
            ->andFilterWhere(['like', 'jenis_kelamin', $this->jenis_kelamin])
            ->andFilterWhere(['like', 'nomor_telp', $this->nomor_telp])
            ->andFilterWhere(['like', 'photo', $this->photo]);

        return $dataProvider;
    }
}
