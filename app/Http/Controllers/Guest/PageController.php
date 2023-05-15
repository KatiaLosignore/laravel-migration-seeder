<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Train;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {

        $trains = Train::whereDate('data_partenza', '>=', date('Y-m-d'))
                ->whereTime('orario_partenza', '>=', date("H:i:s"))
                ->where('cancellato', 0)->get();

        return view('home', compact('trains'));
    }
}
