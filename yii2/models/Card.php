<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "card".
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property int $category_id
 * @property string $category
 * @property string $img1
 * @property string|null $img2
 * @property string|null $backimg
 * @property string|null $notes
 *
 * @property Category $category0
 */
class Card extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'card';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'name', 'category_id', 'category', 'img1'], 'required'],
            [['category_id'], 'integer'],
            [['notes'], 'string'],
            [['code', 'name', 'category', 'img1', 'img2', 'backimg'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'name' => 'Name',
            'category_id' => 'Category ID',
            'category' => 'Category',
            'img1' => 'Img1',
            'img2' => 'Img2',
            'backimg' => 'Backimg',
            'notes' => 'Notes',
        ];
    }

    /**
     * Gets query for [[Category0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory0()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }
}
