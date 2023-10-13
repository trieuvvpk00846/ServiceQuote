<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Image;
use App\Models\Product;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('product.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request): RedirectResponse
    {
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'unit' => $request->unit
        ]);

        if ($request->hasFile('images')) {
            $file = $request->file('images');

            $path = $file?->store('products/images', 'public');
            if ($path) {
                $name = $file->hashName();
                $extension = $file->extension();
                Image::create([
                    'name' => $name,
                    'extension' => $extension,
                    'product_id' => $product->id
                ]);
            }
        }

        return redirect(RouteServiceProvider::PRODUCT)->with('status', 'product-stored');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product.index', compact("product"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'unit' => $request->unit
        ]);

        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $path = $file?->store('products/images', 'public');

            if ($path) {
                if ($product->images) {
                    Storage::disk('public')->delete($product->images->product_images);
                    $product->images->update([
                        'name' => $file->hashName(),
                        'extension' => $file->extension(),
                    ]);
                } else {
                    Image::create([
                        'name' => $file->hashName(),
                        'extension' => $file->extension(),
                        'product_id' => $product->id
                    ]);
                }
            }
        }
        return redirect(RouteServiceProvider::PRODUCT)->with('status', 'product-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->images) {
            Storage::disk('public')->delete($product->images->product_images);
        }
        Product::destroy($product->id);
        return redirect(RouteServiceProvider::PRODUCT);
    }
}
