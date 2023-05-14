<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CountNumbersController extends Controller
{
    public function index(Request $request){
        \request()->validate([
            'start_number' => 'required|numeric',
            'end_number' => 'required|numeric|min:' . $request->input('start_number'),
        ]);

        $start = $request->input('start_number');
        $end   = $request->input('end_number');

        $count = self::countArrayNumbers($start,$end);

        return response()->json([
            'count' => $count
        ]);
    }

    
    function countArrayNumbers($start,$end) {
        $numbers = range($start, $end);
        $filtered_numbers = array_filter($numbers, function($num) {
            return strpos(strval($num), '5') === false;
        });
        return count($filtered_numbers);
    }

}
