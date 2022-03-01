<?php

namespace frontend\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "training".
 *
 * @property string $training_title
 * @property string $training_desc
 * @property string|null $training_date
 * @property string $code
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string $training_trainer
 * @property int $training_id
 * @property string|null $training_location
 *
 * @property User $createdBy
 * @property TrainingDatabank[] $trainingDatabanks
 * @property User $updatedBy
 */

use yii\behaviors\BlameableBehavior;

class Training extends \yii\db\ActiveRecord
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
        return 'training';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['training_title', 'training_desc', 'code'], 'required'],
            [['training_date'], 'safe'],
            [['code', 'created_at', 'updated_at'], 'string'],
            [['created_by', 'updated_by'], 'default', 'value' => null],
            [['created_by', 'updated_by'], 'integer'],
            [['training_title', 'training_desc', 'training_location'], 'string', 'max' => 255],
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
            'training_title' => 'Training Title',
            'training_desc' => 'Training Description',
            'training_date' => 'Training Date',
            'code' => 'Training Code',
            //'created_by' => 'Created By',
            //'updated_by' => 'Updated By',
            //'created_at' => 'Created At',
            //'updated_at' => 'Updated At',
            'training_trainer' => 'Training Trainer',
            'training_id' => 'Training ID',
            'training_location' => 'Training Location/Venue',
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
     * Gets query for [[TrainingDatabanks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrainingDatabanks()
    {
        return $this->hasMany(TrainingDatabank::className(), ['training_id' => 'training_id']);
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
