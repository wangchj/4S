<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Refs".
 *
 * @property integer $refId
 * @property string $title
 * @property string $url
 *
 * @property EventRef[] $eventRefs
 * @property Event[] $events
 */
class Ref extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Refs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'url'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'refId' => 'Ref ID',
            'title' => 'Title',
            'url' => 'Url',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventRefs()
    {
        return $this->hasMany(EventRef::className(), ['refId' => 'refId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasMany(Event::className(), ['eventId' => 'eventId'])->viaTable('EventRefs', ['refId' => 'refId']);
    }
}