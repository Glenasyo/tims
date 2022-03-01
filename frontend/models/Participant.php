<?php

namespace frontend\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "participant".
 *
 * @property string $par_firstname
 * @property string $par_middlename
 * @property string $par_lastname
 * @property string|null $par_bloodtype
 * @property string|null $par_birthdate
 * @property string|null $par_course
 * @property string|null $par_specialization
 * @property string|null $par_office
 * @property string|null $par_designation
 * @property string|null $par_emailaddress
 * @property string $par_address
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int $par_id
 * @property int|null $par_gender
 * @property int|null $par_civilstatus
 * @property string|null $par_contactnumber
 * @property int|null $par_education
 *
 * @property User $createdBy
 * @property TrainingDatabank[] $trainingDatabanks
 * @property User $updatedBy
 */
use yii\behaviors\BlameableBehavior;

class Participant extends \yii\db\ActiveRecord
{   
    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;

    const CS_SINGLE = 1;
    const CS_MARRIED = 2;
    const CS_SEPARATED = 3;
    const CS_DIVORCED = 4;
    const CS_WIDOWED = 5;

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
        return 'participant';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['par_firstname', 'par_middlename', 'par_lastname', 'par_address'], 'required'],
            [['par_birthdate'], 'safe'],
            [['created_by', 'updated_by', 'par_education'], 'default', 'value' => null],
            [['created_by', 'updated_by', 'par_education'], 'integer'],
            [['created_at', 'updated_at', 'par_contactnumber'], 'string'],
            [['par_firstname', 'par_middlename', 'par_lastname', 'par_bloodtype', 'par_course', 'par_specialization', 'par_office', 'par_designation', 'par_emailaddress', 'par_address'], 'string', 'max' => 255],
            [['par_gender'], 'in', 'range' => [NULL, self::GENDER_MALE, self::GENDER_FEMALE]],
            [['par_civilstatus'], 'in', 'range' => [NULL, self::CS_SINGLE, self::CS_MARRIED, self::CS_SEPARATED, self::CS_DIVORCED, self::CS_WIDOWED]],
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
            'par_firstname' => 'First Name',
            'par_middlename' => 'Middle Name',
            'par_lastname' => 'Last Name',
            'par_bloodtype' => 'Blood Type',
            'par_birthdate' => 'Birth Date',
            'par_course' => 'Course (If Any)',
            'par_specialization' => 'Field Specialization',
            'par_office' => 'Office/Agency/Division',
            'par_designation' => 'Position/Designation',
            'par_emailaddress' => 'Email Address',
            'par_address' => 'Address',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'par_id' => 'Participant ID #',
            'par_gender' => 'Gender',
            'par_civilstatus' => 'Civil Status',
            'par_contactnumber' => 'Contact Number',
            'par_education' => 'Education',
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
        return $this->hasMany(TrainingDatabank::className(), ['par_id' => 'par_id']);
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
