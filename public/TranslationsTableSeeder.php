<?php

use Illuminate\Database\Seeder;

class TranslationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
/*    	$translation = new Translation();
    	$translation->word = 'testWord1';
    	$translation->translation = 'testTranslation1';
    	$translation->learned = 0;
    	echo "alert";
        DB::table('translations')->insert($translation);

        $translation->word = 'testWord2';
    	$translation->translation = 'testTranslation2';
    	$translation->learned = 0;
        DB::table('translations')->insert($translation);

        $translation->word = 'testWord3';
    	$translation->translation = 'testTranslation3';
    	$translation->learned = 0;
        DB::table('translations')->insert($translation);

		// Load the file
        $path = base_path() . '/database/data.json';
        $file = File::get($path);
        $translation = json_decode($file, true);
*/
		// Load the file
        $path = base_path() . '/database/data.json';
        $file = File::get($path);
        $translation = json_decode($file, true);

        // Insert into the database
        DB::table('translations')->insert($translation);
    }
}
