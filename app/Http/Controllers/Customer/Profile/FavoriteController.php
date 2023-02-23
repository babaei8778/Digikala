<?php

namespace App\Http\Controllers\Customer\Profile;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Market\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class FavoriteController extends Controller
{
    public function index()
    {
        return view('customer.profile.my-favorites');
    }

    public function delete(Product $product): RedirectResponse
    {
        $user = auth()->user();
        $user->products()->detach($product->id);
        return redirect()->route('customer.profile.my-favorites')->with('success', 'محصول با موفقیت از علاقه مندی ها حذف شد');
    }
}
