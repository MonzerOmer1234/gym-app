<?php

namespace Database\Seeders;

use App\Models\Setting;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

      $faker = Factory::create();
      Setting::create([
        'name' => 'Super Fit Gym',
        'logo' => $faker->imageUrl,
        'favicon' => $faker->imageUrl,
        'email' => 'gym@gym.com',
        'mobile' => "01700000000",
        "created_by" => 1,
      ]);

    }
}
