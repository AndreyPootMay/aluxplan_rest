<?php

declare(strict_types=1);

namespace app\commands;

use app\models\Contacts;
use DateTimeImmutable;
use yii\console\Controller;
use Faker\Factory;
use Yii;
use yii\helpers\Console;

final class ContactsController extends Controller
{
    public function actionSeed()
    {
        $faker = Factory::create();

        Yii::$app->db->createCommand('SET foreign_key_checks = 0')->execute();
        Yii::$app->db->createCommand()
            ->truncateTable('contacts')
            ->execute();

        for ($i = 1; $i <= 20; $i++) {
            $model = new Contacts();
            $model->name = $faker->name();
            $model->email = $faker->email();
            $model->country = $faker->country();
            $model->phone = $faker->phoneNumber();
            $model->message = $faker->text(40);
            $model->active = 1;
            $model->created_at = (new DateTimeImmutable())->format('Y-m-d H:i:s');
            $model->save(false);
        }

        Yii::$app->db->createCommand('SET foreign_key_checks = 1')->execute();

        $this->stdout("Contacts table seeded successfully!\n", Console::BG_GREEN);
    }
}
