<?php

namespace frontend\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "trainer".
 *
 * @property string $trainer_firstname
 * @property string $trainer_middlename
 * @property string $trainer_lastname
 * @property string $trainer_contactnumber
 * @property string|null $trainer_specialization
 * @property string|null $trainer_office
 * @property string|null $trainer_designation
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int $trainer_id
 * @property int|null $trainer_gender
 * @property int|null $trainer_civilstatus
 * @property string|null $trainer_birthdate
 * @property int|null $trainer_education
 * @property string|null $trainer_emailaddress
 * @property string|null $trainer_bloodtype
 * @property string|null $trainer_address
 * @property string|null $trainer_course
 *
 * @property User $createdBy
 * @property User $updatedBy
 */
use yii\behaviors\BlameableBehavior;

class Trainer extends \yii\db\ActiveRecord
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
        return 'trainer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['trainer_firstname', 'trainer_middlename', 'trainer_lastname', 'trainer_contactnumber'], 'required'],
            [['created_by', 'updated_by', 'trainer_gender', 'trainer_civilstatus', 'trainer_education'], 'default', 'value' => null],
            [['created_by', 'updated_by', 'trainer_education'], 'integer'],
            [['created_at', 'updated_at', 'trainer_emailaddress', 'trainer_bloodtype', 'trainer_address', 'trainer_course'], 'string'],
            [['trainer_birthdate'], 'safe'],
            [['trainer_firstname', 'trainer_middlename', 'trainer_lastname', 'trainer_contactnumber', 'trainer_specialization', 'trainer_office', 'trainer_designation'], 'string', 'max' => 255],
            [['trainer_gender'], 'in', 'range' => [NULL, self::GENDER_MALE, self::GENDER_FEMALE]],
            [['trainer_civilstatus'], 'in', 'range' => [NULL, self::CS_SINGLE, self::CS_MARRIED, self::CS_SEPARATED, self::CS_DIVORCED, self::CS_WIDOWED]],
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
            'trainer_firstname' => 'First Name',
            'trainer_middlename' => 'Middle Name',
            'trainer_lastname' => 'Last Name',
            'trainer_contactnumber' => 'Contact Number',
            'trainer_specialization' => 'Field Specialization',
            'trainer_office' => 'Office/Agency/Division',
            'trainer_designation' => 'Position/Designation',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'trainer_id' => 'Trainer ID #',
            'trainer_gender' => 'Gender',
            'trainer_civilstatus' => 'Civil Status',
            'trainer_birthdate' => 'Birth Date',
            'trainer_education' => 'Education',
            'trainer_emailaddress' => 'Email Address',
            'trainer_bloodtype' => 'Blood Type',
            'trainer_address' => 'Address',
            'trainer_course' => 'Course',
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
     * Gets query for [[UpdatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
}
