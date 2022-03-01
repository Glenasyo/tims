<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Trainer;

/**
 * TrainerSearch represents the model behind the search form of `frontend\models\Trainer`.
 */
class TrainerSearch extends Trainer
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['trainer_firstname', 'trainer_middlename', 'trainer_lastname', 'trainer_contactnumber', 'trainer_specialization', 'trainer_office', 'trainer_designation', 'created_at', 'updated_at', 'trainer_birthdate', 'trainer_emailaddress', 'trainer_bloodtype', 'trainer_address', 'trainer_course'], 'safe'],
            [['created_by', 'updated_by', 'trainer_id', 'trainer_gender', 'trainer_civilstatus', 'trainer_education'], 'integer'],
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
        $query = Trainer::find();

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
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'trainer_id' => $this->trainer_id,
            'trainer_gender' => $this->trainer_gender,
            'trainer_civilstatus' => $this->trainer_civilstatus,
            'trainer_birthdate' => $this->trainer_birthdate,
            'trainer_education' => $this->trainer_education,
        ]);

        $query->andFilterWhere(['ilike', 'trainer_firstname', $this->trainer_firstname])
            ->andFilterWhere(['ilike', 'trainer_middlename', $this->trainer_middlename])
            ->andFilterWhere(['ilike', 'trainer_lastname', $this->trainer_lastname])
            ->andFilterWhere(['ilike', 'trainer_contactnumber', $this->trainer_contactnumber])
            ->andFilterWhere(['ilike', 'trainer_specialization', $this->trainer_specialization])
            ->andFilterWhere(['ilike', 'trainer_office', $this->trainer_office])
            ->andFilterWhere(['ilike', 'trainer_designation', $this->trainer_designation])
            ->andFilterWhere(['ilike', 'created_at', $this->created_at])
            ->andFilterWhere(['ilike', 'updated_at', $this->updated_at])
            ->andFilterWhere(['ilike', 'trainer_emailaddress', $this->trainer_emailaddress])
            ->andFilterWhere(['ilike', 'trainer_bloodtype', $this->trainer_bloodtype])
            ->andFilterWhere(['ilike', 'trainer_address', $this->trainer_address])
            ->andFilterWhere(['ilike', 'trainer_course', $this->trainer_course]);

        return $dataProvider;
    }
}
