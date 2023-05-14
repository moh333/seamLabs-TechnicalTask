<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AlphabeticStringController extends Controller
{
    public function index(Request $request){

        \request()->validate([
            'input_string' => 'required',
        ]);

        $input_string = $request->input('input_string');

        $index = 0;
        $length = strlen($input_string);

        for ($i = 0; $i < $length; $i++) {
            $char = strtoupper($input_string[$i]);
            $value = ord($char) - 64;
            $power = $length - $i - 1;
            $index += $value * pow(26, $power);
        }

        return response()->json([
            'index' => $index
        ]);
    }

}
