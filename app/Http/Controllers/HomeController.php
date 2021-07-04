<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index()
    {

        $database = DB::select('select * from places');
        dd($database);

        return view('welcome');
    }

}