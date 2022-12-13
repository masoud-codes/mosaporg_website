<?php

namespace App\Http\Controllers\Approaches;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApproachController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('Approach.index');
    }

    public function create()
    {
            return view('Approach.create');
    }
}
