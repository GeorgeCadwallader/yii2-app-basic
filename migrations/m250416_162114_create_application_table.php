<?php
declare(strict_types=1);

use yii\db\Migration;

/**
 * Handles the creation of table `{{%application}}`.
 */
class m250416_162114_create_application_table extends Migration
{

    /**
     * @inheritdoc
     */
    public function safeUp(): void
    {
        $this->createTable('{{%application}}', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string(255)->notNull(),
            'last_name' => $this->string(255)->notNull(),
            'date_of_birth' => $this->date()->notNull(),
            'description' => $this->text(),
            'income' => $this->decimal(),
            'number_of_dependants' => $this->integer(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown(): void
    {
        $this->dropTable('{{%application}}');
    }

}
