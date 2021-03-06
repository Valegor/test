<?php

namespace app\modules\admin\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\web\UploadedFile;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string|null $title
 * @property int $author_id
 * @property int|null $category_id
 * @property string|null $subtitle
 * @property string|null $imgage
 * @property string|null $body
 * @property int|null $aviable
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $author
 * @property PostCategory $category
 */
class Post extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
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

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['author_id'], 'required'],
            [['author_id', 'category_id', 'aviable'], 'integer'],
            [['body'], 'string'],
            [['title', 'subtitle', 'imgage'], 'string', 'max' => 255],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['author_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => PostCategory::class, 'targetAttribute' => ['category_id' => 'id']],
            [['imgage'], 'default', 'value' => 'posts/blank.jpg'],
            //[['file'], 'image'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'author_id' => 'Author',
            'category_id' => 'Category',
            'subtitle' => 'Subtitle',
            'imgage' => 'Image',
            'file' => 'Foto',
            'body' => 'Body',
            'aviable' => 'Aviable',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Author]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::class, ['id' => 'author_id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(PostCategory::class, ['id' => 'category_id']);
    }

    public function beforeSave($insert)
    {
        if($file = UploadedFile::getInstance($this, 'file')){
            $dir = 'posts/' . date("Y-m-d") . '/';
            if(!is_dir($dir)){
                mkdir($dir);
            }
            $file_name = uniqid() . '_' . $file->baseName . '.' . $file->extension;
            $this->imgage = $dir . $file_name;
            $file->saveAs($this->imgage);
        }
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }
}
