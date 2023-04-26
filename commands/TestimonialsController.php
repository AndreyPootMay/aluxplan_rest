<?php

declare(strict_types=1);

namespace app\commands;

use app\models\Testimonials;
use yii\console\Controller;
use Faker\Factory;
use Yii;
use yii\helpers\Console;

final class TestimonialsController extends Controller
{
    public function actionSeed()
    {
        $faker = Factory::create();

        Yii::$app->db->createCommand()
            ->truncateTable('testimonials')
            ->execute();

        for ($i = 0; $i < 20; $i++) {
            $testimonials = new Testimonials();
            $testimonials->first_name = $faker->firstName;
            $testimonials->last_name = $faker->lastName;
            $testimonials->country = $faker->country;
            $testimonials->testimonial_details = $faker->realText(140);
            $testimonials->active = 1;
            $testimonials->created_at = date('Y-m-d H:i:s');
            $testimonials->updated_at = date('Y-m-d H:i:s');
            $testimonials->save(false);
        }

        $this->stdout("Testimonials table seeded successfully!\n", Console::BG_GREEN);
    }
}
