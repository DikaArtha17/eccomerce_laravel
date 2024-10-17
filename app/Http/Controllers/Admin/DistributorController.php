<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Distributor;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class DistributorController extends Controller
{
    public function index()
    {
        $distributors = Distributor::all();
        return view('pages.admin.distributor.index', compact('distributors'));

    }
    public function create()
    {
        return view('pages.admin.distributor.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_distributor' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'kontak' => 'required',
            'email' => 'required|email',
        ]);

        Distributor::create($request->all());

        return redirect()->route('admin.distributor')->with('success', 'Distributor berhasil ditambahkan');
    }
    public function edit($id){
        $distributor = Distributor::findOrFail($id);
        return view('pages.admin.distributor.edit', compact('distributor'));
        
        
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_distributor' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'kontak' => 'required',
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Pastikan semua terisi dengan benar!');
            return redirect()->back();
        }

        $distributor = Distributor::findOrFail($id);

        $distributor->update([
            'nama_distributor' => $request->nama_distributor,
            'kota' => $request->kota,
            'provinsi' => $request->provinsi,
            'kontak' => $request->kontak,
            'email' => $request->email
        ]);

        if ($distributor) {
            Alert::success('Berhasil', 'Distributor berhasil diperbarui');
            return redirect()->route('admin.distributor');
        } else {
            Alert::error('Gagal!', 'Distributor gagal diperbarui');
            return redirect()->back();
        }
    } 
    public function delete($id){
        $distributor = Distributor::findorFail($id);
        $distributor->delete();

        if ($distributor){
            Alert::success('Berhasil', 'Produk berhasil dihapus');
            return redirect()->back();
        } else {
            Alert::error('Gagal!','Produk gagal dihapus');
            return redirect()->back();
        }
    }
}