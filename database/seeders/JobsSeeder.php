<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;

class JobsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

    	for($i = 1; $i <= 50; $i++){

    	      // insert data ke table pegawai menggunakan Faker
    		DB::table('jobs')->insert([
    			'category_id' => 44,
    			'title' => $faker->text(40),
    			'image' => $faker->imageUrl($width = 640, $height = 480),
    			'type' => "Full-Time",
    			'position' => $faker->jobTitle,
    			'experience' => 2,
    			'specialisation' => $faker->text(10),
    			'work_location' => $faker->city,
    			'budget_min' => 1000000,
    			'budget_max' => 8000000,
    			'description' => $faker->paragraph(10, true),
    			'company_name' => $faker->company,
    			'status' => 1,
    			'created_by' => 15,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
    		]);

    	}
    }
}
