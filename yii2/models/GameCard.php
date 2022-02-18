<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "game_card".
 *
 * @property int $id
 * @property int $game_id
 * @property int $card_id
 * @property string|null $card_img
 * @property string|null $card_name
 * @property string|null $card_category
 *
 * @property Game $game
 */
class GameCard extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'game_card';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['game_id', 'card_id'], 'required'],
            [['game_id', 'card_id'], 'integer'],
            [['card_img', 'card_name', 'card_category'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'game_id' => 'Game ID',
            'card_id' => 'Card ID',
            'card_img' => 'Card Img',
            'card_name' => 'Card Name',
            'card_category' => 'Card Category',
        ];
    }

    /**
     * Gets query for [[Game]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGame()
    {
        return $this->hasOne(Game::className(), ['id' => 'game_id']);
    }
}
