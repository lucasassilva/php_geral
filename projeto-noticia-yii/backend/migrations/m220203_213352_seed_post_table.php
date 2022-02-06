<?php

use yii\db\Migration;

/**
 * Class m220203_213352_seed_post_table
 */
class m220203_213352_seed_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->insertFakeBooks();
    }

    private function insertFakeBooks()
    {
        $faker = \Faker\Factory::create();
        $now = (new DateTime)->format('Y-m-d h:i:s');
        for ($i = 0; $i < 50; $i++) {
            $this->insert(
                'post',
                [
                    'title' => $faker->text(50),
                    'body' => $faker->text(200),
                    'created_at' => $now,
                    'updated_at' => $now,
                ]
            );
        }
    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220203_213352_seed_post_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220203_213352_seed_post_table cannot be reverted.\n";

        return false;
    }
    */
}
