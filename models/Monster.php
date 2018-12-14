<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "monster".
 *
 * @property int $id
 * @property string $name
 * @property int $age
 * @property string $gender
 * @property string $username
 * @property string $password
 * @property string $authKey
 */



class Monster extends \yii\db\ActiveRecord implements IdentityInterface
{
    public $hashPassword = false;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'monster';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['age'], 'integer'],
            [['name', 'gender', 'username', 'password', 'authKey'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'age' => 'Age',
            'gender' => 'Gender',
            'username' => 'Username',
            'password' => 'Password',
            'authKey' => 'Auth Key',
        ];
    }

    public static function findIdentity($id) {
        return Monster::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    public function getId() {
        return $this->getId();
    }

    public function getAuthKey() {
        // TODO: Implement getAuthKey() method.
    }


    public function validateAuthKey($authKey) {
        // TODO: Implement validateAuthKey() method.
    }

    public static function findByUsername($username)
    {
        return User::find()->where(['name' => $username])->one();
    }


    public function validatePassword($password)
    {
//        return ($this->password == $password) ? true : false;
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            if ($this->hashPassword) {
            $this->password = Yii::$app->security->generatePasswordHash($this->password, 5);
            return true;
            }
        } else {
            return false;
        }
    }

}
