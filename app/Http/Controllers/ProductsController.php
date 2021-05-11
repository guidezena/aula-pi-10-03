<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;


class ProductsController extends Controller
{
    public function index()
    {
        return view('product.index')->with('products', Product::all());
    }

    public function create()
    {
        return view('product.create')->with('categories', Category::all());
    }


    public function store(Request $request)
    {
        if ($request->image) {
            $image = $request->file('image')->store('product');
            $image = "storage/" . $image;
        } else {
            $image = "storage/product/imagem.jpg";
        }
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => $image

        ]);
        session()->flash('success', 'Produto foi cadastrado com sucesso');
        return redirect(route('product.index'));
    }

    public function edit(Product $product)
    {
        return view('product.edit')->with(['product' => $product, 'categories' => Category::all()]);
    }

    public function update(Request $request, Product $product)
    {
        if ($request->image) {
            $image = $request->file('image')->store('product');
            $image = "storage/" . $image;
            if ($product->image != "storage/product/imagem.jpg") {
                Storage::delete(str_replace('storage/','',$product->image));
            }
        } else {
            $image = $product->image;
        }
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => $image
        ]);
        session()->flash('success', 'Produto foi alterado com sucesso!');
        return redirect(route('product.index'));
    }

    public function destroy(Product $product)
    {
        $product->delete();
        session()->flash('success', 'Produto foi deletado com sucesso!');
        return redirect(route('product.index'));
    }
    public function trash()
    {
        return view('product.trash')->with('products', Product::onlyTrashed()->get());
    }
    public function restore(Product $product)
    {
        dd($product);
        $product->restore();
        session()->flash('sucess', 'Produto foi restaurado com sucesso');
        return redirect(route('product.trash'));
    }
}
