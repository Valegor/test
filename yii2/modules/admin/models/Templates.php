<?php

namespace app\modules\admin\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\web\UploadedFile;
Use app\modules\admin\models\TemplateCategory;
Use app\modules\admin\models\User;

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

    public $file;

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
            [['subtitle', 'notes', 'object', 'category'], 'string'],
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

    public function getGameCategory()
    {
        return $this->hasOne(TemplateCategory::class, ['id' => 'category_id']);
    }

    public function getAuthor()
    {
        return $this->hasOne(User::class, ['id' => 'author_id']);
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // если вместо метки времени UNIX используется datetime:
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    public function categoryName($category_id)
    {
        $category = TemplateCategory::findOne($category_id);
        return $category->category;
    }

    public function beforeSave($insert)
    {
        if($file = UploadedFile::getInstance($this, 'file')){
            $dir = 'posts/' . date("Y-m-d") . '/';
            if(!is_dir($dir)){
                mkdir($dir);
            }
            $file_name = uniqid() . '_' . $file->baseName . '.' . $file->extension;
            $this->img = $dir . $file_name;
            $file->saveAs($this->img);
        }

        $this->category = $this->categoryName($this->category_id);

        return parent::beforeSave($insert);

    }

}
