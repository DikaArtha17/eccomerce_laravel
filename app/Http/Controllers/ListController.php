<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use App\Models\skripsi;

class ListController extends Controller
{
    public function index()
    {
        $admins = Admin::all(); //menampilkan semua data pada tabel Admin
        $users = User::all(); 
        $skripsis = skripsi::all();//menampilkan semua data pada tabel user

        return view('beranda', compact('admins', 'users', 'skripsis'));
    }
}
