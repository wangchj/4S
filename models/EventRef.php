<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "EventRefs".
 *
 * @property integer $eventId
 * @property integer $refId
 *
 * @property Ref $ref
 * @property Event $event
 */
class EventRef extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'EventRefs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['eventId', 'refId'], 'required'],
            [['eventId', 'refId'], 'integer'],
            [['eventId', 'refId'], 'unique', 'targetAttribute' => ['eventId', 'refId'], 'message' => 'The combination of Event ID and Ref ID has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'eventId' => 'Event ID',
            'refId' => 'Ref ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRef()
    {
        return $this->hasOne(Ref::className(), ['refId' => 'refId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvent()
    {
        return $this->hasOne(Event::className(), ['eventId' => 'eventId']);
    }
}