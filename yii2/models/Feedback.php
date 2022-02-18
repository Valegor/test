<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "feedback".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $img
 * @property string|null $body
 * @property string|null $game
 * @property int|null $game_id
 * @property int|null $aviable
 * @property int|null $score
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Feedback extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feedback';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['body', 'game'], 'string'],
            [['game_id', 'aviable', 'score'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'img'], 'string', 'max' => 255],
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
            'img' => 'Img',
            'body' => 'Body',
            'game' => 'Game',
            'game_id' => 'Game ID',
            'aviable' => 'Aviable',
            'score' => 'Score',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
