<?php

namespace frontend\models;

use Yii;
use common\models\User;
/**
 * This is the model class for table "training_databank".
 *
 * @property int $par_id
 * @property int $training_id
 * @property string|null $databank_serialnum
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int $databank_id
 * @property int|null $grade_posttest
 * @property int|null $grade_pretest
 *
 * @property User $createdBy
 * @property Participant $par
 * @property Training $training
 * @property User $updatedBy
 */

use yii\behaviors\BlameableBehavior;

class Trainingdatabank extends \yii\db\ActiveRecord
{
      public function behaviors()
    {
        return [
            
                  [
                      'class' => BlameableBehavior::className(),
                      'value'=> (Yii::$app->user->isGuest) ? 1 : Yii::$app->user->identity->id, 
                  ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'training_databank';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['par_id', 'training_id'], 'required'],
            [['par_id', 'training_id', 'created_by', 'updated_by', 'grade_posttest', 'grade_pretest'], 'default', 'value' => null],
            [['par_id', 'training_id', 'created_by', 'updated_by', 'grade_posttest', 'grade_pretest'], 'integer'],
            [['databank_serialnum', 'created_at', 'updated_at'], 'string'],
            [['par_id'], 'exist', 'skipOnError' => true, 'targetClass' => Participant::className(), 'targetAttribute' => ['par_id' => 'par_id']],
            [['training_id'], 'exist', 'skipOnError' => true, 'targetClass' => Training::className(), 'targetAttribute' => ['training_id' => 'training_id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'par_id' => 'Participant',
            'training_id' => 'Training Title',
            'databank_serialnum' => 'Serial Number',           
            'databank_id' => 'Databank ID',
            'grade_pretest' => 'Grade Pre Test',
            'grade_posttest' => 'Grade Post Test',
            //'created_by' => 'Created By',
            //'updated_by' => 'Updated By',
            //'created_at' => 'Created At',
            //'updated_at' => 'Updated At',
            
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * Gets query for [[Par]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPar()
    {
        return $this->hasOne(Participant::className(), ['par_id' => 'par_id']);
    }

    /**
     * Gets query for [[Training]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTraining()
    {
        return $this->hasOne(Training::className(), ['training_id' => 'training_id']);
    }

    /**
     * Gets query for [[UpdatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
}
