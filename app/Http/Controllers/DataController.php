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
    	if($id == 0)
    	{
			$translation1 = Translation::all();
		}
		else
		{
			$translation1 = Translation::where('translation_id', $id)->get();
		}

        return response()->json($translation1);
    }
}
