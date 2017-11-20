<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Ad;

class DefaultController extends Controller
{
    public function index()
    {
        // $ads = Ad::all();
        $ads = Ad::paginate(5);

        return view('index', [
            'adslist' => $ads,

        ]);
    }
}
