<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cron_results".
 *
 * @property string $body
 * @property string $date_request
 * @property string $date_response
 * @property integer $delay
 * @property boolean $result
 * @property string $headers
 * @property integer $id
 */
class CronResults extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cron_results';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['body', 'headers'], 'string'],
            [['date_request', 'date_response'], 'safe'],
            [['delay'], 'integer'],
            [['result'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'body' => 'Body',
            'date_request' => 'Date Request',
            'date_response' => 'Date Response',
            'delay' => 'Delay',
            'result' => 'Result',
            'headers' => 'Headers',
            'id' => 'ID',
        ];
    }
}
