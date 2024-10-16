<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Distributor;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    public function index()
    {
        $distributors = Distributor::all();
        return view('pages.admin.distributor.index', compact('distributors'));

    }

    public function create()
    {
        return view('pages.admin.distributors.create');
    }
}
