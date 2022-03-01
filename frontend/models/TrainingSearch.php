<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Training;

/**
 * TrainingSearch represents the model behind the search form of `frontend\models\Training`.
 */
class TrainingSearch extends Training
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['training_title', 'training_desc', 'training_date', 'code', 'created_at', 'updated_at', 'training_trainer', 'training_location'], 'safe'],
            [['created_by', 'updated_by', 'training_id'], 'integer'],
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
        $query = Training::find();

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
            'training_date' => $this->training_date,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'training_id' => $this->training_id,
        ]);

        $query->andFilterWhere(['ilike', 'training_title', $this->training_title])
            ->andFilterWhere(['ilike', 'training_desc', $this->training_desc])
            ->andFilterWhere(['ilike', 'code', $this->code])
            ->andFilterWhere(['ilike', 'created_at', $this->created_at])
            ->andFilterWhere(['ilike', 'updated_at', $this->updated_at])
            ->andFilterWhere(['ilike', 'training_trainer', $this->training_trainer])
            ->andFilterWhere(['ilike', 'training_location', $this->training_location]);

        return $dataProvider;
    }
}
