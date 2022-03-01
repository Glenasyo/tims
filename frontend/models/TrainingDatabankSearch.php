<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Trainingdatabank;

/**
 * TrainingdatabankSearch represents the model behind the search form of `frontend\models\Trainingdatabank`.
 */
class TrainingdatabankSearch extends Trainingdatabank
{
    /**
     * {@inheritdoc}
     */


    public function rules()
    {
        return [
            [['par_id', 'training_id', 'created_by', 'updated_by', 'databank_id', 'grade_posttest', 'grade_pretest'], 'integer'],
            [['databank_serialnum', 'created_at', 'updated_at'], 'safe'],
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
        $query = Trainingdatabank::find();

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
            'par_id' => $this->par_id,
            'training_id' => $this->training_id,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'databank_id' => $this->databank_id,
            'grade_posttest' => $this->grade_posttest,
            'grade_pretest' => $this->grade_pretest,
        ]);

        $query->andFilterWhere(['ilike', 'databank_serialnum', $this->databank_serialnum])
            ->andFilterWhere(['ilike', 'created_at', $this->created_at])
            ->andFilterWhere(['ilike', 'updated_at', $this->updated_at]);
        
        return $dataProvider;
    }
}
