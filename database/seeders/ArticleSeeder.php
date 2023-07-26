<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use DB;

class ArticleSeeder extends Seeder
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
    		DB::table('articles')->insert([
    			'title' => $faker->text(40),
    			'slug' => Str::slug($faker->text(40)),
    			'content' => $faker->paragraph(10, true),
    			'category' => 1,
    			'status' => 1,
    			'author' => 30,
                'created_at' => Carbon::now(),
    		]);

    	}
    }
}
