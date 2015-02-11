<?php

namespace backend\modules\manage\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\manage\models\InstituteDetails;

/**
 * InstituteDetailsSearch represents the model behind the search form about `backend\modules\manage\models\InstituteDetails`.
 */
class InstituteDetailsSearch extends InstituteDetails
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['institute_id', 'estd', 'zoom', 'created_at', 'updated_at', 'user_id', 'status'], 'integer'],
            [['name', 'address', 'email', 'contact_person', 'landline_number', 'phone_number', 'website', 'affiliation', 'awards', 'logo', 'longitude', 'latitude'], 'safe'],
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
        $query = InstituteDetails::find()->where(['status'=>'1']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'institute_id' => $this->institute_id,
            'estd' => $this->estd,
            'zoom' => $this->zoom,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user_id' => $this->user_id,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'contact_person', $this->contact_person])
            ->andFilterWhere(['like', 'landline_number', $this->landline_number])
            ->andFilterWhere(['like', 'phone_number', $this->phone_number])
            ->andFilterWhere(['like', 'website', $this->website])
            ->andFilterWhere(['like', 'affiliation', $this->affiliation])
            ->andFilterWhere(['like', 'awards', $this->awards])
            ->andFilterWhere(['like', 'logo', $this->logo])
            ->andFilterWhere(['like', 'longitude', $this->longitude])
            ->andFilterWhere(['like', 'latitude', $this->latitude]);

        return $dataProvider;
    }
}