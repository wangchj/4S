<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
/**
 * This is the model class for table "Users".
 *
 * @property integer $userId
 * @property string $email
 * @property string $hash
 * @property string $authKey
 */
class User extends ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'hash', 'authKey'], 'required'],
            [['email', 'hash', 'authKey'], 'string'],
            [['email'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userId' => 'User ID',
            'email' => 'Email',
            'hash' => 'Password',
            'authKey' => 'Auth Key',
        ];
    }

     /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return self::findOne(['userId'=>$id]);
    }
    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }
    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->userId;
    }
    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }
    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }
}
