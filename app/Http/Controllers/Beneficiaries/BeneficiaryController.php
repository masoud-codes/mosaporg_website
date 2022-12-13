<?php

namespace App\Http\Controllers\Beneficiaries;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BeneficiaryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('Beneficiaries.index');
    }

    public function create()
    {
        return view('Beneficiaries.create');
    }
}
