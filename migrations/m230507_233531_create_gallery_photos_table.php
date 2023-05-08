<?php

declare(strict_types=1);

use yii\db\Migration;

/**
 * Handles the creation of table `{{%gallery_photos}}`.
 */
final class m230507_233531_create_gallery_photos_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%gallery_photos}}', [
            'id' => $this->primaryKey(11)->unsigned(),
            'testimonial_id' => $this->integer(11)->unsigned()->notNull(),
            'file_path' => $this->string()->notNull(),
            'file_path_webp' => $this->string()->notNull(),
            'photo_order' => $this->integer()->defaultValue(0)->notNull(),
            'description' => $this->string()->notNull(),
            'created_at' => $this->dateTime()->null()
        ]);

        $this->addForeignKey('gallery_photos_testimonials_FK', '{{%gallery_photos}}', 'testimonial_id', '{{%testimonials}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('gallery_photos_testimonials_FK', '{{%gallery_photos}}');
        $this->dropTable('{{%gallery_photos}}');
    }
}
