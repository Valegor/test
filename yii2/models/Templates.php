<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "templates".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $author_id
 * @property int|null $category_id
 * @property string|null $subtitle
 * @property string|null $notes
 * @property string|null $object
 * @property string|null $img
 * @property int|null $aviable
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Templates extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'templates';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['author_id', 'category_id', 'aviable'], 'integer'],
            [['subtitle', 'notes', 'object'], 'string'],
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
            'author_id' => 'Author ID',
            'category_id' => 'Category ID',
            'subtitle' => 'Subtitle',
            'notes' => 'Notes',
            'object' => 'Object',
            'img' => 'Img',
            'aviable' => 'Aviable',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
