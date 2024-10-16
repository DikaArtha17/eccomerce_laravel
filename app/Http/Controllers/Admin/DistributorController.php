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
    public function destroy($id)
    {
        $distributor = Distributor::findOrFail($id);
        $distributor->delete();

        return redirect()->route('distributors.index')
            ->with('success', 'Distributor berhasil dihapus');
    }
    public function edit($id)
    {
        $distributor = Distributor::findOrFail($id);
        return view('distributors.edit', compact('distributor'));
    }

    public function update(Request $request, $id)
    {
        $distributor = Distributor::findOrFail($id);
        $distributor->update($request->all());

        return redirect()->route('distributors.index')
            ->with('success', 'Distributor berhasil diperbarui');
    }


}
