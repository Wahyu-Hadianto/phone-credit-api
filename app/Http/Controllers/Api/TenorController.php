<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tenor;
use Illuminate\Http\Request;

class TenorController extends Controller
{
    public function getTenor(){
        $tenor  = Tenor::all();
        return response()->json([
            'tenor' => $tenor
        ]);
    }
}
