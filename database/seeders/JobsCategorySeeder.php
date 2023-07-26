<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use DB;

class JobsCategorySeeder extends Seeder
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
            $title = $faker->text(10);
    	      // insert data ke table pegawai menggunakan Faker
    		DB::table('jobs_categories')->insert([
    			'title' => $title,
    			'slug' => Str::slug($title),
    			'status' => 1,
    			'created_by' => 15,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
    		]);

    	}
    }
}
