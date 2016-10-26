<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
/**
 * This is the model class for table "tvprogramms".
 *
 * @property integer $id
 * @property string $channel
 * @property string $day
 * @property string $time
 * @property string $show
 * @property integer $created_at
 * @property integer $updated_at
 */
class Tvprogramms extends \yii\db\ActiveRecord
{

    public function behaviors() {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tvprogramms';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['channel'], 'required'],
            [['show'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['channel', 'day', 'time'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'channel' => 'Channel',
            'day' => 'Day',
            'time' => 'Time',
            'show' => 'Show',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function _getChannel() {
        switch($this->channel) {
            case 'cultura': return '<img style="border: 1px solid #23527c;" src="/img/ch14.gif"><br><h4>Россия Культура</h4>'; break;
            case 'ortwordsng': return '<img style="border: 1px solid #23527c;" src="/img/ch40.gif"><h4>Первый СНГ</h4>'; break;
            case 'russia': return '<img style="border: 1px solid #23527c;" src="/img/ch15.gif"><h4>Россия 1</h4>'; break;
            case 'ntv': return '<img style="border: 1px solid #23527c;" src="/img/ch25.gif"><h4>НТВ</h4>'; break;
            case 'tnt1': return '<img style="border: 1px solid #23527c;" src="/img/ch19.gif"><h4>ТНТ</h4>'; break;
            case 'home': return '<img style="border: 1px solid #23527c;" src="/img/ch20.gif"><h4>Домашний</h4>'; break;
            case 'sts': return '<img style="border: 1px solid #23527c;" src="/img/ch21.gif"><h4>СТС-Москва</h4>'; break;
            case 'tv3': return '<img style="border: 1px solid #23527c;" src="/img/ch13.gif"><h4>ТВ3</h4>'; break;
            case 'darial': return '<img style="border: 1px solid #23527c;" src="/img/ch23.gif"><h4>Перец ТВ</h4>'; break;
            case 'rentv1': return '<img style="border: 1px solid #23527c;" src="/img/ch17.gif"><h4>RenTV</h4>'; break;
            case 'tvcen1': return '<img style="border: 1px solid #23527c;" src="/img/ch26.gif"><h4>ТВ Центр</h4>'; break;
            case 'rtr_sport': return '<img style="border: 1px solid #23527c;" src="/img/ch16.gif"><h4>Россия 2 (Спорт)</h4>'; break;
            case 'ort': return '<img style="border: 1px solid #23527c;" src="/img/ch1.gif"><h4>ОРТ</h4>'; break;
            case 'muztv': return '<img style="border: 1px solid #23527c;" src="/img/ch22.gif"><h4>МУЗ ТВ</h4>'; break;
            case 'mtvros': return '<img style="border: 1px solid #23527c;" src="/img/ch6.gif"><h4>MTV</h4>'; break;
        }
    }
}
