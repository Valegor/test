<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "game_category".
 *
 * @property int $id
 * @property string $category
 * @property int|null $publishing
 *
 * @property Game $id0
 */
class GameCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'game_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category'], 'required'],
            [['publishing'], 'integer'],
            [['category'], 'string', 'max' => 255],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Game::className(), 'targetAttribute' => ['id' => 'category_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category' => 'Category',
            'publishing' => 'Publishing',
            'img' => 'Img',
        ];
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(Game::class, ['category_id' => 'id']);
    }
}
