<?php

declare(strict_types=1);

use yii\db\Migration;

/**
 * Handles the creation of table `{{%contacts}}`.
 */
final class m230507_234930_create_contacts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('contacts', [
            'id' => $this->primaryKey(),
            'name' => $this->string(150)->notNull(),
            'country' => $this->string(100)->notNull(),
            'email' => $this->string(150)->notNull(),
            'phone' => $this->string(20)->notNull(),
            'message' => $this->text()->notNull(),
            'active' => $this->tinyInteger(1)->notNull()->defaultValue(1),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%contacts}}');
    }
}
