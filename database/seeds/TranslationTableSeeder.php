<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class TranslationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = base_path() . '/database/data.json';
        $file = File::get($path);
        $translation = json_decode($file, true);

        // Insert into the database
        DB::table('translations')->insert($translation);
    }
}
