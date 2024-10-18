<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FlashSale;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

class FlashsaleController extends Controller
{

    public function index()
    {
        $flashSales = FlashSale::all();
        confirmDelete('Hapus Data!', 'Apakah anda yakin ingin menghapus data ini?');

        return view('pages.admin.flashsale.index', compact('flashSales'));
    }

    public function create()
    {
        return view('pages.admin.flashsale.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'original_price' => 'required|numeric',
            'discount_price' => 'required|numeric',
            'start_time' => 'required|date',
            'end_time' => 'required|date',
            'stock' => 'required|integer',
            'status'=> 'required|boolean',
            'image' => 'required|mimes:png,jpeg,jpg',
        ]);

        FlashSale::create($request->all());

        return redirect()->route('admin.flashSale')->with('success', 'flashSale berhasil ditambahkan');
    }


    
    public function detail($id)
    {
        $flashSale = FlashSale::findOrFail($id);

        return view('pages.admin.flashsale.detail', compact('flashSales'));
    }

    
    public function edit($id)
    {
        $flashsale = FlashSale::findOrFail($id);
        return view('pages.admin.flashsale.edit', compact('flashsale'));
    }
    
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'product_name' => 'required',
            'original_price' => 'required|numeric',
            'discount_price' => 'required|numeric',
            'start_time' => 'required|date',
            'end_time' => 'required|date',
            'stock' => 'required|integer',
            'status'=> 'required|boolean',
            'image' => 'nullable|mimes:png,jpeg,jpg',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal!', 'Pastikan semua terisi dengan benar!');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $flashsale = FlashSale::findOrFail($id);

        // Handle image upload
        if ($request->hasFile('image')) {
            $oldPath = public_path('images/' . $flashsale->image);
            if (File::exists($oldPath)) {
                File::delete($oldPath);
            }
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images/', $imageName);
        } else {
            $imageName = $flashsale->image; // Keep the old image if no new one is uploaded
        }

        // Update the record
        $flashsale->update([
            'product_name' => $request->product_name,
            'original_price' => $request->original_price,
            'discount_price' => $request->discount_price,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'stock' => $request->stock,
            'status'=> $request->status,
            'image' => $imageName,
        ]);

        if ($flashsale) {
            Alert::success('Berhasil!', 'Flash Sale berhasil diperbarui!');
            return redirect()->route('admin.flashsale.index');
        } else {
            Alert::error('Gagal!', 'Flash Sale gagal diperbarui!');
            return redirect()->back();
        }
    }


    // Menghapus data Flash Sale 
    public function delete($id)
    {
        $flashSale = FlashSale::findOrFail($id);

        $oldPath = public_path('images/' . $flashSale->image);
        if (File::exists($oldPath)) {
            File::delete($oldPath);
        }

        $flashSale->delete();

        if ($flashSale) {
            Alert::success('Berhasil!', 'Flash Sale berhasil dihapus!');
            return redirect()->back();
        } else {
            Alert::error('Gagal!', 'Flash Sale gagal dihapus!');
            return redirect()->back();
        }
    }
}