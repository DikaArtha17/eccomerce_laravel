<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\User;
use App\Models\FlashSale;

class AdminController extends Controller
{
    public function dashboard()
    {
        $products = Product::count();
        $users = User::count();
        $flashsale = Flashsale::count();

        return view('pages.admin.index', compact('products', 'users'));
    }
}
