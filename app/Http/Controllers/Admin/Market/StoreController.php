<?php

namespace App\Http\Controllers\Admin\Market;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Market\Product;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\Market\StoreRequest;
use App\Http\Requests\Admin\Market\StoreUpdateRequest;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->simplePaginate(15);
        return view('admin.market.store.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addToStore(Product $product)
    {
        return view('admin.market.store.add-to-store', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request, Product $product): RedirectResponse
    {
        $product->marketable_number += $request->marketable_number;
        $product->save();
        Log::info("receiver => {$request->receiver}, deliverer => {$request->deliverer}, description => {$request->description}, add => {$request->marketable_number}");
        return redirect()->route('admin.market.store.index')->with('swal-success', 'مجودی جدید با موفقیت ثبت شد');
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
    public function edit(Product $product)
    {
        return view('admin.market.store.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateRequest $request, Product $product): RedirectResponse
    {
        $inputs = $request->all();
        $product->update($inputs);
        return redirect()->route('admin.market.store.index')->with('swal-success', 'موجودی  با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
