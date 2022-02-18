<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "template_category".
 *
 * @property int $id
 * @property string|null $category
 * @property int|null $publishing
 * @property string|null $img
 */
class TemplateCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'template_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['publishing'], 'integer'],
            [['category', 'img'], 'string', 'max' => 255],
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
}
