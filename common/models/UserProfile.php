<?php

namespace common\models;

use trntv\filekit\behaviors\UploadBehavior;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "user_profile".
 *
 * @property integer $user_id
 * @property integer $locale
 * @property string $firstname
 * @property string $middlename
 * @property string $lastname
 * @property string $picture
 * @property string $avatar
 * @property string $avatar_path
 * @property string $avatar_base_url
 * @property integer $gender
 * @property string $address
 * @property string $contact
 * @property string $blood_type
 * @property integer $civil_status
 * @property string $birthdate
 * @property integer $education
 * @property string $course
 *
 * @property User $user
 */
class UserProfile extends ActiveRecord
{
    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;

    const CS_SINGLE = 1;
    const CS_MARRIED = 2;
    const CS_SEPARATED = 3;
    const CS_DIVORCED = 4;
    const CS_WIDOWED = 5;

    const EDUCATION_ELEM = 1;
    const EDUCATION_ELEMGRAD = 2;
    const EDUCATION_HS = 3;
    const EDUCATION_HSGRAD = 4;
    const EDUCATION_COL = 5;
    const EDUCATION_COLGRAD = 6;
    const EDUCATION_POSTGRAD = 7;
   

    /**
     * @var
     */
    public $picture;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_profile}}';
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'picture' => [
                'class' => UploadBehavior::class,
                'attribute' => 'picture',
                'pathAttribute' => 'avatar_path',
                'baseUrlAttribute' => 'avatar_base_url'
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'gender'], 'integer'],
            [['gender'], 'in', 'range' => [NULL, self::GENDER_FEMALE, self::GENDER_MALE]],
            [['civil_status'], 'in', 'range' => [NULL, self::CS_SINGLE, self::CS_MARRIED, self::CS_SEPARATED, self::CS_DIVORCED, self::CS_WIDOWED]],
            [['education'], 'in', 'range' => [NULL, self::EDUCATION_ELEM, self::EDUCATION_ELEMGRAD, self::EDUCATION_HS, self::EDUCATION_HSGRAD, self::EDUCATION_COL, self::EDUCATION_COLGRAD, self::EDUCATION_POSTGRAD]],
            [['firstname', 'middlename', 'lastname', 'avatar_path', 'avatar_base_url','address','contact','blood_type','birthdate','course'], 'string', 'max' => 255],
            ['locale', 'default', 'value' => Yii::$app->language],
            ['locale', 'in', 'range' => array_keys(Yii::$app->params['availableLocales'])],
            ['picture', 'safe']
       ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('common', 'User ID'),
            'firstname' => Yii::t('common', 'First Name'),
            'middlename' => Yii::t('common', 'Middle Name'),
            'lastname' => Yii::t('common', 'Last Name'),
            'locale' => Yii::t('common', 'Locale'),
            'picture' => Yii::t('common', 'Picture'),
            'gender' => Yii::t('common', 'Gender'),
            'address' => Yii::t('common', 'Complete Address'),
            'contact' => Yii::t('common', 'Contact Number'),
            'birthdate' => Yii::t('common', 'Birth Date'),
            'blood_type' => Yii::t('common', 'Blood Type'),
            'civil_status' => Yii::t('common', 'Civil Status'),
            'education' => Yii::t('common', 'Highest Education Attainment'),
            'course' => Yii::t('common', 'Degree/s (If Any)'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * @return null|string
     */
    public function getFullName()
    {
        if ($this->firstname || $this->lastname) {
            return implode(' ', [$this->firstname, $this->lastname]);
        }
        return null;
    }

    /**
     * @param null $default
     * @return bool|null|string
     */
    public function getAvatar($default = null)
    {
        return $this->avatar_path
            ? Yii::getAlias($this->avatar_base_url . '/' . $this->avatar_path)
            : $default;
    }
}
