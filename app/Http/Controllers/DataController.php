<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Translation;
use DB;

class DataController extends Controller
{
    public function getData($id)
    {
/*    	$translation = new Translation;

		$translation->word = 'xxx';
		$translation->translation = 'yyy';
		$translation->learned = '0';
		$translation->save();
*/

		$translation1 = Translation::all();

        return response()->json($translation1);
    }
}
