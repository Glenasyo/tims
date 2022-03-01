<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Participant;

/**
 * ParticipantSearch represents the model behind the search form of `frontend\models\Participant`.
 */
class ParticipantSearch extends Participant
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['par_firstname', 'par_middlename', 'par_lastname', 'par_bloodtype', 'par_birthdate', 'par_course', 'par_specialization', 'par_office', 'par_designation', 'par_emailaddress', 'par_address', 'created_at', 'updated_at', 'par_contactnumber'], 'safe'],
            [['created_by', 'updated_by', 'par_id', 'par_gender', 'par_civilstatus', 'par_education'], 'integer'],
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
        $query = Participant::find();

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
            'par_birthdate' => $this->par_birthdate,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'par_id' => $this->par_id,
            'par_gender' => $this->par_gender,
            'par_civilstatus' => $this->par_civilstatus,
            'par_education' => $this->par_education,
        ]);

        $query->andFilterWhere(['ilike', 'par_firstname', $this->par_firstname])
            ->andFilterWhere(['ilike', 'par_middlename', $this->par_middlename])
            ->andFilterWhere(['ilike', 'par_lastname', $this->par_lastname])
            ->andFilterWhere(['ilike', 'par_bloodtype', $this->par_bloodtype])
            ->andFilterWhere(['ilike', 'par_course', $this->par_course])
            ->andFilterWhere(['ilike', 'par_specialization', $this->par_specialization])
            ->andFilterWhere(['ilike', 'par_office', $this->par_office])
            ->andFilterWhere(['ilike', 'par_designation', $this->par_designation])
            ->andFilterWhere(['ilike', 'par_emailaddress', $this->par_emailaddress])
            ->andFilterWhere(['ilike', 'par_address', $this->par_address])
            ->andFilterWhere(['ilike', 'created_at', $this->created_at])
            ->andFilterWhere(['ilike', 'updated_at', $this->updated_at])
            ->andFilterWhere(['ilike', 'par_contactnumber', $this->par_contactnumber]);

        return $dataProvider;
    }
}
