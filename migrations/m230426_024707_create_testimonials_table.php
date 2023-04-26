<?php

declare(strict_types=1);

use yii\db\Migration;

/**
 * Handles the creation of table `{{%testimonials}}`.
 */
final class m230426_024707_create_testimonials_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%testimonials}}', [
            'id' => $this->primaryKey(11)->unsigned()->notNull(),
            'first_name' => $this->string(150)->notNull(),
            'last_name' => $this->string(150)->notNull(),
            'country' => $this->string(120)->notNull(),
            'testimonial_details' => $this->string(140)->notNull(),
            'active' => $this->tinyInteger(1)->notNull()->defaultValue(1),
            'created_at' => $this->dateTime()->null(),
            'updated_at' => $this->dateTime()->null(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%testimonials}}');
    }
}
