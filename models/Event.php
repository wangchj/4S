<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Events".
 *
 * @property integer $eventId
 * @property integer $year
 * @property integer $month
 * @property integer $date
 * @property string $season
 * @property string $text
 *
 * @property EventRef[] $eventRefs
 * @property Ref[] $refs
 */
class Event extends \yii\db\ActiveRecord
{
    public $refInput;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Events';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['year', 'month', 'date'], 'integer'],
            [['season', 'text', 'refInput'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'eventId' => 'Event ID',
            'year' => 'Year',
            'month' => 'Month',
            'date' => 'Date',
            'season' => 'Season',
            'text' => 'Text',
            'refInput' => 'References'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventRefs()
    {
        return $this->hasMany(EventRef::className(), ['eventId' => 'eventId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefs()
    {
        return $this->hasMany(Ref::className(), ['refId' => 'refId'])->viaTable('EventRefs', ['eventId' => 'eventId']);
    }

    public function getDateStr()
    {
        $res = $this->year;
        if($this->season) {
            $res .= " $this->season";
        }
        else if($this->month) {
            $res .= " {$this->getMonthName()}";
            if($this->date)
                $res .= " $this->date";
        }

        return $res;
    }

    public function getMonthName()
    {
        if(!$this->month)
            return '';

        return (new \DateTime())->setDate($this->year, $this->month, 1)->format('F');
    }

    public function getMonthAbbr()
    {
        if(!$this->month)
            return '';

        return (new \DateTime())->setDate($this->year, $this->month, 1)->format('M');
    }
}