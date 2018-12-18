<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
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
class Monster extends ActiveRecord implements IdentityInterface
{
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
            [['password'], 'string', 'min' => 4],
            [['username'], 'unique'],
            [['gender'], 'in', 'range' => ['m', 'f']],
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
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    public function getId() {
        return $this->id;
    }

    public function getAuthKey() {
        // TODO: Implement getAuthKey() method.
    }

    public function validateAuthKey($authKey) {
        // TODO: Implement validateAuthKey() method.
    }

    public static function findByUsername($name){
        return self::findOne(['name'=>$name]);
    }

    public function validatePassword($password){
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }
}
