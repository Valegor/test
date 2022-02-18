<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "game".
 *
 * @property int $id
 * @property string $name
 * @property int|null $author_id
 * @property int $category_id
 * @property string|null $category
 * @property string|null $subtitle
 * @property string|null $notes
 * @property string|null $object
 * @property string|null $img
 * @property int|null $aviable
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property GameCategory $gameCategory
 * @property GameCard $id0
 */
class Game extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'game';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'category_id', 'created_at'], 'required'],
            [['author_id', 'category_id', 'aviable'], 'integer'],
            [['subtitle', 'notes', 'object'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'category', 'img'], 'string', 'max' => 255],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => GameCard::className(), 'targetAttribute' => ['id' => 'game_id']],
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
            'author_id' => 'Author ID',
            'category_id' => 'Category ID',
            'category' => 'Category',
            'subtitle' => 'Subtitle',
            'notes' => 'Notes',
            'object' => 'Object',
            'img' => 'Img',
            'aviable' => 'Aviable',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    // public function afterFind() {
    //     $this->object = json_decode($this->object);
    // }

    /**
     * Gets query for [[GameCategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGameCategory()
    {
        return $this->hasOne(GameCategory::class, ['id' => 'category_id']);
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(GameCard::class, ['game_id' => 'id']);
    }
}
