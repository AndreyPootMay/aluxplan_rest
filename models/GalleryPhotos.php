<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gallery_photos".
 *
 * @property int $id
 * @property int $testimonial_id
 * @property string $file_path
 * @property string $file_path_webp
 * @property int $photo_order
 * @property string $description
 * @property string|null $created_at
 *
 * @property Testimonials $testimonial
 */
class GalleryPhotos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gallery_photos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['testimonial_id', 'file_path', 'file_path_webp', 'description'], 'required'],
            [['testimonial_id', 'photo_order'], 'integer'],
            [['created_at'], 'safe'],
            [['file_path', 'file_path_webp', 'description'], 'string', 'max' => 255],
            [
                ['testimonial_id'], 'exist',
                'skipOnError' => true,
                'targetClass' => Testimonials::class,
                'targetAttribute' => ['testimonial_id' => 'id']
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'testimonial_id' => Yii::t('app', 'Testimonial ID'),
            'file_path' => Yii::t('app', 'File Path'),
            'file_path_webp' => Yii::t('app', 'File Path Webp'),
            'photo_order' => Yii::t('app', 'Photo Order'),
            'description' => Yii::t('app', 'Description'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * Gets query for [[Testimonial]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTestimonial()
    {
        return $this->hasOne(Testimonials::class, ['id' => 'testimonial_id']);
    }
}
