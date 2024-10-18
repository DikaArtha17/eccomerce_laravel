<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\FlashSale; 

class UserController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $flashsales = FlashSale::where('status', true)->get();
        return view('pages.user.index', compact('products','flashsales'));
        
    }
    public function detail_product($id)
    {
        $product = Product::findOrFail($id);
        return view('Pages.user.detail', compact('product'));
    }
    public function purchase($productId, $userId)
    {
        $product = Product::findOrFail($productId);
        $user = User::findOrFail($userId);

        if ($user->point >= $product->price) {
            $totalpoints = $user->point - $product->price;

            $user->update([
                'point'=> $totalpoints,
            ]);

            Alert::success('Berhasil!','Produk Berhasil dibeli!');
            return redirect()->back();
        } else {
            Alert::error('Gagal!','Point anda tidak cukup!');
            return redirect()->back();
        }
    }
    
}
