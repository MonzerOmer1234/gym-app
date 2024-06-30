<?php

namespace Database\Seeders;

use App\Models\Member;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Factory::create();



        foreach(range(1 , 100) as $item){

            Member::create([
    
                'name' => $faker->name,
                'mobile' => "01" . rand(3 , 9) . rand(00000000,99999999),
                'gender' => rand(0,1),
                'blood_group' => $faker->bloodGroup(),
                'address' => $faker->address,
                'photo' => $faker->imageUrl,
                'created_by' => rand(1 , 25),

            ]);
        }


    }
}
