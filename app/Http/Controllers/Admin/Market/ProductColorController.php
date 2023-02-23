<?php

namespace App\Http\Controllers\Admin\Market;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Market\Product;
use App\Models\Market\ProductColor;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class ProductColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Product $product)
    {
        return view('admin.market.product.color.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Product $product)
    {
        return view('admin.market.product.color.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Product $product): RedirectResponse
    {
        $validated = $request->validate([
            'color_name' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
            'color' => 'required|max:120',
            'price_increase' => 'required|numeric',
        ]);
        $inputs = $request->all();
            $inputs['product_id'] = $product->id;
            $color = ProductColor::create($inputs);
            return redirect()->route('admin.market.color.index', $product->id)->with('swal-success', 'رنگ شما با موفقیت ثبت شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, ProductColor $color): RedirectResponse
    {
        $color->delete();
        return back();
    }
}
