<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{

    public function index()
    {
        $wishlist = Wishlist::where('user_id', Auth::id())->with('products')->get();
        return view('frontend.wishlists.index', compact('wishlist'));
    }

    public function wishlistStore(Request $request)
    {
        $product_id = $request->input('product_id');

        if (Wishlist::where(['user_id' => Auth::id(), 'product_id' => $product_id])->exists()) {
            return response()->json(['status' => 'Product is already added to wishlist']);
        }

        $wishlist = new Wishlist();
        $wishlist->user_id = Auth::id();
        $wishlist->product_id = $product_id;
        $wishlist->save();
        return response()->json(['status' => 'Product is added to wishlist']);
    }

    public function wishlistDelete(Request $request)
    {
        $product_id = $request->input('product_id');
        $wishlist = Wishlist::where(['user_id' => Auth::id(), 'product_id' => $product_id])->first();

        if ($wishlist) {
            $wishlist->delete();
            return response()->json(['status' => 'Product is deleted']);
        }

        return response()->json(['status' => 'Product is added to wishlist'],404);
    }
}
